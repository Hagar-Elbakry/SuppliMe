<?php

namespace App\Listeners;

use App\Events\DeliveryAssigned;
use App\Models\Shipping;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class SendNotificationToDelivery
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
    public function handle(DeliveryAssigned $event): void
    {

        $deliveryUser = User::where('id', $event->delivery)->first();
        if ($deliveryUser) {
            $shipping = Shipping::where('order_id', $event->order->id)->first();
            if ($shipping) {
                Notification::make()
                    ->title('New Delivery Assigned')
                    ->body("A new delivery has been assigned with Order ID: {$event->order->id}")
                    ->actions([
                        Action::make('View Order')
                            ->url(route('filament.delivery.resources.shippings.view', $shipping->id))
                            ->openUrlInNewTab(),
                        Action::make('Mark as read')
                            ->button()
                            ->markAsRead()
                    ])
                    ->sendToDatabase($deliveryUser);
            }

        }
    }
}
