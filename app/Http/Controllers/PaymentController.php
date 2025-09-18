<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Governorate;
use App\Models\Order;
use App\Notifications\PaymentReceived;
use App\Payments\PaymentFactory;

class PaymentController extends Controller
{
    public function index(Order $order)
    {
        $order = $this->getOrder($order);
        $governorates = Governorate::all();
        return view('payment.index', compact('order', 'governorates'));
    }

    /**
     * @param  Order  $order
     * @return mixed
     */
    public function getOrder(Order $order)
    {
        $order = Order::findOrFail($order->id);
        return $order;
    }

    public function store(StorePaymentRequest $request)
    {
        $validated = $request->validated();
        $paymentMethod = PaymentFactory::createPayment($validated['payment_method'])->pay();
        $order = $this->getOrder(Order::find($validated['order_id']));

        $this->storeAddress($order, $validated);

        $order->update([
            'payment_method' => $paymentMethod,
            'shipping_cost' => Governorate::find($validated['governorate_id'])->shipping_cost
        ]);

        $amount = $order->total_price + ($order->shipping_cost ?? 0);


        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
        return redirect(route('notifications.show'));
    }

    /**
     * @param  mixed  $order
     * @param  mixed  $validated
     * @return void
     */
    public function storeAddress(mixed $order, mixed $validated): void
    {
        $order->address()->create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'governorate_id' => $validated['governorate_id'],
            'phone' => $validated['phone'],
        ]);
    }
}
