<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TenantController;

Route::get('/mainuser' ,function(){ return view('mainuser');});
Route::get('/contact' ,function(){ return view('contact');});
Route::get('/profile' ,function(){ return view('profile');});
Route::get('/payment' ,function(){ return view('payment');});
Route::get('/news', [NewsController::class, "news"]);
Route::post('/contact/send', [RepairController::class, 'store'])->name('contact.send');
Route::post('/payments/upload', [PaymentController::class, 'upload'])->name('payments.upload');






// Redirect หน้าแรกไป login
Route::get('/', function () {
    // ถ้า login แล้วให้ไปหน้าตาม role
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'tenant') {
            return redirect('/mainuser');
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
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    
    
    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admindashboard');
        })->name('admin.dashboard');
    });
   Route::middleware(['admin'])->group(function () {
        Route::get('/admin/Massage',[RepairController::class, 'recivemassage'])->name('admin.Massage');
    });
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/profile', function () {
            return view('Adminprofile');
        })->name('admin.profile');
    });
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/paymentstatus',[PaymentController::class, 'index'])->name('admin.paymentstatus');
    });
     Route::middleware(['admin'])->group(function () {
        // routes/web.php
Route::put('/admin/paymentstatus/{payment}', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');

    });
    
    Route::middleware(['admin'])->group(function(){
        //หน้าแก้ไขข้อมูลลูกค้า
        Route::get('/admin/accountuser', [TenantController::class, 'index'])->name('tenant.index');
Route::delete('/tenant/delete/{id}', [TenantController::class, 'delete'])->name('tenant.delete');
    Route::get('/tenant/edit/{id}', [TenantController::class, 'edit'])->name('tenant.edit');
    Route::get('/tenant/fetch/{id}', [TenantController::class, 'fetch'])->name('tenant.fetch');
    Route::put('/tenant/update/{id}', [TenantController::class, 'update'])->name('tenant.update');
    Route::post('/tenant/store', [TenantController::class, 'store'])->name('tenant.store');
    });

Route::middleware(['admin'])->group(function(){
// หน้าแสดงรายการประกาศ (admin ใช้จัดการ)
Route::get('/admin/announcements', [NewsController::class, 'index'])->name('announcements.index');
Route::post('/announcements/store', [NewsController::class, 'store'])->name('announcements.store');
Route::put('/announcements/update/{id}', [NewsController::class, 'update'])->name('announcements.update');
Route::delete('/announcements/delete/{id}', [NewsController::class, 'destroy'])->name('announcements.destroy');

    });

    // Tenant Routes  
    Route::middleware(['tenant'])->group(function () {
        Route::get('/tenant/dashboard', function () {
            return view('tenantdashboard');
        })->name('tenant.dashboard');
    });
});