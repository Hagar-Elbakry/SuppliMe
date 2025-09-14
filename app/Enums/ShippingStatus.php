<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ShippingStatus: string implements HasLabel , HasColor , HasIcon , HasDescription
{
    case Unassigned= 'unassigned';
    case Assigned = 'assigned';
    case Delivered = 'delivered';

    public function getLabel():?string{

        return match($this){
            self::Unassigned => 'Unassigned',
            self::Assigned => 'Assigned',
            self::Delivered => 'Delivered',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Unassigned => 'danger',
            self::Assigned => 'info',
            self::Delivered => 'success',
        };
    }

    public function getIcon(): string|null
    {
        return match ($this) {
            self::Unassigned => 'heroicon-o-no-symbol',
            self::Assigned => 'heroicon-o-clipboard-document-check',
            self::Delivered => 'heroicon-o-check-badge',
        };
    }

    public function getDescription(): string|null
    {
        return match ($this) {
            self::Unassigned => 'Not yet assigned to a delivery person',
            self::Assigned => 'Assigned to a delivery person',
            self::Delivered => 'Order delivered successfully',
        };
    }

}
