<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCart()
    {
        $cart = $this->getOrCreate();
        $products = $cart->products()->withPivot('quantity')->get();
        return $products;
    }

    public function getOrCreate()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        return $cart;
    }

    public function addToCart($product)
    {
        $cart = $this->getOrCreate();
        $cartProduct = $this->getCartProduct($cart, $product);
        if ($cartProduct) {
            $cart->products()->updateExistingPivot($product->id, [
                'quantity' => $cartProduct->pivot->quantity + 1
            ]);
        } else {
            $cart->products()->attach($product->id, ['quantity' => 1]);
        }
    }

    public function getCartProduct($cart, Product $product)
    {
        $cartProduct = $cart->products()->where('product_id', $product->id)->first();
        return $cartProduct;
    }

    public function updateQuantityForProduct($product_id, $action)
    {
        $cart = $this->getOrCreate();
        $cartProduct = $this->getCartProduct($cart, Product::find($product_id));
        if ($cartProduct) {
            $quantity = $cartProduct->pivot->quantity;
            $quantity = $this->getQuantity($action, $quantity);
            $cart->products()->updateExistingPivot($product_id, ['quantity' => $quantity]);
        }
    }

    public function getQuantity($action, $quantity): mixed
    {
        if ($action === 'increase') {
            $quantity++;
        } elseif ($action === 'decrease' && $quantity > 1) {
            $quantity--;
        }
        return $quantity;
    }

    public function removeFromCart(Product $product)
    {
        $cart = $this->getOrCreate();
        $cartProduct = $this->getCartProduct($cart, $product);
        if ($cartProduct) {
            $cart->products()->detach($product->id);
        }
    }

    public function emptyCart()
    {
        $cart = $this->getOrCreate();
        $cart->products()->detach();
    }
}

