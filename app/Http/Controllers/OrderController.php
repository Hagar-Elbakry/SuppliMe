<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', Auth::user()->id)
            ->with(['orderDetails.product', 'payment'])
            ->latest()
            ->get();
        return view('orders.index', compact('orders'));
    }
    public function show($orderId) {
        $order = Order::where('user_id', Auth::user()->id)
            ->with(['orderDetails.product', 'payment'])
            ->findOrFail($orderId);
        return view('orders.show', compact('order'));
    }
}
