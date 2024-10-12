<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

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
