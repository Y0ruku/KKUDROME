<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $user = DB::table('users')->where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // แยก role
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/tenant/dashboard');
            }
        }

        return back()->withErrors(['login' => 'Invalid Username or Password']);
    }
}
