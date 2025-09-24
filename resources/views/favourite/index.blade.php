<x-head>
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/shoppingcart.css')}}"/>
    <x-nav/>
    <div class="main-title text-center pt-5">
        <h1>Wishlist</h1>
        <x-header href="{{route('favourite.index')}}">Wishlist</x-header>
    </div>
    @if ($favouriteProducts->isEmpty())
        <div class="alert alert-success text-center" role="alert" id="empty-cart">
            <h4 class="alert-heading">Your Wishlist is Empty!</h4>
            <p>Looks like you haven't added any items to your wishlist yet.</p>
            <a href="{{ route('home') }}" class="btn mt-2"
               style="background-color: #ffc107; color: #000; border: 1px solid #ffc107;">
                Start Shopping
            </a>
        </div>
    @else
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
                                <p>add</p>
                            </div>
                        </div>
                        @foreach ($favouriteProducts as $product)
                            @include('_wishlist-product')
                        @endforeach
                        <div
                            class="clear d-flex justify-content-end align-items-center py-4 gap-5"
                        >

                            <div class="clear d-flex justify-content-end align-items-center py-4">
                                <form action="{{ route('favourite.destroyAll') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="fw-medium text-decoration-none rounded-3 border border-secondary-subtle px-4 py-2">
                                        Clear All Wishlist
                                    </button>
                                </form>
                            </div>

                            <form action="{{ route('favourite.addAllToCart') }}" method="post">
                                @csrf
                                <button type="submit"
                                        class="btn btn-success p-x2 py-1 text-light text-decoration-none mt-2 rounded-3 me-3">
                                    Add All To Cart
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="d-block d-md-none">

                        @foreach ($favouriteProducts as $product)
                            @include('_wishlist-product-mobile')
                        @endforeach

                        <div
                            class="clear d-flex justify-content-end align-items-center py-4 gap-5"
                        >

                            <div class="clear d-flex justify-content-end align-items-center py-4">
                                <form action="{{ route('favourite.destroyAll') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="fw-medium text-decoration-none rounded-3 border border-secondary-subtle px-4 py-2">
                                        Clear All Wishlist
                                    </button>
                                </form>
                            </div>

                            <form action="{{ route('favourite.addAllToCart') }}" method="post">
                                @csrf
                                <button type="submit"
                                        class="btn btn-success p-x2 py-1 text-light text-decoration-none mt-2 rounded-3 me-3">
                                    Add All To Cart
                                </button>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif
    <x-footer/>
</x-head>
