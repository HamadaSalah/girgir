<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Jobs\CreateWithdrawalJob;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function create()
    {
        return view('provider-panel.withdrawal.create');
    }

    public function store(Request $request)
    {
        $balance = auth('provider')->user()->balance;

        $request->validate([
            'name' => 'required|string|max:255',
            'IBAN' => 'required|string|max:34',
            'bank_name' => 'required|string|max:255',
            'swift_code' => 'required|string|max:11',
            'address' => 'required|string|max:255',
            'currency' => 'required|string|max:3',
            'amount' => [
            'required',
            'numeric',
            'min:1',
            function ($attribute, $value, $fail) use ($balance) {
                if ($value > $balance) {
                    $fail('The amount must be less than or equal to your available balance of ' . $balance . '.');
                }
            },
        ],
            'user_note' => 'nullable|string|max:500',
        ]);

        $request['user_id'] = auth()->id();

        CreateWithdrawalJob::dispatch($request->all());

        return redirect()->route('provider-panel.home');
    }
}
