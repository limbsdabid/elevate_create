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
                <h2 class="text-3xl font-bold text-slate-800">Create account</h2>
                <p class="text-slate-500 mt-2">Register to start booking meeting rooms</p>
            </div>

            <form method="POST" action="/register" class="space-y-5">
                @csrf

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                        placeholder="Juan Dela Cruz">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

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

                {{-- Department --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Department</label>
                    <select name="department"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                        <option value="">-- Select Department --</option>
                        <option value="HR">HR</option>
                        <option value="IT">IT</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Operations">Operations</option>
                    </select>
                    @error('department')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                    <input type="password" name="password"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                        placeholder="Min. 6 characters">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                        placeholder="Re-enter your password">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-200 shadow-lg shadow-blue-200">
                    Create Account →
                </button>
            </form>

            <p class="text-center text-slate-500 mt-6">
                Already have an account?
                <a href="/login" class="text-blue-600 font-medium hover:underline">Sign in here</a>
            </p>

        </div>
    </div>

</div>
@endsection