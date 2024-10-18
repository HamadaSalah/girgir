<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Rate::where('order_id', auth()->user()->orders->pluck('id'))
            ->with('order', 'user')
            ->paginate(10);

        return view('provider-panel.reviews', compact('reviews'));
    }
}
