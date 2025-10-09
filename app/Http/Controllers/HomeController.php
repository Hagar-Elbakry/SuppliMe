<?php

namespace App\Http\Controllers;

use App\Services\HomeService;

class HomeController extends Controller
{
    public $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function __invoke()
    {
        list($categories, $featuredProducts, $dailyOffers, $bestSellers) = $this->homeService->getData();
        return view('home', compact('categories', 'featuredProducts', 'dailyOffers', 'bestSellers'));
    }
}
