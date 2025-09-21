<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Debug: แสดงข้อมูลที่ส่งมา
        echo "Username: " . $request->username . "";
        echo "Password: " . $request->password . "";

        // เช็คจาก database
        $user = DB::table('users')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        // Debug: แสดงผลลัพธ์
        echo "User found: ";
        var_dump($user);
        echo "";

        if ($user) {
            echo "Role: " . $user->role . "";
            
            // สร้าง User model และ login
            $userModel = User::find($user->id);
            Auth::login($userModel);
            
            // Redirect ตาม role
            if ($user->role === 'admin') {
                echo "Redirecting to admin dashboard...";
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'tenant') {
                echo "Redirecting to tenant dashboard...";
                return redirect('/tenant/dashboard');
            }
        } else {
            echo "No user found!";
        }

        return back()->withErrors(['login' => 'Username หรือ Password ไม่ถูกต้อง']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}