<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($productId) {
        $product = Product::findOrFail($productId);

        $RelatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $productId)
            ->take(4)
            ->get();
            
        $user = Auth::user();
        if ($user) {
            $rate = $user->reviews()->where('product_id', $productId)->first();
            if ($rate) {
                $rateValue = $rate->rate;
            } else {
                $rateValue = null;
            }
        } else {
            $rateValue = null;
        }
        return view('products.show',compact('product','RelatedProducts','rateValue'));
    }
}
