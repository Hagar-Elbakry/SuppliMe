<?php
namespace App\Services;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public function placeOrder($cart)
    {
        DB::beginTransaction();

        try {

            $order = Order::create([
                'user_id'          => Auth::id(),
                'total_price'            => $cart->products->sum(function($p){
                    $price  = $p->getDiscountPercentage() > 0 ? $p->getDiscountedPrice() : $p->price;
                    return $price * $p->pivot->quantity;
                }) ,

            ]);


            foreach ($cart->products as $product) {
                $qty = $product->pivot->quantity;
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price' => $product->price,
                    'sub_total' => $product->price * $qty,
                ]);


                if ($product->stock_quantity < $qty) {
                    DB::rollBack();
                    throw new \Exception('Not enough stock for product: ' . $product->name);
                }

                $product->decrement('stock_quantity', $qty);
            }


            $cart->products()->detach();


            Shipping::create([
                'tracking_number' => 'TRK-' . strtoupper(uniqid()),
                'order_id' => $order->id,
                'user_id' => Auth::id(),
                'estimated_delivery' => now()->addDays(5),
            ]);

            DB::commit();
            return $order;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
