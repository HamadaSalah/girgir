<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {

        $guard = $request->type;

        if (auth()->guard($guard)->attempt($request->only('email', 'password') )) {

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

    public function adminLogin()
    {
        return view('auth.admin-login');
    }

    public function adminAuthenticate(Request $request)
    {
        $request->validate([
            'company_id' => 'required|string',
            'manager_id' => 'required|string',
            'password' => 'required|string',
        ]);


        $manager = Manager::where('company_id', $request->company_id)
                          ->where('manager_id', $request->manager_id)
                          ->first();

        if ($manager && Auth::guard('manager')->attempt($request->only('company_id', 'manager_id', 'password'))) {
            return redirect()->route('employee-panel.home');
        }

        return back()->withErrors([
            'password' => 'Invalid company ID, manager ID, or password.',
        ])->withInput();
    }
}
