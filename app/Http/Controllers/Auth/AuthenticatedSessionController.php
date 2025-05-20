<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }
    public function store() {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>'The provided credentials do not match our records.'
            ]);
        }
        request()->session()->regenerate();
        session()->flash('welcome','Welcome, '.auth()->user()->name.' SuppliMe Happy To Have You Back :)');
        return redirect()->intended();
    }

    public function destroy() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('login'));
    }
}
