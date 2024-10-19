<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        $orderIds = auth()->user()->orders->pluck('id');
        $reviews = Rate::whereIn('order_id', $orderIds)
            ->with('order', 'user')
            ->paginate(10);

        return view('provider-panel.reviews', compact('reviews'));
    }

}
