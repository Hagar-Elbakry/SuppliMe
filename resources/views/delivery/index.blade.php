<x-head>
    <link rel="stylesheet" href="{{asset('assets/css/treack-order.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}"/>
    <x-nav/>
    <div class="main-title text-center pt-5">
        <h1>Track Your Order</h1>
        <x-header href="{{route('delivery.index')}}">Delivery</x-header>
    </div>
    <div class="track">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-9">
                    <div class="track-body d-flex flex-column gap-4 p-4 bg-white border border-1 rounded-5 shadow-sm">
                        <p class="text-muted mb-4 fs-5">
                            To track your order, please enter your Order ID in the box below and press the “Track Order”
                            button. This was given to you on your receipt and in the confirmation email you should have
                            received.
                        </p>
                        <form action="{{ route('delivery.store') }}" method="post" class="w-100">
                            @csrf
                            <div class="order-id d-flex flex-column mb-4">
                                <label for="order-id" class="fw-medium fs-4 mb-2">Order ID*</label>
                                <input
                                    type="text"
                                    name="order_id"
                                    id="order-id"
                                    class="form-control w-100 p-3 rounded-3 border border-1 shadow-sm"
                                    placeholder="Enter Your Order ID"
                                    required
                                >
                                @error('order_id')
                                <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success rounded-pill px-4 py-2 w-100 w-md-auto">
                                <i class="bi bi-search me-2"></i> Track Your Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer/>
</x-head>
