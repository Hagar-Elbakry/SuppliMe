<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'governate',
        'phone',
        'order_id',
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
