<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Order;
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
        $this->paymentService->storePayment($request, $orderService);
        return redirect(route('notifications.show'));
    }

}
