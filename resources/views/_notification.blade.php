<div class="notifications">
    <div class="container">
        <p class="text-dark fw-medium">{{ $notification->created_at->diffForHumans() }}</p>
        <div class="noti-disc d-flex justify-content-start align-items-center gap-5 rounded-3 border border-secondary-subtle py-3 px-5">
            <img src="/assets/imgs/Mask group-2.png" class="img-fluid" alt="">
            <p>{{ $notification->message }}</p>
        </div>
    </div>
</div>
