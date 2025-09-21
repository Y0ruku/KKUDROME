<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Redirect หน้าแรกไป login
Route::get('/', function () {
    // ถ้า login แล้วให้ไปหน้าตาม role
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'tenant') {
            return redirect('/tenant/dashboard');
        }
    }
    return redirect('/login');
});

// Login Routes (ต้องเป็น guest เท่านั้น)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Tenant Routes  
    Route::middleware(['tenant'])->group(function () {
        Route::get('/tenant/dashboard', function () {
            return view('tenant.dashboard');
        })->name('tenant.dashboard');
    });
});