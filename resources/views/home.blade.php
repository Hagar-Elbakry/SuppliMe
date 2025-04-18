<x-head>
    <x-nav/>
    <div
        class="sidebar d-block d-sm-flex justify-content-between align-items-center px-5 pt-3 pb-0"
    >
        <div class="container d-flex justify-content-between align-items-center">
            <div class="cat d-flex justify-content-center align-items-center">
                <a href="" class="text-decoration-none text-dark"
                ><i class="fas fa-bars px-2 icon"></i>
                </a>
                <p class="fw-bold fs-6 text-nowrap">All Categories</p>
            </div>
            <div class="links">
                <ul
                    class="list-unstyled d-flex justify-content-center align-items-center gap-4"
                >
                    <x-link href="/" :active="request()->is('/')">Home</x-link>
                    <x-link href="/about">About</x-link>
                    <x-link href="/shop">Shop</x-link>
                    <x-link href="/contact">Contact Us</x-link>
                </ul>
            </div>
        </div>
    </div>
    <div class="allcat position-absolute">
        <div class="container">
            <ul class="category list-unstyled fs-4">
                <x-category-link href="">Fruits</x-category-link>
                <x-category-link href="">Vegetables</x-category-link>
                <x-category-link href="">Drinks</x-category-link>
                <x-category-link href="">Dry Fruit</x-category-link>
                <x-category-link href="">Oil</x-category-link>
                <x-category-link href="">Bakery Items</x-category-link>
                <x-category-link href="">Milk Shake</x-category-link>
                <x-category-link href="">Detergents</x-category-link>
                <x-category-link href="">Milk & Eggs</x-category-link>
            </ul>
        </div>
    </div>
    <div class="landing d-flex justify-content-between align-items-center p-5">
        <div class="disc col-lg-6 col-md-6">
            <h1 class="text-center text-md-start">
                Your One-Stop Shop For <span>Quality Groceries</span>
            </h1>
            <p class="text-black-50 mt-4 mb-5 text-center text-md-start">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio sed,
                mollitia quia debitis eligendi nobis vel corrupti modi tenetur
                adipisci a laudantium molestias labore fuga quis incidunt doloremque
                fugiat beatae.
            </p>
            <div
                class="buttons d-flex align-items-center justify-content-center justify-content-md-start"
            >
                <a
                    class="btn rounded-3 text-light main-btn mt-3"
                    href="./item.html"
                    target="_blank"
                >
                    Shop Now
                </a>
                <a
                    href=""
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
            {{--start loop--}}
            @include('_category')
            {{--end loop--}}
        </div>
    </div>
    <div
        class="offer px-5 pt-5 d-flex justify-content-between align-items-center gap-3"
    >
        {{--start loop--}}
        @include('_discount')
        {{--end loop--}}
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
                {{--start loop--}}
                @include('_product-cart')
                {{--end loop--}}
            </div>
        </div>
    </div>
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
                {{--start loop--}}
                @include('_deals')
                {{--end loop--}}
            </div>
        </div>
    </div>
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
                {{--start loop--}}
                @include('_product-cart')
                {{--end loop--}}
            </div>
        </div>
    </div>
    <x-footer/>
</x-head>
