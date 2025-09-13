<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Governorate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Payments\PaymentFactory;
use App\Notifications\PaymentReceived;

class PaymentController extends Controller
{
    public function index($order_id) {
        $order = Order::findOrFail($order_id);
        $governorates = Governorate::all();
        return view('payment.index',compact('order' ,'governorates'));
    }

    public function store(Request $request) {

        // dd($request->all());
        $validated = $request->validate([
            'order_id'     => 'required|exists:orders,id',
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'governorate_id'    => 'required|exists:governorates,id',
            'phone'        => 'required|string|max:20',
            'payment_method' => 'required|in:cash,visa',
        ]);
        $paymentMethod = PaymentFactory::createPayment($validated['payment_method'])->pay();
        $order = Order::findOrFail($validated['order_id']);


        $order->address()->create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'address'    => $validated['address'],
            'city'       => $validated['city'],
            'governorate_id'  => $validated['governorate_id'],
            'phone'      => $validated['phone'],
        ]);

        $order->update([
            'payment_method' => $paymentMethod,
            'shipping_cost' => Governorate::find($validated['governorate_id'])->shipping_cost
        ]);

        $amount = $order->total_price + ($order->shipping_cost ?? 0);


        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
        return redirect(route('notifications.show'));
    }
}
