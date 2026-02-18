@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">

    {{-- Navbar --}}
    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">🏢 GenSpace</h1>
        <div class="flex items-center gap-4">
            <span>Hello, {{ Auth::user()->name }}!</span>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="bg-white text-blue-600 px-4 py-1 rounded-lg hover:bg-gray-100 transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    {{-- Content --}}
    <div class="p-8">
        <h2 class="text-2xl font-bold text-gray-700 mb-2">Welcome to GenSpace! 🎉</h2>
        <p class="text-gray-500">Meeting Room Reservation System</p>
    </div>

</div>
@endsection