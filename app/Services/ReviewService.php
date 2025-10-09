<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService
{

    public $reviewRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function storeReview($request)
    {
        return $this->reviewRepository->storeReview($request);
    }
}
