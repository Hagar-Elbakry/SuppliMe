<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function discounts(){
        return $this->hasMany(Discount::class);
    }
    
    public function activeDiscount(){
        return $this->discounts()->where('discount_type','category')
        ->where('start_date','<=',now())
        ->where('end_date','>=',now())
        ->first();
        
    }
}
