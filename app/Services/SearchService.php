<?php

namespace App\Services;

use App\Repositories\SearchRepository;

class SearchService
{
    public $searchRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function getResults($request)
    {
        $search = $request->input('search');
        return $this->searchRepository->getResults($search);
    }

}
