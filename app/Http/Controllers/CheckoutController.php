<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(OrderService $orderService) {
        $user = Auth::user() ;
        try{
            $order = $orderService->placeOrder($user);
            return redirect()->route('payment.index', $order->id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }

}

