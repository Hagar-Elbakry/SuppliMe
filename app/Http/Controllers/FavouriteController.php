<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index(){
        $favouriteProducts = Auth::user()->products()->get();
        return view('favourite.index',compact('favouriteProducts'));
    }
    public function store(Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        if (Auth::user()->products->contains($request->product_id)) {
            Auth::user()->products()->detach($request->product_id);
        } else {
            Auth::user()->products()->attach($request->product_id);
        }
        return redirect()->back();
    }
    public function destroy($productId){
        $favourite = Auth::user()->products()->where('product_id', $productId)->first();
        if ($favourite) {
            $favourite->pivot->delete();
        }
        return redirect()->back();
    }
    public function destroyAll(){
        Auth::user()->products()->detach();
        return redirect()->back();
    }

    public function addAllToCart(){
        $favouriteProducts = Auth::user()->products()->get();
        foreach ($favouriteProducts as $product) {
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
            $cartProduct = $cart->products()->where('product_id', $product->id)->first();
            if ($cartProduct) {
                $cart->products()->updateExistingPivot($product->id ,[
                    'quantity' => $cartProduct->pivot->quantity + 1
                ]);
            } else {
                $cart->products()->attach($product->id, ['quantity' => 1]);
            }
        }
        return redirect()->route('cart.index');
    }
}
