<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index(Request $request){

        $products = Product::inRandomOrder()->paginate(6);
        $category_id = $request->query('category');
        if($category_id){
            $category = Category::findOrFail($category_id);
            $products = Product::where('category_id',$category_id)->inRandomOrder()->paginate(6);
        }
        $categories = Category::all();
        return view('shopping.index',compact('products' , 'categories'));
    }


}
