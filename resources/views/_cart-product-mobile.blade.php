<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="mb-0">{{ $product->name }}<small class="text-muted">{{ $product->weight }} g</small></h6>
            <form action="{{ route('cart.destroy', $product->id) }}') }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">&times;</button>
            </form>
        </div>
        <div class="d-flex align-items-center mb-2">
            <img src="{{ asset($product->image) }}" class="rounded me-3" alt={{ $product->name }}>
            <div>
                <div><strong>Price:</strong> ${{ $product->price }}</div>
                <div><strong>Subtotal:</strong> ${{ $product->pivot->quantity * $product->price }}</div>
            </div>
        </div>
        <div class="quan d-flex justify-content-start align-items-center gap-4 rounded-pill border border-secondary px-1" style="width: fit-content;">
            <a href="{{ route('cart.updateQuantity', ['product_id' => $product->id, 'action' => 'decrease']) }}">
                <i class="fa-solid fa-minus px-1 text-dark"></i>
            </a>
            <p class="mb-0 border-end border-start border-secondary fs-4 px-3">{{ $product->pivot->quantity }}</p>
            <a href="{{ route('cart.updateQuantity', ['product_id' => $product->id, 'action' => 'increase']) }}">
                <i class="fa-solid fa-plus px-1 text-dark"></i>
            </a>
        </div>
    </div>
</div>
