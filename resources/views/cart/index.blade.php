<x-head>
    <link rel="stylesheet" href="/assets/css/about.css"/>
    <link rel="stylesheet" href="/assets/css/shoppingcart.css"/>
    <x-nav/>

    <div class="main-title text-center pt-5">
        <h1>shopping Cart</h1>
        <x-header href="/cart">Shopping Cart</x-header>
    </div>
    @if ($products->isEmpty())
        <!-- Empty Cart State (hidden by default, show when cart is empty) -->
        <div class="alert alert-success text-center" role="alert" id="empty-cart">
            <h4 class="alert-heading">Your Cart is Empty!</h4>
            <p>Looks like you haven't added any items to your cart yet.</p>
            <a href="{{ route('home') }}" class="btn mt-2"
                style="background-color: #ffc107; color: #000; border: 1px solid #ffc107;">
                Start Shopping
            </a>
        </div>
    @else
        @if(session('error'))
            <div class="d-flex justify-content-center align-items-center mt-5">
                <div class="alert alert-danger text-center px-4 py-2 w-50 shadow-sm">{{ session('error') }}</div>
            </div>
        @endif
        <div class="shopcart">
            <div
                class="container"
            >
                <div class="row align-items-start">
                    <div class=" d-none d-md-block products col-12 col-md-12 col-lg-8">
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
                        {{-- intialize the variables --}}
                        @php
                            $totalItems = 0;
                            $subTotal = 0;
                        @endphp
                        {{-- loop through the products --}}
                        @foreach($products as $product)
                            @php
                                $totalItems += $product->pivot->quantity;
                                if($product->activeDiscount()){
                                    $product->price = $product->getDiscountedPrice();
                                }
                                $subTotal += $product->pivot->quantity * $product->price;
                            @endphp
                            @include('_cart-product')
                        @endforeach
                        <div class="clear d-flex justify-content-end align-items-center py-4">
                            <form action="{{ route('cart.destroyAll') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="fw-medium text-decoration-none rounded-3 border border-secondary-subtle px-4 py-2">
                                    Clear Shopping Cart
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="d-block d-md-none">

                        @include('_cart-product-mobile')
                        
                    </div>
                    <div class="summary col-12 col-md-12 col-lg-4 rounded-4 border border-black px-0">
                        <p class="fw-medium  border-bottom border-black py-3 px-3">Order Summary</p>

                        <div class="checkout">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center gap-3 px-3">
                                    <p class="text-black-50">Items</p>
                                    <p>{{ $totalItems }}</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-center gap-3 px-3 ">
                                    <p class="text-black-50">Sub Total</p>
                                    <p>${{ $subTotal }}</p>
                                </li>
                                <li class="d-flex justify-content-between align-items-center gap-3 px-3">
                                    <p class="text-black-50">Shipping</p>
                                    <p>$20.00</p>
                                </li>

                                <li class="mt-5 d-flex justify-content-between align-items-center gap-3 px-3">
                                    <p class="text-black-50">Total</p>
                                    <p>${{ $subTotal+=20 }}</p>
                                </li>
                            </ul>
                    <div class="check text-center rounded-pill p-3">
                        <form action="/checkout" method="post">
                            @csrf
                            <button type="submit" class=" text-dark text-decoration-none px-5 py-2 rounded-pill">
                                Checkout
                            </button>
                        </form>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <x-footer/>
</x-head>
