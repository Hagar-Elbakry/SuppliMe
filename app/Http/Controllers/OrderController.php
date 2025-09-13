<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', Auth::user()->id)
            ->with(['orderDetails.product'])
            ->latest()
            ->get();
        return view('orders.index', compact('orders'));
    }
    public function show($orderId) {
        $order = Order::where('user_id', Auth::user()->id)
            ->with(['orderDetails.product','shipping'])
            ->findOrFail($orderId);
        return view('orders.show', compact('order'));
    }
}
