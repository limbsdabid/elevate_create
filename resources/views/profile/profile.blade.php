@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-3">
            <span class="text-2xl">🏢</span>
            <h1 class="text-xl font-bold text-blue-600">GenSpace</h1>
        </div>
        <div class="flex items-center gap-4">
            <a href="/dashboard" class="text-slate-600 hover:text-blue-600 text-sm font-medium transition">
                ← Back to Dashboard
            </a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="bg-slate-100 hover:bg-red-50 hover:text-red-600 text-slate-600 px-4 py-2 rounded-xl text-sm font-medium transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="p-8 max-w-4xl mx-auto">

        {{-- Page Header --}}
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-slate-800">My Profile</h2>
            <p class="text-slate-500 mt-1">Manage your account information</p>
        </div>

        {{-- Success/Error Messages --}}
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                ❌ {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Profile Info Card --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">

                {{-- Avatar --}}
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800 text-lg">{{ Auth::user()->name }}</p>
                        <p class="text-slate-500 text-sm">{{ Auth::user()->email }}</p>
                        <span class="bg-blue-100 text-blue-600 text-xs font-medium px-2 py-1 rounded-full">
                            {{ Auth::user()->department }}
                        </span>
                    </div>
                </div>

                <h3 class="text-lg font-semibold text-slate-800 mb-4">Edit Profile</h3>

                <form method="POST" action="/profile/update" class="space-y-4">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Full Name</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                            class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Department --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Department</label>
                        <select name="department"
                            class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                            <option value="HR" {{ Auth::user()->department == 'HR' ? 'selected' : '' }}>HR</option>
                            <option value="IT" {{ Auth::user()->department == 'IT' ? 'selected' : '' }}>IT</option>
                            <option value="Finance" {{ Auth::user()->department == 'Finance' ? 'selected' : '' }}>Finance</option>
                            <option value="Marketing" {{ Auth::user()->department == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="Operations" {{ Auth::user()->department == 'Operations' ? 'selected' : '' }}>Operations</option>
                        </select>
                        @error('department')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email (read only) --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email Address</label>
                        <input type="email" value="{{ Auth::user()->email }}" disabled
                            class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-400 bg-slate-50 cursor-not-allowed">
                        <p class="text-xs text-slate-400 mt-1">Email cannot be changed</p>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-200 shadow-lg shadow-blue-200">
                        Save Changes
                    </button>
                </form>
            </div>

            {{-- Change Password Card --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                <h3 class="text-lg font-semibold text-slate-800 mb-4">🔑 Change Password</h3>

                <form method="POST" action="/profile/change-password" class="space-y-4">
                    @csrf

                    {{-- Current Password --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Current Password</label>
                        <input type="password" name="current_password"
                            class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                            placeholder="Enter current password">
                        @error('current_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- New Password --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">New Password</label>
                        <input type="password" name="password"
                            class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                            placeholder="Min. 6 characters">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm New Password --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Confirm New Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                            placeholder="Re-enter new password">
                    </div>

                    <button type="submit"
                        class="w-full bg-slate-800 hover:bg-slate-900 text-white font-semibold py-3 rounded-xl transition duration-200">
                        Change Password
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection