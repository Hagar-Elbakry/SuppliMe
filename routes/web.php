<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\SupportMessageController;
use App\Http\Controllers\UserNotificationsController;
use App\Models\Review;
use App\Models\SupportMessage;
use Illuminate\Support\Facades\Route;





Route::get('/',[HomeController::class,'index'])->name('home');
Route::view('/about','about');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user:name}',[ProfileController::class,'show'])->name('profile.show');
    Route::get('/profile/{user:name}/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile/{user:name}/update',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile/{user:name}/destroy',[ProfileController::class,'destroy'])->name('profile.destroy');

    Route::get('/shop',[ShoppingController::class,'index'])->name('shop.index');

    Route::get('/shop/{category}',[ShoppingController::class,'show'])->name('shop.show');

    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/{product}',[CartController::class,'store'])->name('cart.store');
    Route::get('/cart/{product_id}/update/{action}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/cart',[CartController::class,'destroyAll'])->name('cart.destroyAll');
    Route::delete('/cart/{product}',[CartController::class,'destroy'])->name('cart.destroy');


    Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store');
    Route::get('/payment/{orderId}',[PaymentController::class,'index'])->name('payment.index');
    Route::post('/payment/create',[PaymentController::class,'store'])->name('payment.store');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}/track', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/delivery',[DeliveryController::class,'index'])->name('delivery.index');
    Route::post('/delivery',[DeliveryController::class,'store'])->name('delivery.store');
    Route::get('/wishlist',[FavouriteController::class,'index'])->name('favourite.index');

    Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');

    Route::get('/notifications',[UserNotificationsController::class,'show'])->name('notifications.show');

    Route::get('/contact',[SupportMessageController::class,'index'])->name('contact-us.index');
    Route::post('/contact',[SupportMessageController::class,'store'])->name('contact-us.store');

    Route::post('/rate',[ReviewController::class,'store'])->name('review.store');
    Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register',[RegisteredUserController::class,'create'])->name('register');
    Route::post('/register',[RegisteredUserController::class,'store'])->name('register.store');

    Route::get('/login',[AuthenticatedSessionController::class,'create'])->name('login');
    Route::post('/login',[AuthenticatedSessionController::class,'store'])->name('login.store');
});




