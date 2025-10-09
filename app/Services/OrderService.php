<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\OrderRepository;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrderService
{

    protected $discountService, $orderRepository;

    public function __construct(DiscountService $discountService, OrderRepository $orderRepository)
    {
        $this->discountService = $discountService;
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getAllOrders();
    }

    public function getOrder($order)
    {
        $order = $this->orderRepository->getOrder($order);
        $estimated_delivery = Carbon::parse($order->shipping->estimated_delivery);
        return array($order, $estimated_delivery);
    }

    public function placeOrder($user)
    {
        $cart = $this->orderRepository->getUserCart($user);

        return DB::transaction(function () use ($user, $cart) {
            $order = $this->createOrder($user->id, $cart);
            $this->attachOrderDetails($order, $cart);
            $this->orderRepository->clearCart($cart);
            $this->orderRepository->createShipping($order);
            return $order;
        });
    }

    protected function createOrder($userId, $cart)
    {
        $total = $cart->products->sum(fn($p) => $this->calculateProductPrice($p) * $p->pivot->quantity);

        return $this->orderRepository->createOrder($userId, $total);
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

            $this->orderRepository->storeOrderDetails($order, $product, $qty);
            $product->decrement('stock_quantity', $qty);
        }
    }
}
