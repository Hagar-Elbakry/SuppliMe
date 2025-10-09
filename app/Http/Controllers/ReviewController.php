<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    public $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function store(StoreRatingRequest $request)
    {
        $review = $this->reviewService->storeReview($request);
        return redirect()->back()->with('rating', $review->rate);
    }
}
