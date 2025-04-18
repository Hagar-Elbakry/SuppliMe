<x-head>
    <link rel="stylesheet" href="/assets/css/about.css" />
    <link rel="stylesheet" href="/assets/css/notifications.css">
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Notifications</h1>
    <x-header href="/notifications">Notifications</x-header>
</div>
{{--start loop--}}
    @include('_notification')
{{--end loop--}}
<x-footer/>
</x-head>
