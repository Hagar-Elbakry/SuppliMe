<?php


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
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\SupportMessageController;
use App\Http\Controllers\UserNotificationsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');


Route::group(['prefix' => '/profile/', 'as' => 'profile.', 'middleware' => 'auth'], function () {
    Route::get('{user:name}', [ProfileController::class, 'show'])->name('show');
    Route::get('{user:name}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('{user:name}/deleteImage', [ProfileController::class, 'deleteImage'])->name('deleteImage');
    Route::patch('{user:name}/update', [ProfileController::class, 'update'])->name('update');
    Route::get('{user:name}/delete', [ProfileController::class, 'delete'])->name('delete');
    Route::delete('{user:name}/destroy', [ProfileController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/cart', 'as' => 'cart.', 'middleware' => 'auth'], function () {
    Route::get('', [CartController::class, 'index'])->name('index');
    Route::post('/{product}', [CartController::class, 'store'])->name('store');
    Route::get('/{product_id}/update/{action}', [CartController::class, 'updateQuantity'])->name('updateQuantity');
    Route::delete('', [CartController::class, 'destroyAll'])->name('destroyAll');
    Route::delete('/{product}', [CartController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/payment/', 'as' => 'payment.', 'middleware' => 'auth', 'verified'], function () {
    Route::get('{orderId}', [PaymentController::class, 'index'])->name('index');
    Route::post('create', [PaymentController::class, 'store'])->name('store');
});

Route::group(['prefix' => '/orders', 'as' => 'orders.', 'middleware' => 'auth'], function () {
    Route::get('', [OrderController::class, 'index'])->name('index');
    Route::get('/{order}/track', [OrderController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/delivery-track', 'as' => 'delivery.', 'middleware' => 'auth'], function () {
    Route::get('', [DeliveryController::class, 'index'])->name('index');
    Route::post('', [DeliveryController::class, 'store'])->name('store');
});

Route::group(['prefix' => '/wishlist', 'as' => 'favourite.', 'middleware' => 'auth'], function () {
    Route::get('', [FavouriteController::class, 'index'])->name('index');
    Route::post('', [FavouriteController::class, 'store'])->name('store');
    Route::delete('', [FavouriteController::class, 'destroyAll'])->name('destroyAll');
    Route::delete('/{product}', [FavouriteController::class, 'destroy'])->name('destroy');
    Route::post('/add-all-to-cart', [FavouriteController::class, 'addAllToCart'])->name('addAllToCart');
});

Route::group(['prefix' => '/contact', 'as' => 'contact-us.', 'middleware' => 'auth'], function () {
    Route::get('', [SupportMessageController::class, 'index'])->name('index');
    Route::post('', [SupportMessageController::class, 'store'])->name('store');
});

Route::middleware('auth')->group(function () {

    Route::get('/shop', [ShoppingController::class, 'index'])->name('shop.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/products', [SearchController::class, 'index'])->name('search.index');

    Route::get('/notifications', [UserNotificationsController::class, 'show'])->name('notifications.show');

    Route::post('/rate', [ReviewController::class, 'store'])->name('review.store');
});

require __DIR__.'/auth.php';






