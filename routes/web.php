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

    // Routes อื่น ๆ สำหรับผู้ใช้
    Route::get('/mainuser', function () {return view('mainuser');});
    Route::get('/contact', function () {return view('contact');});
    Route::get('/news', function () {return view('news');});
    Route::get('/payment', function () {return view('payment');});
    Route::get('/profile', function () {return view('profile');});

// Login Routes (สำหรับผู้ที่ยังไม่ได้ login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes (สำหรับผู้ที่ login แล้ว)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admindashboard'); // หน้า admin dashboard
        })->name('admin.dashboard');
    });

    // Tenant Routes
    Route::middleware(['tenant'])->group(function () {
        Route::get('/tenant/dashboard', function () {
            return view('tenantdashboard'); // หน้า tenant dashboard
        })->name('tenant.dashboard');
    });


    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
});
