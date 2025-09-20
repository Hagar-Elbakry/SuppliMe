<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\DiscountService;

class HomeController extends Controller
{
    public function __invoke(DiscountService $discountService)
    {

        $categories = Category::all();

        $featuredProducts = Product::where('is_featured', 1)->get();

        $dailyOffers = $discountService->activeDailyDiscount();

        $bestSellers = Product::inRandomOrder()->take(6)->get();
        return view('home', compact('categories', 'featuredProducts', 'dailyOffers', 'bestSellers'));
    }
}
