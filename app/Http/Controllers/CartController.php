<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\DiscountService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(DiscountService $discountService)
    {
        $cart = $this->getOrCreate();
        $products = $cart->products()->withPivot('quantity')->get();
        $totalItems = $products->sum('pivot.quantity');
        $products->each(function ($product) use ($discountService) {
            if ($discountService->getDiscountPercentage($product) > 0) {
                $product->price = $discountService->getDiscountedPrice($product);
            }
        });
        $subTotal = $products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });
        return view('cart.index', compact('products', 'totalItems', 'subTotal'));
    }

    /**
     * @return mixed
     */
    public function getOrCreate()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        return $cart;
    }

    public function store(Product $product)
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
        return redirect()->back();
    }

    /**
     * @param $cart
     * @param  Product  $product
     * @return mixed
     */
    public function getCartProduct($cart, Product $product)
    {
        $cartProduct = $cart->products()->where('product_id', $product->id)->first();
        return $cartProduct;
    }

    public function updateQuantity($product_id, $action)
    {
        $cart = $this->getOrCreate();
        $cartProduct = $this->getCartProduct($cart, Product::find($product_id));
        if ($cartProduct) {
            $quantity = $cartProduct->pivot->quantity;
            $quantity = $this->getQuantity($action, $quantity);
            $cart->products()->updateExistingPivot($product_id, ['quantity' => $quantity]);
        }
        return redirect()->back();
    }

    /**
     * @param $action
     * @param $quantity
     * @return int|mixed
     */
    public function getQuantity($action, $quantity): mixed
    {
        if ($action === 'increase') {
            $quantity++;
        } elseif ($action === 'decrease' && $quantity > 1) {
            $quantity--;
        }
        return $quantity;
    }

    public function destroy(Product $product)
    {
        $cart = $this->getOrCreate();
        $cartProduct = $this->getCartProduct($cart, $product);
        if ($cartProduct) {
            $cart->products()->detach($product->id);
        }
        return redirect()->back();
    }

    public function destroyAll()
    {
        $cart = $this->getOrCreate();
        $cart->products()->detach();
        return redirect()->back();
    }
}
