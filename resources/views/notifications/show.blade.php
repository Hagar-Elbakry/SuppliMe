<x-head>
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/notifications.css">
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Notifications</h1>
    <x-header href="{{route('notifications.show')}}">Notifications</x-header>
</div>

        @forelse ($notifications as $notification)
            @include('_notification')
        @empty
            <div class="alert alert-success text-center" role="alert" id="empty-cart">
                <h4 class="alert-heading">No Notifications Sent To You Yet !</h4>
                <p>check it in anthor time.</p>

            </div>
        @endforelse


<x-footer/>
</x-head>
