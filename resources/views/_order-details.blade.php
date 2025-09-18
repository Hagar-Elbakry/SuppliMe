<h5 class="my-4">Order Id : {{ $order->id }}</h5>
<div class="order border border-1 rounded-4">
    <div class="order-head border-bottom border-1 rounded-bottom rounded-4">
        <h4 class="p-3">Order Details</h4>
    </div>

    <div class="order-detailes p-3 border-bottom border-1">
        @foreach ($order->orderDetails as $orderDetail)
            <div class="image-detailed d-flex justify-content-start my-3">
                <img src={{ asset('storage/'.$orderDetail->product->image) }} class="img-fluid me-2 border border-1
                     rounded-4" alt="">
                <div class="image-disc">
                    <h5>{{ $orderDetail->product->name }}</h5>
                    <p class="text-black-50">{{ $orderDetail->product->weight }} g | {{ $orderDetail->quantity }}Qty</p>
                </div>
            </div>
        @endforeach

    </div>

    <div class="total px-3 py-2 d-flex justify-content-between align-items-center">
        <p class="mb-0">Sub Total</p>
        <p class="mb-0">${{ $order->total_price }}</p>
    </div>

    <div class="total px-3 py-2 d-flex justify-content-between align-items-center">
        <p class="mb-0">Shipping Cost</p>
        <p class="mb-0">${{$order->shipping_cost}}</p>
    </div>

    <div class="total px-3 py-2 d-flex justify-content-between align-items-center">
        <p class="mb-0">Total</p>
        <p class="mb-0">${{ $order->total_price + $order->shipping_cost}}</p>
    </div>
    <div class="total px-3 py-2 d-flex justify-content-between align-items-center">
        <p class="mb-0">Status</p>
        <p class="mb-0">{{ $order->status }}</p>
    </div>
    <div class="total px-3 py-2 d-flex justify-content-between align-items-center">
        <p class="mb-0">order Date</p>
        <p class="mb-0">{{ $order->created_at }}</p>
    </div>
    <div class="total py-3 d-flex justify-content-center">
        <a href="{{route('orders.show', $order)}}" class="btn btn-warning">Track Your Order</a>
    </div>

</div>
