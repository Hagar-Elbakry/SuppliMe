<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'shipping_address',
        'shipping_cost',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function shipping(){
        return $this->hasOne(Shipping::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
    }
}
