<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasLabel , HasColor , HasIcon , HasDescription
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Completed = 'completed';

    public function getLabel():?string{

        return match($this){
            self::Pending => 'Pending',
            self::Processing => 'Processing',
            self::Completed => 'Completed',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Pending => 'gray',
            self::Processing => 'warning',
            self::Completed => 'success',
        };
    }

    public function getIcon(): string|null
    {
        return match ($this) {
            self::Pending => 'heroicon-s-clock',
            self::Processing => 'heroicon-s-truck',
            self::Completed => 'heroicon-s-check-circle',
        };
    }

    public function getDescription(): string|null
    {
        return match ($this) {
            self::Pending => 'Order is in pending state',
            self::Processing => 'Order is in processing state',
            self::Completed => 'Order is completed',
        };
    }

}
