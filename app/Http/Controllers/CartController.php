<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use App\Services\DiscountService;


class CartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(DiscountService $discountService)
    {
        list($products, $totalItems, $subTotal) = $this->cartService->getCart($discountService);
        return view('cart.index', compact('products', 'totalItems', 'subTotal'));
    }

    public function store(Product $product)
    {
        $this->cartService->addToCart($product);
        return redirect()->back();
    }

    public function updateQuantity($product_id, $action)
    {
        $this->cartService->updateQuantityForProduct($product_id, $action);
        return redirect()->back();
    }


    public function destroy(Product $product)
    {
        $this->cartService->removeFromCart($product);
        return redirect()->back();
    }


    public function destroyAll()
    {
        $this->cartService->emptyCart();
        return redirect()->back();
    }
}
