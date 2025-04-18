<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // get all categories
        $categories = Category::all();
        // featured products
        $featuredProducts = Product::where('is_featured',1)->get();
        // daily offers
        $dailyOffers = Product::activeDaliyDiscount();
        // best sellers
        $bestSellers = Product::inRandomOrder()->take(6)->get();
        return view('home',compact('categories','featuredProducts','dailyOffers','bestSellers'));
    }
}
