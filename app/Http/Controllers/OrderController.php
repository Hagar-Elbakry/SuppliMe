<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;

class OrderController extends Controller
{
    public $orderService;
    protected $status = [
        'unassigned' => 'In Progress',
        'assigned' => 'On the Way',
        'delivered' => 'Delivered'
    ];

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        list($order, $estimated_delivery) = $this->orderService->getOrder($order);
        return view('orders.show', [
            'order' => $order,
            'status' => $this->status,
            'estimated_delivery' => $estimated_delivery
        ]);
    }
}
