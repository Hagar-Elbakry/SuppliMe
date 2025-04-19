<x-head>
    <link rel="stylesheet" href="/assets/css/about.css"/>
    <link rel="stylesheet" href="/assets/css/shoppingcart.css"/>
    <link rel="stylesheet" href="/assets/css/checkout.css"/>
    <x-nav/>
    <div class="main-title text-center pt-5">
        <h1>Payment</h1>
        <p>
            <a href="/" class="text-decoration-none text-dark"
            >Home /
            </a>
            <a href="/cart" class="text-decoration-none text-dark"
            >Shoppingcart /</a
            >

            <a href="/payment" class="text-decoration-none text-dark"
            >Payment</a
            >
        </p>
    </div>

    <div class="main-checkout">
        <div class="container">
            <div class="row p-1 mt-5">
                <div class="deatails col-12 col-md-auto col-lg-12">
                    <h4 class="mb-4">Select Payment Method</h4>

                    <form action="/payment/create" method="post">
                        @csrf
                        <x-payment-field>
                            <x-payment-input type="radio" name="payment_method" value="visa" id="visa"/>
                            <x-payment-label for="visa">
                                <img
                                    src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg"
                                    alt="Visa"
                                    height="20"
                                />
                            </x-payment-label>
                        </x-payment-field>

                        <x-payment-field>
                            <x-payment-input type="radio" name="payment_method" value="cash" id="cash"/>
                            <i class="fa-solid fa-credit-card fs-5 credit me-1"></i>
                            <x-payment-label for="cash">
                                Cash on Delivery
                            </x-payment-label>
                        </x-payment-field>

                        <div class="check text-center rounded-pill p-3">

                            <button
                                type="submit"
                                class="text-dark text-decoration-none px-5 py-2 rounded-pill"
                            >Payment
                            </button
                            >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-footer/>
</x-head>
