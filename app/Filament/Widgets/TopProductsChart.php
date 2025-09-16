<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\OrderDetail;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TopProductsChart extends ChartWidget
{
    protected static ?string $heading = 'Top 3 Products';
    protected static ?int $sort = 4;


    protected function getData(): array
    {
        $topProducts = OrderDetail::select('product_id', DB::raw('SUM(quantity) as total'))
            ->groupBy('product_id')
            ->orderByDesc('total')
            ->take(3)
            ->get();

        $labels = $topProducts->map(function ($item) {
            return Product::find($item->product_id)?->name ?? 'Unknown';
        });
        $data = $topProducts->pluck('total');

        return [
            'datasets' => [
                [
                    'label' => 'Top 3 Products',
                    'backgroundColor' => ['#A78BFA','#FBBF24', '#10B981'],
                    'data' => $data
                ]
                ],
            'labels' => $labels
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
