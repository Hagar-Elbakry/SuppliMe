<?php

namespace App\Filament\Resources\OrderResource\Widgets;
use App\Models\Order;
use App\Models\Shipping;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Orders',  Order::all()->count()),
            Stat::make('Processing Orders',  Order::where('status', 'processing')->count()),
            Stat::make('Shipped Order',  Shipping::where('status', 'completed')->count()),
            Stat::make('Average Price',  number_format((Order::avg('total_price')) ?? 0 , 2) . ' EGP')
        ];
    }
}
