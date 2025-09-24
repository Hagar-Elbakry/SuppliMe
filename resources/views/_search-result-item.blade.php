<div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2">
    <div class="card h-100 shadow-sm">
        <img src="{{'storage/'.$product->image}}"
             class="card-img-top img-fluid"
             style="height: 180px; object-fit: cover;"
             alt="Red Apple">
        <div class="card-body text-center">
            <h6 class="card-title mb-1">{{$product->name}}</h6>
            <p class="text-muted small mb-1">{{$product->weight}} Kg</p>
            @if($discountService->activeDiscount())
                <p class="text-nowrap">
                    ${{ $discountService->getDiscountedPrice($product) }}
                    <del class="text-black-50 ms-2">${{ $product->price }}</del>
                </p>
            @else
                <p class="text-nowrap">${{ $product->price }}</p>
            @endif
            <form action="{{ route('cart.store', $product->id) }}" method="POST"
                  class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2">
                @csrf
                @if($product->stock_quantity > 0)
                    <button type="submit" class="btn btn-sm" style="background-color: #b2f2bb; color: #155724;">
                        <i class="bi bi-bag fs-6"></i> Add To Cart
                    </button>
                @else
                    <button type="button" class="btn btn-secondary" disabled>
                        <i class="bi bi-bag fs-6"></i> Out of Stock
                    </button>
                @endif
            </form>
        </div>
    </div>
</div>
