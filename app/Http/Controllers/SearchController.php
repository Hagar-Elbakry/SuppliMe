<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\SearchService;


class SearchController extends Controller
{
    public $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function __invoke(SearchRequest $request)
    {
        $products = $this->searchService->getResults($request);
        return view('search-result', compact('products'));
    }
}
