<?php

namespace App\Models;

use App\Enums\ShippingStatus;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'status',
        'order_id',
        'user_id',
        'tracking_number',
        'estimated_delivery',
    ];
    protected $casts = [
        'status' => ShippingStatus::class,
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
