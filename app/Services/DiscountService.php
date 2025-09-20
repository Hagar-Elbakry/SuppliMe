<?php

namespace App\Services;

use App\Models\Product;

class DiscountService
{
    public function activeDailyDiscount()
    {
        return Product::all()->filter(function ($product) {
            list($productDiscount, $categoryDiscount) = $this->getAllActiveDiscountsForProduct($product);

            return ($productDiscount && $productDiscount->is_daily) ||
                ($categoryDiscount && $categoryDiscount->is_daily);
        });
    }

    /**
     * @return array
     */
    public function getAllActiveDiscountsForProduct(Product $product): array
    {
        $discounts = $this->activeDiscount($product);
        $productDiscount = $discounts['product'];
        $categoryDiscount = $discounts['category'];
        return array($productDiscount, $categoryDiscount);
    }

    public function activeDiscount(Product $product): array
    {
        return [
            'product' => $this->getProductDiscount($product),
            'category' => $this->getCategoryDiscount($product)
        ];
    }

    public function getProductDiscount(Product $product)
    {
        $productDiscount = $product->discounts()->where('discount_type', 'product')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();
        return $productDiscount;
    }

    /**
     * @return mixed
     */
    public function getCategoryDiscount(Product $product)
    {
        $categoryDiscount = $product->category->activeDiscount();
        return $categoryDiscount;
    }

    public function getDiscountedPrice(Product $product)
    {
        $discountPercentage = $this->getDiscountPercentage($product);
        return $discountPercentage ? $product->price - ($product->price * ($discountPercentage / 100)) : $product->price;
    }

    public function getDiscountPercentage(Product $product)
    {
        list($productDiscount, $categoryDiscount) = $this->getAllActiveDiscountsForProduct($product);
        $totalDiscount = $this->getTotalDiscount($productDiscount, $categoryDiscount);
        return $totalDiscount;
    }

    /**
     * @param  mixed  $productDiscount
     * @param  mixed  $categoryDiscount
     * @return int|mixed
     */
    public function getTotalDiscount(mixed $productDiscount, mixed $categoryDiscount): mixed
    {
        $totalDiscount = 0;
        if ($productDiscount) {
            $totalDiscount += $productDiscount->discount_percentage;
        }
        if ($categoryDiscount) {
            $totalDiscount += $categoryDiscount->discount_percentage;
        }
        return $totalDiscount;
    }
}
