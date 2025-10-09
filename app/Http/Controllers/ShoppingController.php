<?php

namespace App\Http\Controllers;

use App\Services\ShoppingService;

class ShoppingController extends Controller
{
    public $shoppingService;

    public function __construct(ShoppingService $shoppingService)
    {
        $this->shoppingService = $shoppingService;
    }

    public function __invoke()
    {
        list($categories, $products) = $this->shoppingService->getCategoriesAndProducts();
        return view('shopping.index', compact('products', 'categories'));
    }
}
