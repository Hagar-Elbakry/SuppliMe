<?php

namespace App\Http\Controllers;

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

    public function store(Request $request) {
        $validated = $request->validate([
            'order_id'     => 'required|exists:orders,id',
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'governate'    => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'payment_method' => 'required|in:cash,visa',
        ]);
        $paymentMethod = PaymentFactory::createPayment($validated['payment_method'])->pay();
        $order = Order::findOrFail($validated['order_id']);
        $amount = $order->total_price + ($order->shipping_cost ?? 0);

        $order->update([
            'payment_method' => $paymentMethod,
        ]);

        $order->address()->create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'address'    => $validated['address'],
            'city'       => $validated['city'],
            'governate'  => $validated['governate'],
            'phone'      => $validated['phone'],
        ]);

        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
        return redirect(route('notifications.show'));
    }
}
