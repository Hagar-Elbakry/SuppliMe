<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ShoppingRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCategoriesAndProducts($categoryId)
    {

        $categories = Category::all();
        $products = Product::with('category')
            ->filterByCategory($categoryId)
            ->inRandomOrder()
            ->paginate(6);
        return array($categories, $products);
    }
}
