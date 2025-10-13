<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\SendWelcomeEmail;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Observers\CategorylObserver;
use App\Observers\ProductObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        User::observe(UserObserver::class);
        Category::observe(CategorylObserver::class);
        Product::observe(ProductObserver::class);
        view()->share('discountService', app('App\Services\DiscountService'));

        Event::listen(UserRegistered::class, SendWelcomeEmail::class);
    }
}
