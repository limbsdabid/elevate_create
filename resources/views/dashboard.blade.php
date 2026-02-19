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
            <div class="text-right">
                <p class="text-sm font-semibold text-slate-800">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-500">{{ Auth::user()->department }}</p>
            </div>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="bg-slate-100 hover:bg-red-50 hover:text-red-600 text-slate-600 px-4 py-2 rounded-xl text-sm font-medium transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="p-8 max-w-7xl mx-auto">

        {{-- Welcome Banner --}}
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white mb-8">
            <h2 class="text-2xl font-bold mb-1">Good day, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-blue-200">Welcome to GenSpace Meeting Room Reservation System</p>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 text-sm font-medium">My Reservations</span>
                    <span class="text-2xl">📅</span>
                </div>
                <p class="text-3xl font-bold text-slate-800">0</p>
                <p class="text-sm text-slate-400 mt-1">Total bookings</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 text-sm font-medium">Available Rooms</span>
                    <span class="text-2xl">🚪</span>
                </div>
                <p class="text-3xl font-bold text-slate-800">0</p>
                <p class="text-sm text-slate-400 mt-1">Rooms available today</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-slate-500 text-sm font-medium">Upcoming Meetings</span>
                    <span class="text-2xl">⏰</span>
                </div>
                <p class="text-3xl font-bold text-slate-800">0</p>
                <p class="text-sm text-slate-400 mt-1">Scheduled this week</p>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <button class="flex items-center gap-4 p-4 border border-slate-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition">
                    <span class="text-3xl">➕</span>
                    <div class="text-left">
                        <p class="font-medium text-slate-800">Book a Room</p>
                        <p class="text-sm text-slate-500">Reserve a meeting room</p>
                    </div>
                </button>
                <button class="flex items-center gap-4 p-4 border border-slate-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition">
                    <span class="text-3xl">📋</span>
                    <div class="text-left">
                        <p class="font-medium text-slate-800">My Bookings</p>
                        <p class="text-sm text-slate-500">View your reservations</p>
                    </div>
                </button>
            </div>
        </div>

    </div>
</div>
@endsection