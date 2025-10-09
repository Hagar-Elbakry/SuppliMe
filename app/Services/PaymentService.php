<?php

namespace App\Services;

use App\Repositories\PaymentRepository;
use Exception;
use Illuminate\Support\Facades\Auth;


class PaymentService
{
    public $paymentRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function getAllGovernorates()
    {
        return $this->paymentRepository->getAllGovernorates();
    }

    public function storePayment($request, $orderService)
    {
        $validated = $request->validated();

        $paymentMethod = $this->paymentRepository->storePayment($validated);

        $user = Auth::user();
        try {
            $order = $orderService->placeOrder($user);
        } catch (Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Failed to place order: '.$e->getMessage());
        }

        $this->paymentRepository->storeAddress($order, $validated);

        $this->paymentRepository->updateOrder($order, $validated, $paymentMethod);

        return array($order, $paymentMethod);
    }
}
