<?php

namespace App\Payments;
use Exception;

class PaymentFactory {
    public static function createPayment($type) {
        return match ($type) {
            'cash' => new Cash(),
            'visa' => new Visa(),
            default => throw new Exception('Invalid payment type'),
        };
    }
}
