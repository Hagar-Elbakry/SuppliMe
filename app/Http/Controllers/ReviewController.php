<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(StoreRatingRequest $request)
    {
        $request->validated();
        $review = Review::updateOrCreate(
            [
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
            ],
            [
                'rate' => $request->rating,
            ]
        );
        return redirect()->back()->with('rating', $review->rate);

    }
}
