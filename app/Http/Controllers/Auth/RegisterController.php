<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['phone'] = '+' . $data['countryCode'] . $data['phone'];

        unset($data['countryCode']);

        $user = User::create($data);

        if ($user->type === 'company_provider') {
            $user->company()->create([
                'business_name' => $data['business_name'],
                'website' => $data['website'],
            ]);
        }elseif ($user->type === 'individual_provider') {
            $user->individual()->create([
                'business_name' => $data['business_name'],
            ]);
        }

        auth()->login($user);

        return redirect()->route('home');
    }
}
