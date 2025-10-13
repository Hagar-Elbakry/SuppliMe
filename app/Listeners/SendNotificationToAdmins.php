<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Events\UserRegistered;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class SendNotificationToAdmins
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
    public function handle(object $event): void
    {
        if ($event instanceof UserRegistered) {
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                Notification::make()
                    ->title('New User Registered')
                    ->body("A new user has registered with the email: {$event->user->email}")
                    ->actions([
                        Action::make('Mark as read')
                            ->button()
                            ->markAsRead()
                    ])
                    ->sendToDatabase($admin);
            }
        }

        if ($event instanceof OrderCreated) {
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                Notification::make()
                    ->title('New Order Placed')
                    ->body("A new order has been placed with Order ID: {$event->order->id}")
                    ->actions([
                        Action::make('View Order')
                            ->url(route('filament.admin.resources.orders.view', $event->order->id))
                            ->openUrlInNewTab(),
                        Action::make('Mark as read')
                            ->button()
                            ->markAsRead()
                    ])
                    ->sendToDatabase($admin);
            }
        }
    }
}
