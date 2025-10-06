<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{

    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show(Product $product)
    {
        list($product, $RelatedProducts, $rateValue) = $this->productService->getProducts($product);
        return view('products.show', compact('product', 'RelatedProducts', 'rateValue'));
    }
}
