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

        // เช็คจาก database ตรงๆ (plain text)
        $user = DB::table('users')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            // Login user เข้าระบบ
            Auth::loginUsingId($user->id);
            $request->session()->regenerate();
            
            // แยก role
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/tenant/dashboard');
            }
        }

        return back()->withErrors(['login' => 'Invalid Username or Password']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}