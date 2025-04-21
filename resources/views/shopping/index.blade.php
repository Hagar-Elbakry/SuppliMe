<x-head>
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/shop.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Shop</h1>
    <x-header href="/shop">Shop</x-header>
</div>
<div class="shop">
    <div
        class="container d-flex justify-content-between align-items-start gap-5"
    >
        <div class="options">
            <div class="shop-title p-2 border-bottom">
                <h4>Filter Options</h4>
            </div>
            <div class="shop-category p-2 border-bottom">
                <h5 class="py-2">Category</h5>
                <div class="category list-unstyled fs-4">
                    <x-category-input name="fruits" id="fruits">Fruits</x-category-input>
                    <x-category-input name="vegetables" id="vegetables">Vegetables</x-category-input>
                    <x-category-input name="drinks" id="drinks">Drinks</x-category-input>
                    <x-category-input name="dryFruit" id="dryFruit">Dry Fruit</x-category-input>
                    <x-category-input name="oil" id="oil">Oil</x-category-input>
                    <x-category-input name="bakeryItems" id="bakeryItems">Bakery Items</x-category-input>
                    <x-category-input name="milkShake" id="milkShake">Milk Shake</x-category-input>
                    <x-category-input name="detergents" id="detergents">Detergents</x-category-input>
                    <x-category-input name="milkAndEggs" id="milkAndEggs">Milk & Eggs</x-category-input>
                </div>
            </div>

        </div>
        <div class="food d-flex flex-column">
            <div
                class="row d-flex justify-content-center align-items-center gap-4"
            >
              
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/erasebg-transformed(1) 1.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 16.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 28.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 37.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 49.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 30.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 46.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 42.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 49.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 15.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 9.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product rounded-4 p-4 col-xs-12 col-sm-4 col-md-4 col-lg-3 border border-black"
                >
                    <div
                        class="image d-flex justify-content-center align-items-start position-relative"
                    >
                        <div
                            class="fav d-flex justify-content-between align-items-start gap-2 w-100 position-absolute"
                        >
                            <p class="rounded-5 rounded-start py-1 px-3 text-light">
                                20% off
                            </p>
                            <a href="" class="text-decoration-none text-dark"
                            ><i
                                    class="bi bi-heart fs-5 p-2 d-flex justify-content-center align-items-center"
                                ></i>
                            </a>
                        </div>
                        <img
                            src="/assets/imgs/image 10.png"
                            class="img-fluid"
                            alt=""
                        />
                    </div>
                    <div
                        class="item-content d-flex justify-content-between gap-3 flex-column"
                    >
                        <div class="disc">
                            <div
                                class="name d-flex justify-content-between align-items-start"
                            >
                                <p>Fruit</p>
                                <div
                                    class="rate d-flex justify-content-between align-items-start gap-1"
                                >
                                    <i class="bi bi-star-fill" style="color: #f8c519"></i>
                                    <p class="">4.8</p>
                                </div>
                            </div>
                            <h6 class="cust-h">Fresh Strawberry</h6>
                        </div>
                        <div class="price">
                            <p class="mb-0 text-black-50">400g</p>
                            <div
                                class="add d-flex justify-content-between align-items-start gap-2"
                            >
                                <p class="text-nowrap">
                                    $8.00 <del class="text-black-50 ms-2">$10.00</del>
                                </p>
                                <a
                                    href=""
                                    class="px-2 rounded-pill text-decoration-none d-flex align-items-start justify-content-between gap-2"
                                >
                                    <i class="bi bi-bag fs-6"></i>add</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide mt-4 d-flex justify-content-center align-items-center gap-3 fw-medium">
                <a href=""><i class="bi bi-chevron-left mt-1 text-decoration-none text-dark"></i></a>
                <a href="" class="text-decoration-none text-light one py-1 px-2 rounded-circle">1</a>
                <a href="" class="text-decoration-none text-dark py-1 px-2">2</a>
                <a href="" class="text-decoration-none text-dark py-1 px-2">3</a>
                <a href=""><i class="bi bi-chevron-right mt-1 text-decoration-none text-dark"></i></a>
            </div>
        </div>
    </div>
</div>
<x-footer/>
</x-head>
