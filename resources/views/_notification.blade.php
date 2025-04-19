<div class="notifications">
    <div class="container">
        <p class="text-dark fw-medium">{{ $notification->created_at->diffForHumans() }}</p>
        <div class="noti-disc d-flex justify-content-start align-items-center gap-5 rounded-3 border border-secondary-subtle py-3 px-5">
            <img src="/assets/imgs/Mask group-2.png" class="img-fluid" alt="">
            <p>
                @if($notification->type == 'App\Notifications\PaymentReceived')
                    The amount is: {{$notification->data['amount']}}$ has been paid with {{$notification->data['paymentMethod']}} successfully.
                @endif
            </p>
        </div>
    </div>
</div>
