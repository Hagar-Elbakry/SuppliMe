<?php

namespace App\Http\Controllers;



class UserNotificationsController extends Controller
{
    public function show() {
        return view('notifications.show', [
            'notifications' => auth()->user()->notifications
        ]);
    }
}
