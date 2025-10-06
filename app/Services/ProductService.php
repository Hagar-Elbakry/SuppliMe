<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{

    public $productRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts($product)
    {
        {
            return $this->productRepository->getProduct($product);
        }
    }
}
