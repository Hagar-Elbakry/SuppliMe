<div class="col-md-8 col-lg-9">
    <h5 class="my-4">Order({{ $order->id }})</h5>
    <div class="order border border-1 rounded-4">
        <div
            class="order-head border-bottom border-1 rounded-bottom rounded-4"
        >
            <h4 class="p-3">Your Order</h4>
        </div>
        <div class="order-detailes p-3 border-bottom border-1">
            @foreach ($order->orderDetails as $orderDetail)
                <div class="image-detailed d-flex justify-content-start my-3">
                    <img
                        src="{{ asset('storage/'.$orderDetail->product->image) }}"
                        class="img-fluid me-2 border border-1 rounded-4"
                        alt="{{ $orderDetail->product->name }}"
                    />
                    <div class="image-disc">
                        <h5>{{ $orderDetail->product->name }}</h5>
                        <p class="text-black-50">{{ $orderDetail->product->weight }}g | {{ $orderDetail->quantity }}Qty</p>
                    </div>
                </div>
            @endforeach


        </div>
        <div
            class="total p-3 d-flex justify-content-between align-items-center border-bottom border-1"
        >
            <p>Total</p>
            <p>${{ $order->total_price }}</p>
        </div>
        <div
            class="total p-3 d-flex justify-content-between align-items-center"
        >
            <p>Shipping Cost</p>
            <p>${{ $order->shipping_cost }}</p>
        </div>
    </div>
</div>
