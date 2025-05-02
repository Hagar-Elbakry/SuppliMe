<?php

namespace App\Http\Controllers;

use App\Models\Product;


class SearchController extends Controller
{
    public function index() {
        $products = [];

        if(!request()->has('search') || empty(request('search'))) {
            return redirect()->back();
        }

        request()->validate([
            'search' => 'required|string'
        ]);
        $products = Product::where('name', 'like', '%' . request('search') . '%')->paginate(3);

        return view('search-result', compact('products'));
    }
}
