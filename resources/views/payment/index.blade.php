    <x-head>
        <link rel="stylesheet" href="{{asset('assets/css/about.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/shoppingcart.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/checkout.css')}}"/>
        <x-nav/>

        <div class="main-title text-center pt-5">
            <h1>Shipping Details</h1>
            <p>
                <a href="{{route('home')}}" class="text-decoration-none text-dark">Home /</a>
                <a href="{{route('cart.index')}}" class="text-decoration-none text-dark">Shoppingcart /</a>
                <a href="{{route('payment.index')}}" class="text-decoration-none text-dark">Shipping Details</a>
            </p>
        </div>

        <div class="main-checkout">
            <div class="container">
                <div class="row p-1 mt-5">
                    <div class="details col-12 col-md-auto col-lg-12">
                        <h4 class="mb-4">Shipping Address</h4>

                        <form action="{{route('payment.store')}}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" id="first_name" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" id="last_name" name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" name="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{ old('address')}}" required>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" id="city" name="city"
                                        class="form-control @error('city') is-invalid @enderror"
                                        value="{{ old('city') }}" required>
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="governorate_id" class="form-label">Governorate</label>
                                    <select id="governorate_id" name="governorate_id"
                                            class="form-control @error('governorate_id') is-invalid @enderror" required>
                                        <option value="">Select Governorate</option>
                                        @foreach($governorates as $gov)
                                            <option
                                                value="{{ $gov->id }}" {{ old('governorate_id') == $gov->id ? 'selected' : '' }}>
                                                {{ $gov->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('governorate_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                    required>
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <h4 class="mb-4">Select Payment Method</h4>

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

                            @error('payment_method')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="check text-center rounded-pill p-3 mt-4">
                                <button
                                    type="submit"
                                    class="text-dark text-decoration-none px-5 py-2 rounded-pill"
                                >
                                    Confirm & Pay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <x-footer/>
    </x-head>
