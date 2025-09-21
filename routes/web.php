<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

// Login Routes (ไม่ต้องมี middleware)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (ต้องเป็น admin เท่านั้น)
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Tenant Routes (ต้องเป็น tenant เท่านั้น)
Route::middleware(['tenant'])->group(function () {
    Route::get('/tenant/dashboard', function () {
        return view('tenant.dashboard');
    })->name('tenant.dashboard');
});