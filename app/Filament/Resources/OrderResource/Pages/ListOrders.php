<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderOverview;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{

    protected static string $resource = OrderResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            OrderOverview::class
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'pending' => Tab::make()
                ->label('Pending')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'pending')),
            'processing' => Tab::make()
                ->label('Processing')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'processing')),
            'completed' => Tab::make()
                ->label('Completed')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'completed'))
        ];
    }
}
