<?php

namespace App\Filament\Delivery\Resources\ShippingResource\Pages;

use App\Filament\Delivery\Resources\ShippingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShipping extends EditRecord
{
    protected static string $resource = ShippingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
