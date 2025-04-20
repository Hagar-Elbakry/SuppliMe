<x-head>
    <link rel="stylesheet" href="/assets/css/myorders.css"/>
    <link rel="stylesheet" href="/assets/css/about.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Orders</h1>
    <x-header href="/orders">My Ordres</x-header>
</div>
<div class="myorders">
    <div class="container">
        <!-- order -->
{{--start loop--}}
        @include('_order-details')
{{--end loop--}}
    </div>
</div>
<x-footer/>
</x-head>
