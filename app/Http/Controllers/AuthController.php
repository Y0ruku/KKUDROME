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
        // ถ้า login แล้วให้ redirect ตาม role
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'tenant') {
                return redirect('/tenant/dashboard');
            }
        }
        
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        $user = DB::table('users')
            ->where('username', $username)
            ->where('password', $password)
            ->first();

        if ($user) {
            $userModel = User::find($user->id);
            Auth::login($userModel);
            
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'tenant') {
                return redirect('/tenant/dashboard');
            }
        }

        return back()->withErrors(['error' => 'Username หรือ Password ไม่ถูกต้อง']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}