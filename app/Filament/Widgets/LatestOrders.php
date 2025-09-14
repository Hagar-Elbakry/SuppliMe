<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatus;
use App\Enums\ShippingStatus;
use App\Filament\Resources\OrderResource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Guava\FilamentIconSelectColumn\Tables\Columns\IconSelectColumn;

class LatestOrders extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
               OrderResource::getEloquentQuery()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('user.name')->label('Customer')->searchable(),
                TextColumn::make('total_price')->numeric()->money('EGP')->sortable(),
                IconSelectColumn::make('status')
                    ->options(OrderStatus::class)
                    ->closeOnSelection(),
                IconSelectColumn::make('shipping.status')
                    ->options(ShippingStatus::class)
                    ->closeOnSelection(),
            ]);
    }
}
