<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function __invoke(){

        $categories = Category::all();

        $featuredProducts = Product::where('is_featured',1)->get();

        $dailyOffers = Product::activeDailyDiscount();

        $bestSellers = Product::inRandomOrder()->take(6)->get();
        return view('home',compact('categories','featuredProducts','dailyOffers','bestSellers'));
    }
}
