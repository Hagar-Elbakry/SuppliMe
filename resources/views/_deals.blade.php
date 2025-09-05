<div
    class="item border-2 border border-black rounded-5 p-3 d-flex justify-content-between align-items-center gap-3"
>
    <div class="image position-relative">
        <div
            class="fav position-relative w-100"
        >
            <p class="rounded-3 py-1 px-2 text-light position-absolute top-0 start-0 m-2 z-2" style="min-width: 60px; text-align: center; ">
                {{ intval($product->getDiscountPercentage()) }}% off
            </p>
            <form action="{{ route('favourite.store') }}" method="post" class="position-absolute start-0 ms-2 z-1" style="top: 50px; left: 10px;">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn p-0 border-0 bg-white rounded-circle">
                    <i class="bi {{ auth()->check() && auth()->user()->products->contains($product->id) ? 'bi-heart-fill text-danger' : 'bi-heart text-secondary' }} fs-4 p-2"></i>
                </button>
            </form>
        </div>
        <a href="{{route('product.show', $product)}}">
            <img src={{ asset('storage/'.$product->image) }} alt="{{ $product->name }}" style="width: 300px; height:300px; object-fit: contain;" />
        </a>
    </div>
    <div class="item-disc">
        <p class="fs-5">{{ $product->category->name }}</p>
        <h5 class="cust-h">{{ $product->name }}</h5>

            <p class="text-nowrap">
                ${{ $product->getDiscountedPrice() }} <del class="text-black-50 ms-2">${{ $product->price }}</del>
            </p>

        <div
            class="rate d-flex justify-content-start align-items-start gap-2 fs-5"
        >
            <i class="bi bi-star-fill" style="color: #f8c519"></i>
            <p class="">4.8</p>
        </div>
        <p class="text-black-50">
            {{ $product->description }}
        </p>
        <form action="{{ route('cart.store', $product->id) }}" method="POST" class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2">
            @csrf
            @if($product->stock_quantity > 0)
                        <button type="submit" class="btn btn-sm" style="background-color: #b2f2bb; color: #155724;">
                            <i class="bi bi-bag fs-6"></i> Add
                        </button>
            @else
                        <button type="button" class="btn btn-secondary" disabled>
                            <i class="bi bi-bag fs-6"></i> Out of Stock
                        </button>
            @endif
        </form>
    </div>
</div>
