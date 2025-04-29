<x-head>
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/shop.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Fruits</h1>
    <p>
        <a href="/" class="text-decoration-none text-dark"
        >Home /
        </a>
        <a href="/shop" class="text-decoration-none text-dark">Shop /</a>
        <a href="" class="text-decoration-none text-dark">Fruits</a>

    </p>
</div>
<div class="shop">
    <div
        class="container d-flex justify-content-between align-items-start gap-5"
    >
        @include('_category-options')
        <div class="food d-flex flex-column">
            <div
                class="row d-flex justify-content-center align-items-center gap-4"
            >

              @include('_category-product')
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
