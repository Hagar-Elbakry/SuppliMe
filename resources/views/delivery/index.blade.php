<x-head>
    <link rel="stylesheet" href="/assets/css/treack-order.css" />
    <link rel="stylesheet" href="/assets/css/about.css" />
<x-nav/>
    <div class="main-title text-center pt-5">
        <h1>Track Your Order</h1>
        <x-header href="/delivery">Delivery</x-header>
    </div>
<div class="track">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-9">
                <div class="track-body d-flex justify-content-between align-items-start gap-4 flex-column">
                    <p>"To track your order please enter your Order ID in the box below and press the “Track Order” button. This was given to you on your receipt and in the confirmation email you should have received"</p>
                    <div class="order-id d-flex justify-content-between align-items-start flex-column">
                        <label for="order-id" class="fw-medium fs-3">Order Id*</label>
                        <input type="text" class="mt-2 p-2 rounded-2 border border-1" placeholder="Enter Your Order Id">
                    </div>
                    <a href="./order-status.html"><button type="submit" class="btn btn-success rounded-pill">Track Your Order</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
</x-head>
