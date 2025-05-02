<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(OrderService $orderService) {


        if (!Auth::check()) {
            $user = User::find(2);
            if ($user instanceof User) {
                Auth::login($user);
            }
        }
        $user = Auth::user() ;
        $cart = Cart::with('products')->where('user_id', $user->id)->first();
        try{
            $order = $orderService->placeOrder($cart);
            return redirect('/payment/'.$order->id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }

}

