<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show Profile Page
    public function profile()
    {
        return view('profile.profile');
    }

    // Update Profile
    public function update(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'department' => 'required',
        ]);

        $user = Auth::user();
        $user->name       = $request->name;
        $user->department = $request->department;
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    // Change Password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        // I-check kung tama ang current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password changed successfully!');
    }
}