<?php

namespace App\Listeners;

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
    public function handle(UserRegistered $event): void
    {
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
}
