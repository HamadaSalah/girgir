<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Jobs\OrderResponseJob;
use App\Jobs\OrderUpdateJob;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders;
        return view('provider-panel.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('viewforProvider', $order);

        $order->load('items', 'user');

        return view('provider-panel.orders.show', compact('order'));
    }

    public function response(Order $order, Request $request)
    {
        $request->validate([
            'response' => 'required|string|in:cancelled,approved'
        ]);

        if ($order->status != 'received') {
            abort(403, 'Order is already responded');
        }

        $order->update([
            'status' => $request->response
        ]);

        OrderResponseJob::dispatch($order);


        return redirect()->route('provider-panel.home');
    }
    public function update(Order $order)
    {
        OrderUpdateJob::dispatch($order);
        return redirect()->route('provider-panel.home');
    }


    public function assign($order)
    {
        return view('provider.orders.assign');
    }

    public function assignEmployee($order)
    {
        return redirect()->route('provider.orders.index');
    }
}
