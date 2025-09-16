<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Users by Role';
    protected static ?int $sort = 3;



    protected function getData(): array
    {
        $roles =  ['admin' , 'delivery' , 'user'];
        $counts = [];

        foreach ($roles as $role) {
            $counts[] = User::where('role', $role)->count();
        }

        return [
            'datasets' => [
                [
                    'data' => $counts,
                    'backgroundColor' => ['#F87171', '#34D399' ,'#3B82F6'],
                ],
            ],
            'labels' => $roles,

        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
