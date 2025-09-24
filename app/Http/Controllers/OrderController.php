<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $status = [
        'unassigned' => 'In Progress',
        'assigned' => 'On the Way',
        'delivered' => 'Delivered'
    ];

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->with(['orderDetails.product'])
            ->latest()
            ->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order = Order::where('user_id', Auth::user()->id)
            ->with(['orderDetails.product', 'shipping'])
            ->findOrFail($order->id);
        $estimated_delivery = Carbon::parse($order->shipping->estimated_delivery);
        return view('orders.show', [
            'order' => $order,
            'status' => $this->status,
            'estimated_delivery' => $estimated_delivery
        ]);
    }
}
