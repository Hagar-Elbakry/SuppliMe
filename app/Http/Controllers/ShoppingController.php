<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ShoppingController extends Controller
{
    public function __invoke(){
        $categoryId = request()->query('category');
        $categories = Category::all();
        $products = Product::with('category')
                    ->filterByCategory($categoryId)
                    ->inRandomOrder()
                    ->paginate(6);
        return view('shopping.index', compact('products', 'categories'));
    }
}
