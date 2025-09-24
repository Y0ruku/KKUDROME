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
        ], [
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
        ]);

        $username = $request->username;
        $password = $request->password;

        // ตรวจสอบข้อมูลผู้ใช้
        $user = DB::table('users')
            ->where('username', $username)
            ->where('password', $password)
            ->first();

        if ($user) {
            $userModel = User::find($user->id);
            Auth::login($userModel);
            
            // redirect ตาม role
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'tenant') {
                return redirect()->intended('/mainuser');
            }
        }

        return back()->withErrors(['error' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'])->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'ออกจากระบบเรียบร้อยแล้ว');
    }
}