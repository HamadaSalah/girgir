<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        if(auth()->attempt($request->only('email','password'))){
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }
}
