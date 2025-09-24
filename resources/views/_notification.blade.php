<div class="notifications">
    <div class="container">
        <p class="text-dark fw-medium">{{ $notification->created_at->diffForHumans() }}</p>
        <div
            class="noti-disc d-flex justify-content-start align-items-center gap-5 rounded-3 border border-secondary-subtle py-3 px-5">
            <img src="{{asset('assets/imgs/Mask group-2.png')}}" class="img-fluid" alt="">
            <p>
                @if($notification->type == 'App\Notifications\PaymentReceived')
                    @if($notification->data['paymentMethod'] == 'visa')
                        The amount is: (including shipping cost) {{$notification->data['amount']}}$ has been paid with
                        visa successfully.
                    @else
                        The total amount is: (including shipping cost)  {{$notification->data['amount']}}$ and will be
                        paid cash on delivery.
                    @endif
                @endif
            </p>
        </div>
    </div>
</div>
