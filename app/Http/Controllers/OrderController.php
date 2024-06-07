<?php

namespace App\Http\Controllers;

use App\Jobs\OrderCreated;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'product_id' => $request->product_id,
            'count' => $request->count
        ]);

        OrderCreated::dispatch($order->toArray());

        return response()->json([
            'order' => $order
        ]);
    }
}
