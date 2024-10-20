<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update_picture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_file = auth()->user()->files()->first();

        if($user_file)
        {
            $user_file->delete();
        }

        $file = $request->file('profile_picture')->store('uploads/profile_pictures', 'public');

        auth()->user()->files()->create([
            'name' => auth()->user()->name . ' Profile Picture',
            'path' => $file,
        ]);

        return back()->with('success', 'Profile picture updated successfully');
    }

    public function update_info(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|regex:/^\+?[0-9\s\-()]{7,15}$/|unique:users,phone,' . auth()->id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update($request->only('first_name', 'last_name', 'phone', 'email'));

        return back()->with('success', 'Profile updated successfully');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if(!\Hash::check($request->current_password, auth()->user()->password))
        {
            return back()->with('error', 'Current password is incorrect');
        }

        auth()->user()->update([
            'password' => \Hash::make($request->password),
        ]);

        auth()->logout();

        return redirect()->route('users.login');
    }
}
