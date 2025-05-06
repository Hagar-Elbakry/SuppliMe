<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {

        if (!Auth::check()) {
            $user = User::find(2);
            if ($user instanceof User) {
                Auth::login($user);
            }
        }
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $products = $cart->products()->withPivot('quantity')->get();
        return view('cart.index', compact('products'));
    }

    public function store($product_id) {
        if (!Auth::check()) {
            $user = User::find(2);
            if ($user instanceof User) {
                Auth::login($user);
            }
        }
        $user = Auth::user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        $cartProduct = $cart->products()->where('product_id', $product_id)->first();
        if ($cartProduct) {
            $cart->products()->updateExistingPivot($product_id, [
                'quantity' => $cartProduct->pivot->quantity + 1
            ]);
        } else {
            $cart->products()->attach($product_id, ['quantity' => 1]);
        }

        return redirect()->back();
    }
    public function updateQuantity($product_id, $action)
    {
        if (!Auth::check()) {
            $user = User::find(2);
            if ($user instanceof User) {
                Auth::login($user);
            }
        }
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartProduct = $cart->products()->where('product_id', $product_id)->first();
        if ($cartProduct) {
            $quantity = $cartProduct->pivot->quantity;
            if ($action === 'increase') {
                $quantity++;
            } elseif ($action === 'decrease' && $quantity > 1) {
                $quantity--;
            }
            $cart->products()->updateExistingPivot($product_id, ['quantity' => $quantity]);
        }
        return redirect()->back();
    }


    public function destroy($id) {
        if (!Auth::check()) {
            $user = User::find(2);
            if ($user instanceof User) {
                Auth::login($user);
            }
        }
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartProduct = $cart->products()->where('product_id', $id)->first();
        if ($cartProduct) {
            $cart->products()->detach($id);
        }
        return redirect()->back();

    }
    public function destroyAll() {
        if (!Auth::check()) {
            $user = User::find(2);
            if ($user instanceof User) {
                Auth::login($user);
            }
        }
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cart->products()->detach();
        return redirect()->back();
    }
}
