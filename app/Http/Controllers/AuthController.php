<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Register Page
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle Register
    public function register(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:users',
            'department' => 'required',
            'password'   => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'department' => $request->department,
            'password'   => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registered! Please login.');
    }

    // Show Login Page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember'); // ← i-add ito

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}