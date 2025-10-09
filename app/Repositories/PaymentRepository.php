<?php

namespace App\Repositories;

use App\Models\Governorate;
use App\Payments\PaymentFactory;

class PaymentRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllGovernorates()
    {
        return Governorate::all();
    }

    public function storePayment($validated)
    {
        return PaymentFactory::createPayment($validated['payment_method'])->pay();
    }

    public function storeAddress($order, $validated)
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

    public function updateOrder($order, $validated, $paymentMethod)
    {
        $order->update([
            'payment_method' => $paymentMethod,
            'shipping_cost' => Governorate::find($validated['governorate_id'])->shipping_cost
        ]);
    }
}
