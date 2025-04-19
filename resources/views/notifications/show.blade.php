<x-head>
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/notifications.css">
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Notifications</h1>
    <x-header href="/notifications">Notifications</x-header>
</div>
    @if ($notifications->isEmpty())
    <!-- Empty Cart State (hidden by default, show when cart is empty) -->
    <div class="alert alert-success text-center" role="alert" id="empty-cart">
        <h4 class="alert-heading">No Notifications Sent To You Yet !</h4>
        <p>check it in anthor time.</p>
        
    </div>
    @else
        @foreach ($notifications as $notification)
            @include('_notification')
        @endforeach
    @endif

<x-footer/>
</x-head>
