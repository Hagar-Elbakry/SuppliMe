<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'weight', 'image', 'category_id', 'stock_quantity', 'is_featured'
    ];
    protected $casts = [
        'price' => 'float',
        'weight' => 'float',
        'stock_quantity' => 'integer',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)
            ->withPivot('quantity');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user', 'product_id', 'user_id')
            ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function scopeFilterByCategory($query, $categoryId)
    {
        if ($categoryId && !Category::where('id', $categoryId)->exists()) {
            abort(404);
        }
        return $query->when($categoryId, fn($q) => $q->where('category_id', $categoryId));
    }


}
