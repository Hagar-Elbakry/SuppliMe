<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index(){
        // random products with pagination
        $products = Product::inRandomOrder()->paginate(6);
        return view('shopping.index',compact('products'));
    }

    public function show($id){
        return view('shopping.show');
    }
}
