<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(){
        return view('delivery.index');
    }
    public function store(Request $request){
        $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
        ]);
        return redirect()->route('orders.show', $request->order_id);
    }
}
