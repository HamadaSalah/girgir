<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('provider-panel.profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors('error', 'Current password is incorrect');
        }

        $user->update([
            'password' => $request->new_password,
        ]);

        auth()->logout();

        return redirect()->route('users.login');
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();
        $profilePicturePath = $request->file('profile_picture')->store('uploads/profile_pictures', 'public');

        $file = $user->files()->first();

        if ($file) {
            $file->update([
                'path' => $profilePicturePath,
            ]);
        } else {
            $user->files()->create([
                'name' => $user->name,
                'path' => $profilePicturePath,
            ]);
        }

        return redirect()->route('provider-panel.home');
    }
}
