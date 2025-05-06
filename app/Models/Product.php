<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
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
    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user', 'product_id', 'user_id')
                    ->withTimestamps();
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function discounts(){
        return $this->hasMany(Discount::class);
    }

    public function activeDiscount()
    {
        $productDiscount = $this->discounts()->where('discount_type', 'product')
                            ->where('start_date', '<=', now())
                            ->where('end_date', '>=', now())
                            ->first();
        $categoryDiscount = $this->category->activeDiscount();
        return [
            'product' => $productDiscount,
            'category' => $categoryDiscount
        ];
    }

    public static function activeDailyDiscount()
    {
        return self::all()->filter(function ($product) {
            $discounts = $product->activeDiscount();
            $productDiscount = $discounts['product'];
            $categoryDiscount = $discounts['category'];

            return ($productDiscount && $productDiscount->is_daily) || 
                ($categoryDiscount && $categoryDiscount->is_daily);
        });
    }

    public function getDiscountPercentage()
    {
        $discounts = $this->activeDiscount();
        $productDiscount = $discounts['product'];
        $categoryDiscount = $discounts['category'];
        $totalDiscount = 0;
        if ($productDiscount) {
            $totalDiscount += $productDiscount->discount_percentage;
        }
        if ($categoryDiscount) {
            $totalDiscount += $categoryDiscount->discount_percentage;
        }
        return $totalDiscount;
    }

    public function getDiscountedPrice()
    {
        $discountPercentage = $this->getDiscountPercentage();
        return $discountPercentage ? $this->price - ($this->price * ($discountPercentage / 100)) : $this->price;
    }
}
