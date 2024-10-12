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
        $guard = $request->type;

        if (auth()->guard($guard)->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            if ($guard === 'user') {
                return redirect()->route('home');
            } elseif ($guard === 'provider') {
                return redirect()->route('provider-panel.home');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
