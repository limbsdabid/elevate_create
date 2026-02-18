<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard — protected (dapat naka-login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');