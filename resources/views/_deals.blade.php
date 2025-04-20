<div
    class="item border-2 border border-black rounded-5 p-3 d-flex justify-content-between align-items-center gap-3"
>
    <div class="image position-relative">
        <div
            class="fav d-flex justify-content-between align-items-start gap-2 w-100"
        >
            <p class="rounded-3 py-1 px-2 text-light position-absolute">
                {{ intval($product->activeDiscount()->discount_percentage) }}% off
            </p>
            <a
                href=""
                class="text-decoration-none text-dark position-absolute"
            ><i
                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                ></i>
            </a>
        </div>
        <a href="/product/{{$product->id}}">
            <img src={{ asset($product->image) }} alt="" />
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
