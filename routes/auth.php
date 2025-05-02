<?php
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
    Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');
});
