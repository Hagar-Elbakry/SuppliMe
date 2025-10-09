<?php

namespace App\Services;

use App\Repositories\ShoppingRepository;

class ShoppingService
{
    public $shoppingRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(ShoppingRepository $shoppingRepository)
    {
        $this->shoppingRepository = $shoppingRepository;
    }

    public function getCategoriesAndProducts()
    {
        $categoryId = request()->query('category');
        return $this->shoppingRepository->getCategoriesAndProducts($categoryId);
    }
}
