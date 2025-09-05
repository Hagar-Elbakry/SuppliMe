<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Category;
use App\Observers\UserObserver;
use App\Observers\CategorylObserver;
use Illuminate\Pagination\Paginator;
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
    }
}
