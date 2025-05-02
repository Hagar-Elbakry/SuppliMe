<x-head>
    <link rel="stylesheet" href="/assets/css/about.css"/>
    <link rel="stylesheet" href="/assets/css/shop.css"/>
    <x-nav/>
    <div class="main-title text-center pt-5">
        <h1>Shop</h1>
        <x-header href="/shop">Shop</x-header>
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
                {{-- <div class="slide mt-4 d-flex justify-content-center align-items-center gap-3 fw-medium">
                    <a href=""><i class="bi bi-chevron-left mt-1 text-decoration-none text-dark"></i></a>
                    <a href="" class="text-decoration-none text-light one py-1 px-2 rounded-circle">1</a>
                    <a href="" class="text-decoration-none text-dark py-1 px-2">2</a>
                    <a href="" class="text-decoration-none text-dark py-1 px-2">3</a>
                    <a href=""><i class="bi bi-chevron-right mt-1 text-decoration-none text-dark"></i></a>
                </div> --}}
                <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                    {{ $products->appends(['category' => request('category')])->links('vendor.pagination.bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
    <x-footer/>
</x-head>
