<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Order;
use App\Notifications\PaymentReceived;
use App\Services\OrderService;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    public $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $governorates = $this->paymentService->getAllGovernorates();
        return view('payment.index', compact('governorates'));
    }

    /**
     * @param  Order  $order
     * @return mixed
     */


    public function store(StorePaymentRequest $request, OrderService $orderService)
    {
        list($order, $paymentMethod) = $this->paymentService->storePayment($request, $orderService);
        $amount = $order->total_price + ($order->shipping_cost ?? 0);


        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
        return redirect(route('notifications.show'));
    }

}
