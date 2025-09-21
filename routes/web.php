<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Login Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/tenant/dashboard', function () {
    return view('tenant.dashboard');
})->name('tenant.dashboard');

// Redirect root
Route::get('/', function () {
    return redirect('/login');
});