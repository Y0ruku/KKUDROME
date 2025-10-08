<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Contract;
use Illuminate\Support\Carbon;

class BillController extends Controller
{
    public function index()
    {
        $contracts = Contract::with('room')
            ->where('status', 'active')
            ->get();

        $currentMonth = now()->format('Y-m');

        $bills = Bill::with('contract.room')
            ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$currentMonth])
            ->get();

        return view('bill', compact('contracts', 'bills'));
    }

    public function store(Request $request)
{
    $request->validate([
        'contract_id' => 'required|exists:contracts,id',
        'amount' => 'required|numeric|min:1',
        'due_date' => 'required|date',
    ]);

    $currentMonth = now()->format('Y-m');

    // ถ้ามีบิลที่ชำระแล้ว → ห้ามสร้างใหม่
    $paidBillExists = Bill::where('contract_id', $request->contract_id)
        ->where('status', 'paid')
        ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$currentMonth])
        ->exists();

    if ($paidBillExists) {
        return back()->with('error', '❌ สัญญานี้ชำระบิลเดือนนี้แล้ว ไม่สามารถสร้างซ้ำได้');
    }

    // ถ้ามีบิลของเดือนนี้ที่ยังไม่ชำระ → ลบทิ้งก่อน
    Bill::where('contract_id', $request->contract_id)
        ->where('status', '!=', 'paid')
        ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$currentMonth])
        ->delete();

    // ✅ สร้างบิลใหม่
    Bill::create([
        'contract_id' => $request->contract_id,
        'amount' => $request->amount,
        'due_date' => $request->due_date,
        'status' => 'unpaid',
    ]);

    return back()->with('success', '✅ สร้างบิลสำเร็จแล้ว (แทนของเดิม)');
}

}
