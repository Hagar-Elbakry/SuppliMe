<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\SearchRequest;


class SearchController extends Controller
{
    public function __invoke(SearchRequest $request) {
        $search = $request->input('search');
        $products = Product::where('name', 'like', "%{$search}%")->paginate(3);
        return view('search-result', compact('products'));
    }
}
