<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class FavouriteRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function storeFavouriteProduct($userProducts, $request)
    {
        $userProducts->contains($request->product_id)
            ? Auth::user()->products()->detach($request->product_id)
            : Auth::user()->products()->attach($request->product_id);
    }

    public function deleteFavouriteProduct($productId)
    {
        Auth::user()->products()->detach($productId);
    }

    public function deleteAllFavouriteProduct()
    {
        Auth::user()->products()->detach();
    }

    public function addAllFavoriteToCart($favoriteProducts)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        foreach ($favoriteProducts as $product) {
            $cartProduct = $cart->products()->where('product_id', $product->id)->first();
            $cart->products()->syncWithoutDetaching([
                $product->id => [
                    'quantity' => $cartProduct
                        ? $cartProduct->pivot->quantity + 1
                        : 1
                ]
            ]);
        }
    }
}

