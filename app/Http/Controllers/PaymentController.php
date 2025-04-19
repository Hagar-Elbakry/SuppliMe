<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($order_id) {
        $order = Order::findOrFail($order_id);
        return view('payment.index',compact('order'));
    }

    public function store() {
        $paymentMethod = PaymentFactory::createPayment(request('payment_method'));
        $totalPrice = Order::findOrFail(request('order_id'))->total_price;
        $shippingCost = Order::findOrFail(request('order_id'))->shipping_cost;
        $amount = $totalPrice + $shippingCost;

        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
    }
}
