<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class RegisteredUserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $request->validated();
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);


        event(new Registered($user));

        Mail::to($user->email)->queue(new WelcomeEmail($user));

        Auth::login($user);
        return redirect(route('home'));
    }

    public function create()
    {
        return view('auth.register');
    }
}
