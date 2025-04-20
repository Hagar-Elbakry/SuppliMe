<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($productId) {
        $product = Product::findOrFail($productId);
        $RelatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $productId)
            ->take(4)
            ->get();
        return view('products.show',compact('product','RelatedProducts'));
    }
}
