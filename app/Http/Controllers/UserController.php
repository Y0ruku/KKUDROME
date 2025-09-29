<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->save();

        return redirect('/profile')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }
}