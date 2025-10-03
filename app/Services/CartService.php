<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\CartRepository;

class CartService
{
    public $cartRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getCart($discountService)
    {
        $products = $this->cartRepository->getCart();
        $totalItems = $products->sum('pivot.quantity');
        $products->each(function ($product) use ($discountService) {
            if ($discountService->getDiscountPercentage($product) > 0) {
                $product->price = $discountService->getDiscountedPrice($product);
            }
        });
        $subTotal = $products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });
        return array($products, $totalItems, $subTotal);
    }

    public function addToCart(Product $product)
    {
        $this->cartRepository->addToCart($product);
    }

    public function updateQuantityForProduct($product_id, $action)
    {
        $this->cartRepository->updateQuantityForProduct($product_id, $action);
    }

    public function removeFromCart(Product $product)
    {
        $this->cartRepository->removeFromCart($product);
    }

    public function emptyCart()
    {
        $this->cartRepository->emptyCart();
    }
}
