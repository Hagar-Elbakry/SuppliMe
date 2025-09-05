<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    public function saved(Product $product): void
    {
            if($product->isDirty('image') && !is_null($product->getOriginal('image'))) {
                Storage::disk('public')->delete($product->getOriginal('image'));
            }
    }

    public function deleted(Product $product): void
    {
        if(!is_null($product->getOriginal('image'))) {
            Storage::disk('public')->delete($product->image);
        }
    }
}
