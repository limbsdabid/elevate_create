@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">

        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">
            🏢 GenSpace Register
        </h2>

        <form method="POST" action="/register">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter your full name">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter your email">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Department --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Department</label>
                <select name="department"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
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
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Min. 6 characters">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Re-enter your password">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Register
            </button>
        </form>

        <p class="text-center text-gray-500 mt-4">
            Mayroon nang account?
            <a href="/login" class="text-blue-600 hover:underline">Login here</a>
        </p>

    </div>
</div>
@endsection