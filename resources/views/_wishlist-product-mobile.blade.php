<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="mb-0">{{ $product->name }}<small class="text-muted">{{ $product->weight }}g</small></h6>
            <form action="{{ route('favourite.destroy', $product->id) }}') }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    &times;
                </button>
            </form>
        </div>
        <div class="d-flex align-items-center mb-2">
            <img src="{{ asset('storage/'.$product->image) }}" class="rounded me-3" alt="{{ $product->name }}" style="width: 50px; height: 50px;">
            <div>
                <div><strong>Price:</strong> ${{ $product->price }}</div>
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
