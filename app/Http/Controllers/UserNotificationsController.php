<?php

namespace App\Http\Controllers;



class UserNotificationsController extends Controller
{
    public function __invoke() {
        return view('notifications.show', [
            'notifications' => auth()->user()->notifications
        ]);
    }
}
