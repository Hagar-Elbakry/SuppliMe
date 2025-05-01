<div
    {{$attributes->merge(['class' => 'product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black'])}}
>
    <div
        class="image d-flex justify-content-center align-items-start position-relative"
    >
        <div
        class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
    >
        @if($product->activeDiscount())
            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                {{ intval($product->activeDiscount()->discount_percentage) }}% off
            </p>
        @endif

        <form action="{{ route('favourite.store') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn p-0 border-0 bg-white rounded-circle">
                <i class="bi {{ auth()->check() && auth()->user()->products->contains($product->id) ? 'bi-heart-fill text-danger' : 'bi-heart text-secondary' }} fs-4 p-2"></i>
            </button>
        </form>

    </div>
        <img
            src="{{ asset($product->image) }}"
            class="img-fluid"
            alt="{{ $product->name }}"
        />
    </div>
    <div
        class="item-content d-flex justify-content-between gap-3 flex-column"
    >
        <div class="disc">
            <div
                class="name d-flex justify-content-between align-items-start"
            >
                <p>{{ $product->category->name }}</p>
                <div
                    class="rate d-flex justify-content-between align-items-start gap-1"
                >
                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                    <p class="">4.8</p>
                </div>
            </div>
            <h6 class="cust-h">{{ $product->name }}</h6>
        </div>
        <div class="price">
            <p class="mb-0 text-black-50">{{ $product->weight }}g</p>
            <div
                class="add d-flex justify-content-between align-items-start gap-2"
            >
                @if($product->activeDiscount())
                <p class="text-nowrap">
                    ${{ $product->getDiscountedPrice() }} <del class="text-black-50 ms-2">${{ $product->price }}</del>
                </p>
                @else
                    <p class="text-nowrap">${{ $product->price }}</p>
                @endif
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
    </div>
</div>
