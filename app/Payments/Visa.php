<?php

namespace App\Payments;

use App\interfaces\PaymentMethod;

class Visa implements PaymentMethod {
    public function pay() {
        return 'visa';
    }
}
