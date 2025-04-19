<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(OrderService $orderService) {

        //!  the comments of the following lines to simulate a logged-in user until we make authentication work
        if (!Auth::check()) {
            $user = User::find(2);
            if ($user instanceof User) {
                Auth::login($user);
            }
        }
        $user = Auth::user() ;
        $cart = Cart::with('products')->where('user_id', $user->id)->first();
        $order = $orderService->placeOrder($cart);
        return redirect('/payment/'.$order->id);
    }
}
