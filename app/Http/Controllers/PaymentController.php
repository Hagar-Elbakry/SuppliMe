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
        $totalPrice = Order::findOrFail(request('order_id'))->total_price;
        $shippingCost = Order::findOrFail(request('order_id'))->shipping_cost;
        $amount = $totalPrice + $shippingCost;

        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
    }
}
