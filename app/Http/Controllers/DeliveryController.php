<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackOrderRequest;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('delivery.index');
    }

    public function store(TrackOrderRequest $request)
    {
        $request->validated();
        return redirect()->route('orders.show', $request->order_id);
    }
}
