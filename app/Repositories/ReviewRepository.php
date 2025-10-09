<?php

namespace App\Repositories;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function storeReview($request)
    {
        $review = Review::query()->updateOrCreate(
            [
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
            ],
            [
                'rate' => $request->rating,
            ]
        );
        return $review;
    }

}
