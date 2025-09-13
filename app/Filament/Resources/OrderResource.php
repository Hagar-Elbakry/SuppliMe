<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Governorate;
use Illuminate\Support\Number;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    //* Order Info
                    Step::make('Order Info')
                        ->schema([
                            Select::make('user_id')
                                ->relationship(
                                    name: 'user',
                                    titleAttribute: 'name',
                                    modifyQueryUsing: fn ($query) => $query->where('role', 'user')
                                )
                                ->label('Customer')
                                ->searchable()
                                ->preload()
                                ->required(),


                            Select::make('status')
                                ->options([
                                    'pending' => 'Pending',
                                    'processing' => 'Processing',
                                    'completed' => 'Completed',
                                ])
                                ->required(),

                            Select::make('payment_method')
                            ->label('Payment Method')
                            ->options([
                                'cash' => 'Cash on Delivery',
                                'visa' => 'Visa',
                            ])
                            ->required(),

                            Repeater::make('address')
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
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $governorate = Governorate::find($state);
                                        $set('../../shipping_cost', $governorate->shipping_cost);
                                    })
                                    ->required(),
                                TextInput::make('phone')->required(),
                            ])
                            ->columns(2)
                            ->maxItems(1),



                            TextInput::make('shipping_cost')
                                ->numeric()
                                ->disabled()
                                ->dehydrated()
                                ->required(),

                        ]),

                        //* Order Details
                        Step::make('Order Details')
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
                                                $price = $product?->price ?? 0;
                                                $set('price', $price);

                                                $quantity = $get('quantity') ?? 1;
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
                                                $price = $get('price') ?? 0;
                                                $set('sub_total', $price * $state);
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
                        ->schema([
                            TextInput::make('shipping.tracking_number')
                                ->label('Tracking Number')
                                ->required()
                                ->reactive()
                                ->afterStateHydrated(function ($state ,callable $set,$record){
                                    if ($record->shipping) {
                                        $set('shipping.tracking_number', $record->shipping->tracking_number);
                                    } else {
                                        $set('shipping.tracking_number', 'TRK-' . strtoupper(uniqid()));
                                    }
                                }),

                            DateTimePicker::make('shipping.estimated_delivery')
                                ->label('Estimated Delivery')
                                ->required()
                                ->afterStateHydrated(function ($state, callable $set, $record) {
                                    if ($record->shipping) {
                                        $set('shipping.estimated_delivery', $record->shipping->estimated_delivery);
                                    }
                                }),

                            Select::make('shipping.user_id')
                                ->relationship(
                                    name: 'shipping.user',
                                    titleAttribute: 'name',
                                    modifyQueryUsing: fn ($query) => $query->where('role', 'delivery')
                                )
                                ->label('Assigned Delivery')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->afterStateHydrated(function ($state, callable $set, $record) {
                                    if ($record->shipping) {
                                        $set('shipping.user_id', $record->shipping->user_id);
                                    }
                                }),

                            Select::make('shipping.status')
                                ->options([
                                    'assigned' => 'Assigned',
                                    'unassigned' => 'Unassigned',
                                    'delivered' => 'Delivered',
                                ])
                                ->required()
                                ->afterStateHydrated(function ($state, callable $set, $record) {
                                    if ($record->shipping) {
                                        $set('shipping.status', $record->shipping->status);
                                    }
                                }),
                        ]),
                ])
                ->skippable()
                ->columnSpanFull(),
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

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'processing',
                        'success' => 'completed',
                    ]),

                TextColumn::make('total_price')
                ->getStateUsing(fn ($record) => $record->total_price + ($record->shipping_cost ?? 0))
                ->money('EGP'),

                TextColumn::make('shipping.tracking_number')
                ->label('Tracking NUM')
                ->searchable(),

                BadgeColumn::make('shipping.status')
                    ->label('Shipping Status')
                    ->colors([
                        'info' => 'assigned',
                        'danger' => 'unassigned',
                        'success' => 'delivered',
                    ]),

                TextColumn::make('shipping.user.name')
                ->label('Delivery')
                ->searchable()
                ->default('❌'),

                TextColumn::make('payment_method')
                ->label('Payment Method')
                ->searchable(),

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
            ])
            ->filters([
                SelectFilter::make('status')
                ->options([
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'completed' => 'Completed',
                ])
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
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
