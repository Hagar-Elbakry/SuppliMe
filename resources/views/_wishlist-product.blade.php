<div
    class="item d-flex justify-content-between align-items-center gap-5 px-4 py-4 border-bottom border-secondary-subtle"
>
    <div
        class="item-ph d-flex justify-content-between align-items-center gap-2"
    >
        <form action="{{ route('favourite.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </form>
        <div class="image mx-2">
            <img
                src="{{ asset('storage/'.$product->image) }}"
                class="img-fluid rounded-4 border border-secondary-subtle d-none d-md-block"
                alt=""
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
        <form action="{{ route('cart.store', $product->id) }}" method="POST"
              class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2">
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
