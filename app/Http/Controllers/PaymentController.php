<?php

namespace App\Http\Controllers;

use App\interfaces\PaymentMethod;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Payments\PaymentFactory;
use App\Notifications\PaymentReceived;

class PaymentController extends Controller
{
    public function index($order_id) {
        $order = Order::findOrFail($order_id);
        return view('payment.index',compact('order'));
    }

    public function store() {
        $paymentMethod = PaymentFactory::createPayment(request('payment_method'))->pay();
        $totalPrice = Order::findOrFail(request('order_id'))->total_price;
        $shippingCost = Order::findOrFail(request('order_id'))->shipping_cost;
        $amount = $totalPrice + $shippingCost;

        if($paymentMethod == 'visa'){
            $transactionId = 'VISA-'.strtoupper(Str::random(10));
        }
        Payment::create([
            'method' => $paymentMethod,
            'amount' => $amount,
            'order_id' => request('order_id'),
            'user_id' => auth()->id(),
            'transaction_id' => $transactionId ?? null,
        ]);
        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
        return redirect('/notifications');
    }
}
