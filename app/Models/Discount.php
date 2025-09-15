<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'discount_percentage',
        'discount_type',
        'is_daily',
        'product_id',
        'category_id',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'is_daily' => 'boolean',
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::saving(function ($discount) {
            if ($discount->discount_type === 'product') {
                $discount->category_id = null;
            } elseif ($discount->discount_type === 'category') {
                $discount->product_id = null;
            }
        });
    }

}
