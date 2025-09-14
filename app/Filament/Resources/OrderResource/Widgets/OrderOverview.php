<?php

namespace App\Filament\Resources\OrderResource\Widgets;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Orders',  Order::all()->count()),
            Stat::make('Pending Orders',  Order::where('status', 'pending')->count()),
            Stat::make('Processing Orders',  Order::where('status', 'processing')->count()),
            Stat::make('Completed Orders',  Order::where('status', 'completed')->count()),
        ];
    }
}
