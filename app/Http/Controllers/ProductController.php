<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product = Product::findOrFail($product->id);

        $RelatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        $rateValue = $this->getRate($product);
        return view('products.show', compact('product', 'RelatedProducts', 'rateValue'));
    }

    /**
     * @param $product
     * @return null
     */
    public function getRate($product): null
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
