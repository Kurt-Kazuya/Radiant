<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class AdminPaymentController extends Controller
{
    public function index() {
        $payments = Payment::with('reservation.user')->latest()->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    public function markPaid($id) {
        Payment::findOrFail($id)->update([
            'payment_status' => 'paid',
            'paid_at'        => now(),
        ]);
        return back()->with('success', 'Payment marked as paid!');
    }

    public function destroy(Payment $payment) {
        $payment->delete();
        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted!');
    }
}