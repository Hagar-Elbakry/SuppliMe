<x-head>
    <x-nav/>
    <div class="landing d-flex justify-content-between align-items-center p-5">
        <div class="disc col-lg-6 col-md-6">
            <h1 class="text-center text-md-start">
                Your One-Stop Shop For <span>Quality Groceries</span>
            </h1>
            <p class="text-black-50 mt-4 mb-5 text-center text-md-start">
                Welcome to SuppliMe!
                Your one-stop online supermarket for all your daily needs.
                At SuppliMe, we bring you a seamless shopping experience with top-quality products, unbeatable daily offers, and fast delivery right to your doorstep.
                Whether you’re stocking up the kitchen or grabbing last-minute essentials — we’ve got you covered.
            </p>
            <div
                class="buttons d-flex align-items-center justify-content-center justify-content-md-start"
            >
                <a
                    class="btn rounded-3 text-light main-btn mt-3"
                    href="{{route('shop.index')}}"
                    target="_blank"
                >
                    Shop Now
                </a>
                <a
                    href="{{route('shop.index')}}"
                    class="text-dark p-1 text-decoration-none mt-3 p-1 border-bottom border-black"
                >View All Products</a
                >
            </div>
        </div>
        <div class="image col-lg-6 col-md-6 d-none d-md-block">
            <img src="/assets/imgs/Home.png" class="img-fluid" alt=""/>
        </div>
    </div>
    <div class="catgories px-5">
        <div
            class="label d-flex justify-content-between align-items-center border-bottom border-2 pb-2"
        >
            <h4 class="fw-bold text-nowrap">Shop By Category</h4>
            <div class="arrows">
                <i
                    class="fa-solid fa-arrow-left text-black-50 rounded-circle arrow p-1"
                    onclick="scrollSlider(-1)"
                ></i>
                <i
                    class="fa-solid fa-arrow-right text-black-50 rounded-circle arrow p-1"
                    onclick="scrollSlider(1)"
                ></i>
            </div>
        </div>
        <div class="items p-3 d-flex flex-row overflow-x-hidden text-nowrap">
            @foreach($categories as $category)
            @include('_category')
            @endforeach

        </div>
    </div>
    <div
        class="offer px-5 pt-5 d-flex justify-content-between align-items-center gap-3"
    >
        @foreach ($categories as $category)
            @if($category->activeDiscount())
            <x-discount :color="$category->color"  :discount="$category->activeDiscount()->discount_percentage"  :category="$category"  :description="$category->description"  :img="$category->image"/>
            @endif
        @endforeach

    </div>
    <div class="featured">
        <div class="container mt-5">
            <div class="text d-flex justify-content-between align-items-center">
                <div class="label">
                    <p class="pt-3 fs-4 mb-1">Products</p>
                    <h2 class="">Featured <span>Products</span></h2>
                </div>
                <div
                    class="arrows d-flex justify-content-between align-items-start p-2 gap-1 text-light rounded-3"
                >
                    <p class="mb-0 me-1 d-none d-md-block">View All products</p>
                    <i
                        class="fa-solid fa-arrow-right text-light rounded-circle arrow p-1"
                        onclick="slide(1, 0)"
                    ></i>
                    <i
                        class="fa-solid fa-arrow-left text-light rounded-circle arrow p-1"
                        onclick="slide(-1, 0)"
                    ></i>
                </div>
            </div>
            <div
                class="row pb-5 mt-4 d-flex flex-nowrap justify-content-between align-items-center gap-5 overflow-x-hidden"
            >
                @foreach ($featuredProducts as $product)
                    <x-product-cart :product="$product"/>
                @endforeach

            </div>
        </div>
    </div>
    @if($dailyOffers->count() > 0)
        <div class="deals">
            <div class="container">
                <div class="text d-flex justify-content-between align-items-center">
                    <div class="label">
                        <p class="pt-3 fs-4 mb-1">Today Deals</p>
                        <h2 class=""><span>Deals</span> of the Day</h2>
                    </div>
                </div>

                <div
                    class="products mt-4 d-flex justify-content-between align-items-center gap-4"
                >
                    @foreach ($dailyOffers as $product)
                        @include('_deals')
                    @endforeach

                </div>
            </div>
        </div>
    @endif
    <div class="featured">
        <div class="container mt-5">
            <div class="text d-flex justify-content-between align-items-center">
                <div class="label">
                    <p class="pt-3 fs-4 mb-1">Best Seller</p>
                    <h2 class=""><span>Best Seller </span>Products</h2>
                </div>
                <div
                    class="arrows d-flex justify-content-between align-items-start p-2 gap-1 text-light rounded-3"
                >
                    <p class="mb-0 me-1 d-none d-md-block">View All products</p>
                    <i
                        class="fa-solid fa-arrow-right text-light rounded-circle arrow p-1"
                        onclick="slide(1, 1)"
                    ></i>
                    <i
                        class="fa-solid fa-arrow-left text-light rounded-circle arrow p-1"
                        onclick="slide(-1, 1)"
                    ></i>
                </div>
            </div>
            <div
                class="row pb-5 mt-4 d-flex flex-nowrap justify-content-between align-items-center gap-5 overflow-x-hidden"
            >
                @foreach ($bestSellers as $product)
                    <x-product-cart :product="$product"/>
                @endforeach

            </div>
        </div>
    </div>
    <x-footer/>
</x-head>
