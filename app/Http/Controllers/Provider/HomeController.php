<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth('provider')->user();

        $selectedMonth = $request->input('month');

        $orders = $selectedMonth
            ? $user->orders()->whereMonth('created_at', $selectedMonth)->get()
            : $user->orders()->get();

        $ordersThisMonth = $orders->count();
        $profitThisMonth = $orders->sum('total');
        $inProgressOrders = $orders->where('status', 'in_progress')->count();

        $overall_orders = $user->orders()->count();

        return view('provider-panel.home', compact(
            'orders',
            'ordersThisMonth',
            'profitThisMonth',
            'inProgressOrders',
            'overall_orders',
            'selectedMonth'
        ));
    }


}
