<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavouriteProductRequest;
use App\Models\Product;
use App\Services\DiscountService;
use App\Services\FavouriteService;

class FavouriteController extends Controller
{

    public $favouriteService;

    public function __construct(FavouriteService $favouriteService)
    {
        $this->favouriteService = $favouriteService;
    }

    public function index(DiscountService $discountService)
    {
        $favouriteProducts = $this->favouriteService->getFavouriteProducts($discountService);
        return view('favourite.index', compact('favouriteProducts'));
    }

    public function store(StoreFavouriteProductRequest $request)
    {
        $this->favouriteService->storeFavouriteProduct($request);

        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $this->favouriteService->deleteFavouriteProduct($product->id);
        return back();
    }

    public function destroyAll()
    {
        $this->favouriteService->deleteAllFavoriteProducts();
        return redirect()->back();
    }

    public function addAllToCart()
    {
        $this->favouriteService->addAllFavoriteToCart();
        return redirect()->route('cart.index');
    }
}
