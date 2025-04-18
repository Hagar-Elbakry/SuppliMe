<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/profile/{user:name}',[ProfileController::class,'show'])->name('profile.show');
    Route::get('/profile/{user:name}/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile/{user:name}/update',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile/{user:name}/destroy',[ProfileController::class,'destroy'])->name('profile.destroy');
    Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/{product}',[CartController::class,'store'])->name('cart.store');
    Route::delete('/cart',[CartController::class,'destroyAll'])->name('cart.destroyAll');
    Route::delete('/cart/{product}',[CartController::class,'destroy'])->name('cart.destroy');
    Route::view('/notifications','notifications');

});

Route::middleware('guest')->group(function () {
    Route::get('/register',[RegisteredUserController::class,'create'])->name('register');
    Route::post('/register',[RegisteredUserController::class,'store'])->name('register.store');
    Route::get('/login',[AuthenticatedSessionController::class,'create'])->name('login');
    Route::post('/login',[AuthenticatedSessionController::class,'store'])->name('login.store');
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::view('/about','about');


});




