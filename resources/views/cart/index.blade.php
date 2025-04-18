<x-head>
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/shoppingcart.css" />
<x-nav/>

<div class="main-title text-center pt-5">
    <h1>shopping Cart</h1>
    <x-header href="/cart">Shopping Cart</x-header>
</div>
<div class="shopcart">
    <div
        class="container"
    >
        <div class="row align-items-start">
            <div class="products col-12 col-md-12 col-lg-8">
                <div
                    class="product-head px-5 pt-3 mb-3 d-flex justify-content-between align-items-center gap-5 rounded-3"
                >
                    <p>Products</p>
                    <div
                        class="infos d-flex justify-content-between align-items-center"
                    >
                        <p>Price</p>
                        <p>Quantity</p>
                        <p>Subtotal</p>
                    </div>
                </div>
{{--start loop--}}
               @include('_cart-product')
{{--end loop--}}
                <div class="clear d-flex justify-content-end align-items-center py-4">
                    <a href="" class="text-decoration-none fw-medium pb-2"
                    >Clear Shopping Cart</a
                    >
                </div>
            </div>
            <div class="summary col-12 col-md-12 col-lg-4 rounded-4 border border-black px-0">
                <p class="fw-medium  border-bottom border-black py-3 px-3">Order Summary</p>

                <div class="checkout">
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between align-items-center gap-3 px-3">
                            <p class="text-black-50">Items</p>
                            <p>5</p>
                        </li>
                        <li class="d-flex justify-content-between align-items-center gap-3 px-3 ">
                            <p class="text-black-50">Sub Total</p>
                            <p>$85.40</p>
                        </li>
                        <li class="d-flex justify-content-between align-items-center gap-3 px-3">
                            <p class="text-black-50">Shipping</p>
                            <p>$00.00</p>
                        </li>

                        <li class="mt-5 d-flex justify-content-between align-items-center gap-3 px-3">
                            <p class="text-black-50">Total</p>
                            <p>$85.40</p>
                        </li>
                    </ul>
                    <div class="check text-center rounded-pill p-3">
                        <a href="" class=" text-light text-decoration-none px-5 py-2 rounded-pill">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
</x-head>
