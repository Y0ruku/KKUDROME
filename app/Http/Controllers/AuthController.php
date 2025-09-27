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
            'username' => 'required|string',
            'password' => 'required|string',
            'tel'      => 'required|string',
        ], [
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'tel.required'      => 'กรุณากรอกเบอร์โทรศัพท์',
        ]);

        $username = $request->username;
        $password = $request->password;
        $tel      = $request->tel;

        // หาผู้ใช้จาก username + tel
        $user = User::where('username', $username)
                    ->where('tel', $tel)
                    ->first();

        // ถ้ามี user และ password ตรงกัน (plain text)
        if ($user && $password === $user->password) {
            Auth::login($user);

            // redirect ตาม role
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'tenant') {
                return redirect()->intended('/mainuser');
            }
        }

        return back()->withErrors(['error' => 'ชื่อผู้ใช้ รหัสผ่าน หรือเบอร์โทรศัพท์ไม่ถูกต้อง'])
                     ->withInput($request->only('username', 'tel'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'ออกจากระบบเรียบร้อยแล้ว');
    }
}
