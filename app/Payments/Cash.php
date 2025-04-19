<?php

namespace App\Payments;

use App\interfaces\PaymentMethod;

class Cash implements PaymentMethod {
    public function pay() {
        return true;
    }
}
