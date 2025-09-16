<?php

namespace App\Filament\Delivery\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Shipping;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\ShippingStatus;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Delivery\Resources\ShippingResource\Pages;
use Guava\FilamentIconSelectColumn\Tables\Columns\IconSelectColumn;
use App\Filament\Delivery\Resources\ShippingResource\RelationManagers;

class ShippingResource extends Resource
{
    protected static ?string $model = Shipping::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tracking_number')
                ->label('Tracking No.')
                ->searchable(),

                IconSelectColumn::make('status')
                ->options(ShippingStatus::class)
                ->closeOnSelection(),

                TextColumn::make('total_price')
                ->money('EGP')
                ->getStateUsing(function ($record) {
                    return ($record->order->shipping_cost ?? 0) + ($record->order->total_price ?? 0);
                }),

                TextColumn::make('order.payment_method')
                ->label('Payment Method'),

                TextColumn::make('order.user.name')->label('Customer'),

                TextColumn::make('estimated_delivery')->date(),

            ])
            ->recordUrl(null)
            ->headerActions([])
            ->filters([
                SelectFilter::make('status')
                ->options(ShippingStatus::class)
                ->label('Shipping Status'),
            ])
            ->actions([
                ViewAction::make(),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->user()->id))
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Tabs::make('ShippingTabs')
                    ->tabs([
                        Tab::make('Shipping Info')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Infolists\Components\TextEntry::make('tracking_number')
                                    ->label('Tracking No.'),
                                Infolists\Components\TextEntry::make('status')
                                    ->label('Status'),
                                Infolists\Components\TextEntry::make('estimated_delivery')
                                    ->label('Estimated Delivery'),
                            ]),

                        Tab::make('Order Info')
                            ->icon('heroicon-o-currency-dollar')
                            ->schema([
                                Infolists\Components\TextEntry::make('order.total_price')
                                    ->label('Total Price'),
                                Infolists\Components\TextEntry::make('order.shipping_cost')
                                    ->label('Shipping Cost'),
                                Infolists\Components\TextEntry::make('order.payment_method')
                                    ->label('Payment Method'),
                            ]),

                        Tab::make('Customer Info')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Infolists\Components\TextEntry::make('order.address.first_name')
                                    ->label('First Name'),
                                Infolists\Components\TextEntry::make('order.address.last_name')
                                    ->label('Last Name'),
                                Infolists\Components\TextEntry::make('order.address.address')
                                    ->label('Address'),
                                Infolists\Components\TextEntry::make('order.address.city')
                                    ->label('City'),
                                Infolists\Components\TextEntry::make('order.address.governorate.name')
                                    ->label('Governorate'),
                                Infolists\Components\TextEntry::make('order.address.phone')
                                    ->label('Phone'),
                            ])
                            ->columns(2),
                    ])->columnSpanFull(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShippings::route('/'),
            'view' => Pages\ViewShipping::route('/{record}'),
        ];
    }

}
