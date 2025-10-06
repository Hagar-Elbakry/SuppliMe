<?php

namespace App\Services;

use App\Repositories\FavouriteRepository;
use Illuminate\Support\Facades\Auth;

class FavouriteService
{

    public $favouriteRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(FavouriteRepository $favouriteRepository)
    {
        $this->favouriteRepository = $favouriteRepository;
    }

    public function getFavouriteProducts($discountService)
    {
        $favouriteProducts = $this->userProducts();
        $favouriteProducts->each(function ($product) use ($discountService) {
            if ($discountService->getDiscountPercentage($product) > 0) {
                $product->price = $discountService->getDiscountedPrice($product);
            }
        });
        return $favouriteProducts;
    }

    private function userProducts()
    {
        return Auth::user()->products()->get();
    }

    public function storeFavouriteProduct($request)
    {
        $userProducts = $this->userProducts();
        $this->favouriteRepository->storeFavouriteProduct($userProducts, $request);
    }

    public function deleteFavouriteProduct($productId)
    {
        $this->favouriteRepository->deleteFavouriteProduct($productId);
    }

    public function deleteAllFavoriteProducts()
    {
        $this->favouriteRepository->deleteAllFavouriteProduct();
    }

    public function addAllFavoriteToCart()
    {
        $favoriteProducts = $this->userProducts();
        $this->favouriteRepository->addAllFavoriteToCart($favoriteProducts);
    }
}
