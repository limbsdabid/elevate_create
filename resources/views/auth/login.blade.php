@extends('layouts.app')

@section('content')
<div class="min-h-screen flex">

    {{-- Left Side Panel --}}
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-blue-600 to-blue-800 text-white flex-col justify-center items-center p-12">
        <div class="text-center">
            <div class="text-6xl mb-6">🏢</div>
            <h1 class="text-4xl font-bold mb-4">GenSpace</h1>
            <p class="text-blue-200 text-lg">Meeting Room Reservation System</p>
            <div class="mt-12 space-y-4">
                <div class="flex items-center gap-3 text-blue-100">
                    <span class="text-2xl">📅</span>
                    <span>Easy room booking</span>
                </div>
                <div class="flex items-center gap-3 text-blue-100">
                    <span class="text-2xl">👥</span>
                    <span>Team collaboration</span>
                </div>
                <div class="flex items-center gap-3 text-blue-100">
                    <span class="text-2xl">⚡</span>
                    <span>Real-time availability</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Side Form --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md">

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-slate-800">Welcome back!</h2>
                <p class="text-slate-500 mt-2">Sign in to your account to continue</p>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                    ❌ {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="/login" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                        placeholder="you@company.com">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                    <input type="password" name="password"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                        placeholder="Enter your password">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-200 shadow-lg shadow-blue-200">
                    Sign In →
                </button>
            </form>

            <p class="text-center text-slate-500 mt-6">
                Don't have an account?
                <a href="/register" class="text-blue-600 font-medium hover:underline">Register here</a>
            </p>

        </div>
    </div>

</div>
@endsection