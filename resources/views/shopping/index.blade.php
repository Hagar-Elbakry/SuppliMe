<x-head>
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/shoppingcart.css')}}"/>
    <x-nav/>
    <div class="main-title text-center pt-5">
        <h1>Shop</h1>
        <x-header href="{{route('shop.index')}}">Shop</x-header>
    </div>
    <div class="shop">
        <div
            class="container d-flex justify-content-start align-items-start gap-5"
        >
            @include('_category-options')

            <div class="food d-flex flex-column">
                <div
                    class="row d-flex justify-content-center align-items-center gap-4"
                >
                    @forelse($products as $product)
                        <x-shop-product-cart :product="$product"/>
                    @empty
                        <div class="alert alert-success text-center" role="alert" id="empty-cart">
                            <h4 class="alert-heading">No Products Found !</h4>
                            <p>Try to change the category or check back later.</p>

                        </div>

                    @endforelse

                </div>
                <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                    {{ $products->appends(['category' => request('category')])->links('vendor.pagination.bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
    <x-footer/>
</x-head>
