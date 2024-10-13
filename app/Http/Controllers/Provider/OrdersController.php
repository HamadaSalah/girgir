<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders;
        return view('provider-panel.orders.index', compact('orders'));
    }

    public function show($order)
    {
        return view('provider.orders.show');
    }

    public function update($order)
    {
        return redirect()->route('provider.orders.index');
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
