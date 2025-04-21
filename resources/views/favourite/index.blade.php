<x-head>
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/shoppingcart.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Wishlist</h1>
    <x-header href="/wishlist">Wishlist</x-header>
</div>
<div class="shopcart">
    <div class="container">
        <div class=" row align-items-start">
            <div class=" d-none d-md-block products ">
                <div
                    class="product-head px-5 pt-3 mb-3 d-flex justify-content-between align-items-center gap-5 rounded-3"
                >
                    <p>Products</p>
                    <div
                        class="infos d-flex justify-content-between align-items-center"
                    >
                        <p>Price</p>
                        <p>Date address</p>
                        <p>add</p>
                    </div>
                </div>
{{--start loop--}}
                @include('_wishlist-product')
{{--end loop--}}
                <div
                    class="clear d-flex justify-content-end align-items-center py-4 gap-5"
                >
                    <a href="" class="text-decoration-none fw-medium pb-2 mt-2"
                    >Clear All Wishlist</a
                    >
                    <a href="./complete.html" class="btn btn-success p-x2 py-1 text-light text-decoration-none mt-2 rounded-3 me-3">Add All To Cart</a>

                </div>
            </div>
            <div class="d-block d-md-none">

                {{--start loop--}}
               @include('_wishlist-product-mobile')
                {{--end loop--}}

                <a href="./product-deatails.html" class=" text-success border-bottom border-1 p-x2 py-1 text-decoration-none mt-4 me-2 fw-medium">Clear All Wishlist</a>
                <a href="./product-deatails.html" class="btn btn-success p-x2 py-1 text-light text-decoration-none mt-2">Add all to cart</a>

            </div>

        </div>
    </div>
</div>
<x-footer/>
</x-head>
