<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getProduct($product)
    {
        $product = Product::findOrFail($product->id);
        $RelatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
        $rateValue = $this->getRate($product);
        return array($product, $RelatedProducts, $rateValue);
    }

    public function getRate($product)
    {
        $user = Auth::user();
        if ($user) {
            $rate = $user->reviews()->where('product_id', $product->id)->first();
            $rateValue = $rate ? $rate->rate : null;
        } else {
            $rateValue = null;
        }
        return $rateValue;
    }
}
