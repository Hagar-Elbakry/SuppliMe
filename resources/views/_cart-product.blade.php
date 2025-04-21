<div
    class="item d-flex justify-content-between align-items-center gap-5 px-4 py-4 border-bottom border-secondary-subtle"
>
    <div
        class="item-ph d-flex justify-content-between align-items-center gap-2"
    >
        <form action="{{ route('cart.destroy', $product->id) }}') }}" method="POST" >
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </form>
        <div class="image mx-2">
            <img
                src="{{ asset($product->image) }}"
                class="img-fluid rounded-4 border border-secondary-subtle d-none d-md-block"
                alt="{{ $product->name }}"
                style="width: 80px; height: 80px"
            />
        </div>
        <div class="iname">
            <p class="fw-medium">{{ $product->name }}</p>
            <p class="text-black-50">{{ $product->weight }} g</p>
        </div>
    </div>
    <div
        class="item-disc d-flex justify-content-between align-items-center gap-5"
    >

            <p>${{ $product->price }}</p>

        <div
            class="quan d-flex justify-content-between align-items-center gap-4 rounded-pill border border-secondary px-1"
        >
            <a href="{{ route('cart.updateQuantity', ['product_id' => $product->id, 'action' => 'decrease']) }}">
                <i class="fa-solid fa-minus px-1 text-dark"></i>
            </a>
            <p
                class="mb-0 border-end border-start border-secondary fs-4 px-3"
            >
                {{ $product->pivot->quantity }}
            </p>
            <a href="{{ route('cart.updateQuantity', ['product_id' => $product->id, 'action' => 'increase']) }}">
                <i class="fa-solid fa-plus px-1 text-dark"></i>
            </a>
        </div>
        <p>${{ $product->pivot->quantity * $product->price }}</p>
    </div>
</div>
