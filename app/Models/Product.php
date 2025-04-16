<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function carts(){
        return $this->belongsToMany(Cart::class);
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
}
