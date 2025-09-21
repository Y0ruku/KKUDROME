<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

// Routes สำหรับ guest
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Routes ที่ต้อง authentication
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Admin Dashboard (ต้องเป็น admin)
    Route::middleware(['auth.admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admindashboard');
        });
    });

    // Tenant Dashboard (ต้องเป็น tenant)
    Route::middleware(['auth.tenant'])->group(function () {
        Route::get('/tenant/dashboard', function () {
            return view('tenandashboard');
        });
    });
});