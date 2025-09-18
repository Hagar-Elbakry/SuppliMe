<x-head>
    <link rel="stylesheet" href="/assets/css/treack-order.css" />
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/myorders.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Order Status</h1>
    <x-header href="{{route('orders.show', $order)}}">Order Status</x-header>
</div>
<div class="status">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-9">
                <div class="status-body">
                    <div class="status-title">
                        <h5>Order Status</h5>
                        <p>Order Id : #{{ $order->id }}</p>
                    </div>
                    <div
                        class="tracking-container d-flex flex-column align-items-stretch py-2 px-5 border border-1 rounded-5"
                    >
                        <div class="d-flex justify-content-between pt-3">
                            <x-order-status>Order Placed</x-order-status>
                            <x-order-status>Accepted</x-order-status>
                            <x-order-status>In Progress</x-order-status>
                            <x-order-status>On the Way</x-order-status>
                            <x-order-status>Delivered</x-order-status>

                        </div>
                        <div class="order-tracker mt-5 text-center">
                            <div
                                class="d-flex justify-content-center align-items-center gap-2 mb-4"
                                id="tracker"
                            >
                                <x-circle/>
                                <x-line/>
                                <x-circle/>
                                <x-line/>
                                <x-circle/>
                                <x-line/>
                                <x-circle/>
                                <x-line/>
                                <x-circle/>
                            </div>
                        </div>
                        <div class="expected-date d-flex justify-content-end">
                            <p class="text-black-50">Expected :</p>
                            @php
                                $estimated_delivery = Carbon\Carbon::parse($order->shipping->estimated_delivery) ;
                            @endphp
                            <p class="text-black-50">{{ $estimated_delivery->toDayDateTimeString() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @include('_order')
        </div>
    </div>
</div>
<x-footer/>

@php
    $status = [
        'unassigned'=>'In Progress',
        'assigned'=>'On the Way',
        'delivered'=>'Delivered'
    ];
@endphp
<script>

    const currentStatus = "{{ $status[$order->shipping->status->value] ?? 'Order Placed' }}";

    const statusMap = {
        "Order Placed": 1,
        "Accepted": 2,
        "In Progress": 3,
        "On the Way": 4,
        "Delivered": 5
    };

    const currentStep = statusMap[currentStatus] || 1;

    const circles = document.querySelectorAll('#tracker .badge.rounded-pill');
    const lines = document.querySelectorAll('#tracker .flex-fill');

    circles.forEach((circle, index) => {
        if (index < currentStep) {
            circle.classList.remove('bg-secondary');
            circle.classList.add('bg-success');
        } else {
            circle.classList.remove('bg-success');
            circle.classList.add('bg-secondary');
        }
    });

    lines.forEach((line, index) => {
        if (index < currentStep - 1) {
            line.classList.remove('bg-secondary');
            line.classList.add('bg-success');
        } else {
            line.classList.remove('bg-success');
            line.classList.add('bg-secondary');
        }
    });
</script>
</x-head>
