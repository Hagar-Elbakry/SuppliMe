<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __invoke(OrderService $orderService) {
        $user = Auth::user() ;
        // ensure user have products in cart
        if (Cart::where('user_id', $user->id)->count() == 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty. Please add products to your cart before proceeding to checkout.');
        }
        return redirect()->route('payment.index');
    }

}

