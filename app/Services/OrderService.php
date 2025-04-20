<?php
namespace App\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function placeOrder($cart)
    {
        DB::beginTransaction();

        try {
             // create order in order table in database
            $order = Order::create([
                'user_id'          => Auth::id(),
                'total_price'            => $cart->products->sum(function($p){
                    $price  = $p->activeDiscount() ? $p->getDiscountedPrice() : $p->price;
                    return $price * $p->pivot->quantity;
                }) ,
                'shipping_address' => Auth::user()->address,
                'shipping_cost'   => 20,
                'status'         => 'pending',  
            ]);

            // create order details in order_details table in database
            foreach ($cart->products as $product) {
                $qty = $product->pivot->quantity;
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price' => $product->price,
                    'sub_total' => $product->price * $qty,
                ]);
                
                // check if product has enough stock
                if ($product->stock_quantity < $qty) {
                    DB::rollBack();
                    throw new \Exception('Not enough stock for product: ' . $product->name);
                }
                // decrement product stock
                $product->decrement('stock_quantity', $qty);
            }

            // empty the cart
            $cart->products()->detach();

            DB::commit();
            return $order;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
