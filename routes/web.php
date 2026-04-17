<?php

use App\Http\Controllers\Admin\BidangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index']);

//Register
Route::get('/register', [HomeController::class, 'index']);

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::prefix('admin')->middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard'); // Dashboard
    Route::resource('/users', UserController::class); // User
    Route::resource('/bidangs', BidangController::class); // Bidang
});

