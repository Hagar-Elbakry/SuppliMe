<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Notifications\PaymentReceived;

class SendNotificationToUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $amount = $event->order->total_price + ($event->order->shipping_cost ?? 0);
        $paymentMethod = $event->paymentMethod;
        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
    }
}
