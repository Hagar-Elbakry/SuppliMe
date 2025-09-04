<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::group(['prefix' => '/register', 'middleware' => 'guest'], function () {
    Route::get('',[RegisteredUserController::class,'create'])->name('register');
    Route::post('',[RegisteredUserController::class,'store'])->name('register.store');
});

Route::group(['prefix' => '/login', 'middleware' => 'guest'], function (){
    Route::get('',[AuthenticatedSessionController::class,'create'])->name('login');
    Route::post('',[AuthenticatedSessionController::class,'store'])->name('login.store');
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
    Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');
});
