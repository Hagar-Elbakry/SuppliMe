<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id'
    ];
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function carts(){
        return $this->belongsToMany(Cart::class)
        ->withPivot('quantity');
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function discounts(){
        return $this->hasMany(Discount::class);
    }

    public function activeDiscount(){
        return $this->discounts()->where('discount_type','product')
        ->where('start_date','<=',now())
        ->where('end_date','>=',now())
        ->first();
    }
    public static function activeDaliyDiscount(){
        return self::all()->filter(function($product){
            $discount = $product->activeDiscount();
            return $discount && $discount->is_daily ;
        });
    }
    public function getDiscountPercentage(){
        $productDiscount = $this->activeDiscount();
        $categoryDiscount = $this->category->activeDiscount();
        return $productDiscount ? $productDiscount->discount_percentage : ($categoryDiscount ? $categoryDiscount->discount_percentage : 0);
    }
    public function getDiscountedPrice(){
        $discount  = $this->getDiscountPercentage();
        return $discount ? $this->price -($this->price*($discount/100)) : $this->price;
    }
}
