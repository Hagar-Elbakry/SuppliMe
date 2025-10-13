<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Enums\ShippingStatus;
use App\Events\DeliveryAssigned;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\Widgets\OrderOverview;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Guava\FilamentIconSelectColumn\Tables\Columns\IconSelectColumn;
use Illuminate\Support\Number;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    //* Order Info
                    Step::make('Order Info')
                        ->icon('heroicon-o-shopping-bag')
                        ->schema([
                            Section::make('Order & Payment Info')
                                ->schema([
                                    Select::make('user_id')
                                        ->relationship(
                                            name: 'user',
                                            titleAttribute: 'name',
                                            modifyQueryUsing: fn($query) => $query->where('role', 'user')
                                        )
                                        ->label('Customer')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->columnSpanFull(),

                                    ToggleButtons::make('status')
                                        ->inline()
                                        ->options(OrderStatus::class)
                                        ->default(OrderStatus::Pending)
                                        ->required(),

                                    ToggleButtons::make('payment_status')
                                        ->inline()
                                        ->options(PaymentStatus::class)
                                        ->default(PaymentStatus::Pending)
                                        ->required(),

                                    Select::make('payment_method')
                                        ->label('Payment Method')
                                        ->options([
                                            'cash' => 'Cash on Delivery',
                                            'visa' => 'Visa',
                                        ])
                                        ->required(),

                                    TextInput::make('shipping_cost')
                                        ->numeric()
                                        ->disabled()
                                        ->dehydrated()
                                        ->required(),
                                ])
                                ->columns(2),

                            Section::make('Address Info')
                                ->relationship('address')
                                ->schema([
                                    TextInput::make('first_name')->required(),
                                    TextInput::make('last_name')->required(),
                                    TextInput::make('address')->required(),
                                    TextInput::make('city')->required(),
                                    Select::make('governorate_id')
                                        ->label('Governorate')
                                        ->relationship('governorate', 'name')
                                        ->preload()
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, callable $set) {
                                            $governorate = Governorate::find($state);
                                            $set('../shipping_cost', $governorate?->shipping_cost ?? 0);
                                        })
                                        ->required(),
                                    TextInput::make('phone')->required(),
                                ])
                                ->columns(2),


                        ]),

                    //* Order Details
                    Step::make('Order Details')
                        ->icon('heroicon-o-clipboard-document-list')
                        ->schema([
                            Repeater::make('orderDetails')
                                ->relationship()
                                ->schema([
                                    Select::make('product_id')
                                        ->relationship('product', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                            $product = Product::find($state);
                                            $price = (float) ($product?->price ?? 0);
                                            $set('price', $price);

                                            $quantity = (int) ($get('quantity') ?? 1);
                                            $set('quantity', $quantity);

                                            $set('sub_total', $price * $quantity);
                                        }),

                                    TextInput::make('quantity')
                                        ->numeric()
                                        ->default(1)
                                        ->minValue(1)
                                        ->required()
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                            $price = (float) ($get('price') ?? 0);
                                            $set('sub_total', $price * (int) $state);
                                        }),

                                    TextInput::make('price')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->prefix('EGP'),

                                    TextInput::make('sub_total')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->prefix('EGP'),
                                ])
                                ->columns(4)
                                ->reactive(),

                            Section::make('Summary')
                                ->schema([
                                    Placeholder::make('grand_total_placeholder')
                                        ->label('Total')
                                        ->content(function (Get $get, Set $set) {
                                            $total = 0;
                                            $items = $get('orderDetails') ?? [];
                                            foreach ($items as $item) {
                                                $total += $item['sub_total'] ?? 0;
                                            }
                                            $set('total_price', $total);
                                            return Number::currency($total, 'EGP');
                                        }),

                                    Hidden::make('total_price')->default(0),
                                ]),
                        ]),

                    //* Shipping
                    Step::make('Shipping Info')
                        ->icon('heroicon-o-truck')
                        ->schema([
                            Section::make('Shipping Info')
                                ->relationship('shipping')
                                ->schema([
                                    TextInput::make('tracking_number')
                                        ->label('Tracking Number')
                                        ->default(fn() => 'TRK-'.strtoupper(uniqid()))
                                        ->required(),

                                    DateTimePicker::make('estimated_delivery')
                                        ->label('Estimated Delivery')
                                        ->required(),

                                    Select::make('user_id')
                                        ->relationship(
                                            name: 'user',
                                            titleAttribute: 'name',
                                            modifyQueryUsing: fn($query) => $query->where('role', 'delivery')
                                        )
                                        ->label('Assigned Delivery')
                                        ->searchable()
                                        ->afterStateUpdated(function ($state, $get) {
                                            if ($state) {
                                                $order = Order::find($get('id'));
                                                if ($order) {
                                                    event(new DeliveryAssigned($order, $state));
                                                }
                                            }
                                        })
                                        ->preload(),

                                    ToggleButtons::make('status')
                                        ->inline()
                                        ->options(ShippingStatus::class)
                                        ->default(ShippingStatus::Unassigned)
                                        ->required(),
                                ])
                                ->columns(2),
                        ]),
                ])
                    ->skippable()
                    ->columnSpanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),

                IconSelectColumn::make('status')
                    ->options(OrderStatus::class)
                    ->closeOnSelection(),

                TextColumn::make('total_price')
                    ->getStateUsing(fn($record) => $record->total_price + ($record->shipping_cost ?? 0))
                    ->money('EGP'),

                TextColumn::make('shipping.tracking_number')
                    ->label('Tracking NUM')
                    ->searchable(),

                IconSelectColumn::make('shipping.status')
                    ->options(ShippingStatus::class)
                    ->closeOnSelection(),


                TextColumn::make('shipping.user.name')
                    ->label('Delivery')
                    ->searchable()
                    ->default('❌'),

                TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->searchable(),

                IconSelectColumn::make('payment_status')
                    ->options(PaymentStatus::class)
                    ->closeOnSelection(),

                TextColumn::make('address.city')
                    ->label('City')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('address.governorate.name')
                    ->label('Governorate')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('address.address')
                    ->label('Address')
                    ->toggleable(isToggledHiddenByDefault: true),


                TextColumn::make('created_at')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->recordUrl(null)
            ->filters([
                SelectFilter::make('status')
                    ->options(OrderStatus::class)
                    ->label('Order Status'),


            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])->tooltip('Actions')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            OrderOverview::class,
        ];
    }
}
