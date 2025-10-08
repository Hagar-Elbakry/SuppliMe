<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Governorate;
use App\Services\OrderService;
use App\Payments\PaymentFactory;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PaymentReceived;
use App\Http\Requests\StorePaymentRequest;
use Mockery\Expectation;

class PaymentController extends Controller
{
    public function index()
    {
        $governorates = Governorate::all();
        return view('payment.index', compact('governorates'));
    }

    /**
     * @param  Order  $order
     * @return mixed
     */


    public function store(StorePaymentRequest $request,OrderService $orderService)
    {
        $validated = $request->validated();
        $paymentMethod = PaymentFactory::createPayment($validated['payment_method'])->pay();
        $user = Auth::user();
        try{
            $order = $orderService->placeOrder($user) ;
        }catch(\Exception $e){
            return redirect()->route('cart.index')->with('error', 'Failed to place order: ' . $e->getMessage());
        }

        $this->storeAddress($order, $validated);

        $order->update([
            'payment_method' => $paymentMethod,
            'shipping_cost' => Governorate::find($validated['governorate_id'])->shipping_cost
        ]);

        $amount = $order->total_price + ($order->shipping_cost ?? 0);


        request()->user()->notify(new PaymentReceived($amount, $paymentMethod));
        return redirect(route('notifications.show'));
    }

    /**
     * @param  mixed  $order
     * @param  mixed  $validated
     * @return void
     */
    public function storeAddress(mixed $order, mixed $validated): void
    {
        $order->address()->create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'governorate_id' => $validated['governorate_id'],
            'phone' => $validated['phone'],
        ]);
    }
}
