<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Repair;

class RepairController extends Controller
{
    // RepairController.php
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        Repair::create([
            'user_id'     => auth()->id(),
            'room_id'     => auth()->user()->contracts->first()?->room?->id,
            'description' => $request->message,
            'status'      => 'pending',
        ]);

        return back()->with('success', 'ส่งข้อความสำเร็จ!');
    }
    public function recivemassage()
    {
        // ดึงข้อความทั้งหมดจากตาราง repairs พร้อมข้อมูลผู้ใช้
        $repairs = Repair::with('user')->latest()->get();

        return view('Massage', compact('repairs'));
    }
}

