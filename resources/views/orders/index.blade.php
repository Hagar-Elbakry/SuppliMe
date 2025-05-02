<x-head>
    <link rel="stylesheet" href="/assets/css/myorders.css"/>
    <link rel="stylesheet" href="/assets/css/about.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Orders</h1>
    <x-header href="{{route('orders.index')}}">My Orders</x-header>
</div>
<div class="myorders">
    <div class="container">
        @forelse ($orders as $order)
            @include('_order-details')
        @empty
            <div class="alert alert-success text-center" role="alert" id="empty-cart">
                <h4 class="alert-heading">You haven't made any orders Yet !</h4>
                <p>check it in anthor time.</p>

            </div>
        @endforelse

    </div>
</div>
<x-footer/>
</x-head>
