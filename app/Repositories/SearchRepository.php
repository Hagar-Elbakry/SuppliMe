<?php

namespace App\Repositories;

use App\Models\Product;

class SearchRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getResults($search)
    {
        return Product::where('name', 'like', "%{$search}%")->paginate(3);
    }
}
