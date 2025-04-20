<x-head>
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/product-details.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Shop</h1>
    <p>
        <a href="./supplime2.html" class="text-decoration-none text-dark"
        >Home /
        </a>
        <a href="/shop" class="text-decoration-none text-dark"
        >Shop /</a
        >
        <a href="" class="text-decoration-none text-dark"
        >Product Details</a
        >
    </p>
</div>
<div class="product-details">
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <div class="product-card row d-flex gap-4">
            <div
                class="col-md-5 product-image p-2 border border-1 rounded-5 text-center"
            >
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"  />
            </div>
            <div class="col-md-6">
                <p class="text-success fw-medium fs-4 mb-0">{{ $product->category->name }}</p>
                <h3>{{ $product->name }}</h3>
                
        <form action="{{ route('review.store') }}" method="post" id="rating-form">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="rating" id="rating-value" value="{{ session('rating') ?? '' }}">
            <div class="stars" id="rating1">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star{{ $i <= session('rating') ? '-fill' : '' }}" data-rating="{{ $i }}" style="color: gold;"></i>
                @endfor
            </div>
            <button type="submit" class="btn btn-warning mt-3">Rate</button>
        </form>
                @if ($product->activeDiscount())
                    <div class="mb-2">
                        <p class="fw-medium fs-5">
                            ${{ $product->getDiscountedPrice() }} <del class="text-black-50 ms-2">${{ $product->price }}</del>
                        </p>
                    </div>
                @else
                    <div class="mb-2">
                        <p class="fw-medium fs-5">
                            ${{ $product->price }} 
                        </p>
                    </div>
                @endif
                <p class="text-muted">
                    {{ $product->description }}
                </p>
                <div class="weight">
                    <h5>Weight</h5>
                    <div class="weight-info d-flex justify-content-start align-items-center gap-3 mb-2">
                        {{ $product->weight }}g
                    </div>
                </div>
                <div class="d-flex gap-2 border-bottom border-2 pb-2">

                    <div class="add align-items-center d-flex text-nowrap">
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
                    <a href="" class="text-decoration-none text-dark m-lg-5">
                        <i class="fa-regular fa-heart fs-3 "></i
                        ></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="featured">
            <div class="container mt-5">
                <div class="text d-flex justify-content-center align-items-center">
                    <div class="label text-center">
                        <p class="pt-3 fs-4 mb-1">Relates Products</p>
                        <h2 class="">Explore<span>Related Products </span></h2>
                    </div>
                </div>
                <div
                    class="arrows d-flex justify-content-end align-items-start p-2 gap-1 text-light rounded-3"
                >
                    <i
                        class="fa-solid fa-arrow-right text-light rounded-circle arrow p-1"
                        onclick="slide(1, 1)"
                    ></i>
                    <i
                        class="fa-solid fa-arrow-left text-light rounded-circle arrow p-1"
                        onclick="slide(-1, 1)"
                    ></i>
                </div>
                <div
                    class="row pb-5 mt-4 d-flex flex-nowrap justify-content-between align-items-center gap-5 overflow-x-hidden"
                >
                        @foreach($RelatedProducts as $product)
                            <x-product-cart class="border border-1 border-black" :product="$product"/>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
</x-head>
