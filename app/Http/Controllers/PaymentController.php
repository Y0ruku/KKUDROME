<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'bill_id' => 'required|exists:bills,id',
            'slip_image' => 'required|image|mimes:jpeg,png,jpg|max:10240', // 10MB
        ]);

        $bill = Bill::findOrFail($request->bill_id);

        // อัปโหลดไฟล์
        $file = $request->file('slip_image');
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads/slips', $filename, 'public');

        // สร้างหรืออัปเดต Payment
        $payment = $bill->payment ?? new Payment();
        $payment->bill_id = $bill->id;
        $payment->slip_image = '/storage/' . $path; // เก็บ path ให้เข้าถึง public ได้
        $payment->status = 'pending';
        $payment->payment_date = now();
        $payment->save();

        // แจ้งเตือนสำเร็จ
        return back()->with('success', 'อัปโหลดสลิปสำเร็จแล้ว! ระบบจะตรวจสอบโดยเจ้าหน้าที่เร็วๆ นี้');
    }
    //payment status
    public function index()
{
    $payments = Payment::with(['bill.room'])->get();
    return view('paymentstatus', compact('payments'));
}

public function updateStatus(Request $request, Payment $payment)
{
    $request->validate([
        'status' => 'required|in:approved,rejected'
    ]);

    $payment->status = $request->status;
    $payment->save();

    return redirect()->back()->with('success', 'Status updated successfully!');
}

   

}

