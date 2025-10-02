<?php

namespace App\Services;

use App\Mail\WelcomeEmail;
use App\Repositories\AuthRepository;
use Filament\Events\Auth\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthService
{

    public $authRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register($request)
    {
        $request = $request->all();
        $request['password'] = Hash::make($request['password']);
        $user = $this->authRepository->register($request);
        event(new Registered($user));
        Mail::to($user->email)->queue(new WelcomeEmail($user));
        Auth::login($user);
    }

    public function login($request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.'
            ]);
        }
        request()->session()->regenerate();
        session()->flash('welcome', 'Welcome, '.auth()->user()->name.' SuppliMe Happy To Have You Back :)');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
