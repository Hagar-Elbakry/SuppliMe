<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shipping;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderService
{

    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function placeOrder($user)
    {
        $cart = Cart::with('products')->where('user_id', $user->id)->firstOrFail();

        return DB::transaction(function () use ($user, $cart) {
            $order = $this->createOrder($user->id, $cart);
            $this->attachOrderDetails($order, $cart);
            $this->clearCart($cart);
            $this->createShipping($order);

            return $order;
        });
    }

    protected function createOrder($userId, $cart)
    {
        $total = $cart->products->sum(fn($p) => $this->calculateProductPrice($p) * $p->pivot->quantity
        );

        return Order::create([
            'user_id' => $userId,
            'total_price' => $total,
        ]);
    }

    protected function calculateProductPrice(Product $product)
    {
        return $this->discountService->getDiscountPercentage($product) > 0
            ? $this->discountService->getDiscountedPrice($product)
            : $product->price;
    }

    protected function attachOrderDetails($order, $cart)
    {
        foreach ($cart->products as $product) {
            $qty = $product->pivot->quantity;

            if ($product->stock_quantity < $qty) {
                throw new Exception("Not enough stock for product: {$product->name}");
            }

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $qty,
                'price' => $product->price,
                'sub_total' => $product->price * $qty,
            ]);

            $product->decrement('stock_quantity', $qty);
        }
    }

    protected function clearCart($cart)
    {
        $cart->products()->detach();
    }

    protected function createShipping($order)
    {
        Shipping::create([
            'tracking_number' => 'TRK-'.strtoupper(uniqid()),
            'order_id' => $order->id,
            'estimated_delivery' => now()->addDays(5),
        ]);
    }
}
