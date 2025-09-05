<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Category;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Query\Builder;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make()
        ];
        foreach(Category::all() as $category) {
                    $tabs [$category->name]  = Tab::make()
                        ->modifyQueryUsing(fn ($query) => $query->whereRelation('category', 'name', $category->name));
        }

        return $tabs;
    }
}
