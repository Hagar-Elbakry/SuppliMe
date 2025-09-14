<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PaymentStatus: string implements HasLabel , HasColor , HasIcon , HasDescription
{
    case Pending = 'pending';
    case Completed = 'completed';
    case Failed = 'failed';

    public function getLabel():?string{

        return match($this){
            self::Pending => 'Pending',
            self::Completed => 'Completed',
            self::Failed => 'Failed',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Completed => 'success',
            self::Failed => 'danger',
        };
    }

    public function getIcon(): string|null
    {
        return match ($this) {
            self::Pending => 'heroicon-o-clock',
            self::Completed => 'heroicon-o-check-circle',
            self::Failed => 'heroicon-o-x-circle',
        };
    }

    public function getDescription(): string|null
    {
        return match ($this) {
            self::Pending => 'Payment is pending',
            self::Completed => 'Payment completed successfully',
            self::Failed => 'Payment failed',
        };
    }

}
