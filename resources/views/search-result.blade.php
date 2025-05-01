<x-head>
    <link rel="stylesheet" href="/assets/css/about.css"/>
    <link rel="stylesheet" href="/assets/css/myorders.css"/>
    <x-nav/>
    <div class="search" style="margin-top: 100px; margin-bottom: 100px;">

        <div class="container mt-4">
            <h3 class="mb-4">Search Results for "<span id="searchTerm">{{request('search')}}</span>"</h3>

            <div class="row justify-content-center" id="searchResults">
                @forelse($products as $product)
                    <x-shop-product-cart class="me-3" :product="$product"/>
                @empty
                    <div class="alert alert-success text-center" role="alert" id="empty-cart">
                        <h4 class="alert-heading">No products matching your search.</h4>
                    </div>
                @endforelse

            </div>
        </div>

    </div>
    <x-footer/>
</x-head>
