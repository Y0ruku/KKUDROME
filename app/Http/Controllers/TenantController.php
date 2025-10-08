<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    // แสดงรายการหลัก
       public function index()
    {
        $tenants = Contract::with(['user', 'room'])
            ->where('status', 'active')
            ->whereNull('deleted_at')
            ->get()
            ->map(function ($contract) {
                return (object)[
                    'id' => $contract->id,
                    'user_id' => $contract->user->id,
                    'firstname' => $contract->user->firstname,
                    'lastname' => $contract->user->lastname,
                    'end_date' => $contract->end_date,
                    'room_number' => $contract->room->roon_number,
                    'room_type' => $contract->room->room_type,
                ];
            });

        $deletedTenants = Contract::onlyTrashed()
            ->with(['user', 'room'])
            ->latest('deleted_at')
            ->take(5)
            ->get()
            ->map(function ($contract) {
                return (object)[
                    'id' => $contract->id,
                    'firstname' => $contract->user->firstname,
                    'lastname' => $contract->user->lastname,
                    'room_number' => $contract->room->roon_number,
                    'room_status' => $contract->room->status
                ];
            });

        return view('accountuser', compact('tenants', 'deletedTenants'));
    }

public function delete($contractId)
{
    $contract = Contract::findOrFail($contractId);
    $user = $contract->user;

    // ทำให้ห้องว่าง
    if ($contract->room) {
        $room = $contract->room;
        $room->status = 'available';
        $room->save();
    }

    // ลบสัญญาและ user
    $contract->delete();
    $user->delete();

    return redirect()->route('tenant.index')->with('success', 'Tenant deleted.');
}

   

    // บันทึกใหม่
    public function store(Request $request)
{
    DB::transaction(function () use ($request) {

        // ✅ สร้าง User
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'username'  => $request->username,
            'email'     => $request->email,
            'tel'       => $request->tel,
            'password'  => ($request->password),
            'role'      => 'tenant',
        ]);

        // ✅ อัปเดตสถานะห้อง
        $room = Room::where('status', 'available')
            ->where('id', $request->room_id)
            ->firstOrFail();

        $room->status = 'occupied';
        $room->save();

        // ✅ สร้าง Contract
        $contract = Contract::create([
            'user_id'   => $user->id,
            'room_id'   => $room->id,
            'start_date'=> now(),
            'end_date'  => $request->end_date,
            'status'    => 'active',
        ]);

        // ✅ สร้าง Bill อัตโนมัติ
        \App\Models\Bill::create([
            'contract_id' => $contract->id,
            'amount'      => $room->price ?? 3000, // ใช้ราคาห้องหรือค่าคงที่
            'due_date'    => now()->addMonthNoOverflow(), // ครบกำหนดเดือนหน้า
            'status'      => 'unpaid',
        ]);
    });

    return redirect()->route('tenant.index')->with('success', 'Tenant added');
}


public function update(Request $request, $id)
{
    $contract = Contract::findOrFail($id);
    $user = User::findOrFail($contract->user_id);

    $user->update([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'username' => $request->username,
        'email' => $request->email,
        'tel' => $request->tel,
        'password' => $request->password ? ($request->password) : $user->password,
    ]);

    $contract->update([
        'end_date' => $request->end_date,
    ]);

    return redirect()->route('tenant.index')->with('success', 'Tenant updated.');
}
public function fetch($id)
{
    $contract = Contract::with(['user', 'room'])->findOrFail($id);

    return response()->json([
        'contract_id' => $contract->id,
        'firstname'   => $contract->user->firstname,
        'lastname'    => $contract->user->lastname,
        'username'    => $contract->user->username,
        'email'       => $contract->user->email,
        'tel'         => $contract->user->tel,
        'end_date'    => $contract->end_date,
        'room_id'     => $contract->room->id ?? null,
        'room_number' => $contract->room->roon_number ?? null,
        'room_type'   => $contract->room->room_type ?? null,
    ]);
}


}




