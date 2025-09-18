<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    private function userProducts(){
        return Auth::user()->products()->get();
    }

    public function index(){
        $favouriteProducts = $this->userProducts();
        return view('favourite.index',compact('favouriteProducts'));
    }

    public function store(Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $userProducts = $this->userProducts();

        $userProducts->contains($request->product_id)
            ? Auth::user()->products()->detach($request->product_id)
            : Auth::user()->products()->attach($request->product_id);

        return redirect()->back();
    }

    public function destroy($productId){
        Auth::user()->products()->detach($productId);
        return back();
    }
    
    public function destroyAll(){
        Auth::user()->products()->detach();
        return redirect()->back();
    }

    public function addAllToCart(){
        $favouriteProducts = $this->userProducts();
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        foreach ($favouriteProducts as $product) {
            $cartProduct = $cart->products()->where('product_id', $product->id)->first();

            $cart->products()->syncWithoutDetaching([
                $product->id => [
                    'quantity' => $cartProduct
                        ? $cartProduct->pivot->quantity + 1
                        : 1
                ]
            ]);
        }

        return redirect()->route('cart.index');
    }
}
