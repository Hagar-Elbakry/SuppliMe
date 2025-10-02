<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/register', 'middleware' => 'guest'], function () {
    Route::get('', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('', [RegisteredUserController::class, 'register'])->name('register.store');
});

Route::group(['prefix' => '/login', 'middleware' => 'guest'], function () {
    Route::get('', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('', [AuthenticatedSessionController::class, 'login'])->name('login.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
    Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
});
