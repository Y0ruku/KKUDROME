<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;

Route::get('/mainuser' ,function(){ return view('mainuser');});
Route::get('/contact' ,function(){ return view('contact');});
Route::get('/profile' ,function(){ return view('profile');});
Route::get('/payment' ,function(){ return view('payment');});
Route::get('/news', [NewsController::class, "news"]);

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

// Login Routes (สำหรับผู้ที่ยังไม่ได้ login)
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
            return view('admindashboard');
        })->name('admin.dashboard');
    });

    // Tenant Routes  
    Route::middleware(['tenant'])->group(function () {
        Route::get('/tenant/dashboard', function () {
            return view('tenantdashboard');
        })->name('tenant.dashboard');
    });
});