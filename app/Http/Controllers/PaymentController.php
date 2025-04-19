<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\PaymentReceived;
use App\Payments\PaymentFactory;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        return view('payment.index');
    }

    public function store() {
        $paymentMethod = PaymentFactory::createPayment(request('payment_method'));
        $amount =

        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
    }
}
