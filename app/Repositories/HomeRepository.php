<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class HomeRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getData($discountService)
    {
        $categories = Category::all();
        $featuredProducts = Product::where('is_featured', 1)->get();
        $dailyOffers = $discountService->activeDailyDiscount();
        $bestSellers = Product::inRandomOrder()->take(6)->get();
        return array($categories, $featuredProducts, $dailyOffers, $bestSellers);
    }
}
