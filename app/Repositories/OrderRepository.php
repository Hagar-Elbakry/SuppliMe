<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->with(['orderDetails.product'])
            ->latest()
            ->get();
        return $orders;
    }

    public function getOrder($order)
    {
        $order = Order::where('user_id', Auth::user()->id)
            ->with(['orderDetails.product', 'shipping'])
            ->findOrFail($order->id);
        return $order;
    }

    public function getUserCart($user)
    {
        return Cart::with('products')->where('user_id', $user->id)->firstOrFail();
    }

    public function createOrder($userId, $total)
    {
        return Order::create([
            'user_id' => $userId,
            'total_price' => $total,
        ]);
    }

    public function storeOrderDetails($order, $product, $quantity)
    {
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
            'sub_total' => $product->price * $quantity,
        ]);
    }

    public function clearCart($cart)
    {
        $cart->products()->detach();
    }

    public function createShipping($order)
    {
        Shipping::create([
            'tracking_number' => 'TRK-'.strtoupper(uniqid()),
            'order_id' => $order->id,
            'estimated_delivery' => now()->addDays(5),
        ]);
    }
}
