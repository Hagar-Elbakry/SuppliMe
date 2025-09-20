<x-head>
    <link rel="stylesheet" href="/assets/css/about.css"/>
    <link rel="stylesheet" href="/assets/css/myorders.css"/>
    <x-nav/>
    <div class="search" style="margin-top: 100px; margin-bottom: 100px;">

        <div class="container mt-4">
            <h3 class="mb-4">Search Results for "<span id="searchTerm">{{request('search')}}</span>"</h3>

            <div class="row justify-content-center" id="searchResults">
                @forelse($products as $product)
                    <x-shop-product-cart class="me-3 mt-2" :product="$product"/>
                @empty
                    <div class="empty-results text-center">
                        <lottie-player
                            src="{{ asset('animations/empty-cart.json') }}"
                            background="transparent"
                            speed="1"
                            style="width: 300px; height: 300px; margin: auto;"
                            loop
                            autoplay>
                        </lottie-player>
                        <h1 class="error-code">404</h1>
                        <p class="error-message">Oops! No products found matching your search.</p>
                        <a href="{{ url('/') }}" class="btn-back">Back to Home</a>
                    </div>
                @endforelse
                <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                {{$products->appends(request()->query())->links()}}
                </div>
            </div>
        </div>

    </div>
    <x-footer/>
</x-head>
