<?php

namespace App\Services;

use App\Repositories\HomeRepository;

class HomeService
{
    public $homeRepository, $discountService;

    /**
     * Create a new class instance.
     */
    public function __construct(HomeRepository $homeRepository, DiscountService $discountService)
    {
        $this->homeRepository = $homeRepository;
        $this->discountService = $discountService;
    }

    public function getData()
    {
        return $this->homeRepository->getData($this->discountService);
    }
}
