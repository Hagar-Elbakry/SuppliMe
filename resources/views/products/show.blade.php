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
    <div class="container mt-5 d-flex justify-content-center">
        <div class="product-card row d-flex gap-4">
            <div
                class="col-md-5 product-image p-2 border border-1 rounded-5 text-center"
            >
                <img src="/assets/imgs/image 11.png" alt="Laundry Detergent" />
            </div>
            <div class="col-md-6">
                <p class="text-success fw-medium fs-4 mb-0">Laundry Supplies</p>
                <h3>Laundry Detergent</h3>
                <div class="rating my-3 d-flex gap-1">
                    <div class="stars" id="rating1">
                        <i class="bi bi-star" data-rating="1" style="color: gold;"></i>
                        <i class="bi bi-star" data-rating="2" style="color: gold;"></i>
                        <i class="bi bi-star" data-rating="3" style="color: gold;"></i>
                        <i class="bi bi-star" data-rating="4" style="color: gold;"></i>
                        <i class="bi bi-star" data-rating="5" style="color: gold;"></i>
                    </div>
                    <span class="text-muted"> 5.0 (200 Reviews)</span>
                </div>
                <div class="mb-2">
                    <p class="fw-medium fs-5">
                        $75.00 <del class="text-black-50 ms-2">$100.00</del>
                    </p>
                </div>
                <p class="text-muted">
                    Lorem Ipsum has been the industry's standard dummy ever since the
                    1500s.
                </p>
                <div class="weight">
                    <h5>Weight</h5>
                    <div class="weight-info d-flex justify-content-start align-items-center gap-3 mb-2">
                       500g
                    </div>
                </div>
                <div class="d-flex gap-2 border-bottom border-2 pb-2">

                    <div class="add align-items-center d-flex text-nowrap">
                        <a
                            href=""
                            class="btn add text-light text-decoration-none rounded-pill px-3 py-1"
                        >Add To Cart</a
                        >
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
{{--start loop--}}
{{--@include('_product-cart')--}}
{{--end loop--}}
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
</x-head>
