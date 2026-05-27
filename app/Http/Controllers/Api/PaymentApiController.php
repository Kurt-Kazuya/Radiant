<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentApiController extends Controller
{
// GET /api/payments
    public function index() {
        $payments = Payment::with('reservation')->get();
        return response()->json(['success' => true, 'data' => $payments], 200);
    }

// GET /api/payments/{id}
    public function show($id) {
        $payment = Payment::with('reservation')->find($id);
        if (!$payment) {
            return response()->json(['success' => false, 'message' => 'Payment not found'], 404);
        }
        return response()->json(['success' => true, 'data' => $payment], 200);
    }

// POST /api/payments
    public function store(Request $request) {
        $validated = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'amount'         => 'required|numeric',
            'payment_method' => 'required|in:cash,card,gcash',
            'payment_status' => 'required|in:paid,unpaid,refunded',
        ]);
        $payment = Payment::create($validated);
        return response()->json(['success' => true, 'data' => $payment], 201);
    }

// PUT /api/payments/{id}
    public function update(Request $request, $id) {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['success' => false, 'message' => 'Payment not found'], 404);
        }
        $payment->update($request->all());
        return response()->json(['success' => true, 'data' => $payment], 200);
    }

// DELETE /api/payments/{id}
    public function destroy($id) {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['success' => false, 'message' => 'Payment not found'], 404);
        }
        $payment->delete();
        return response()->json(['success' => true, 'message' => 'Payment deleted'], 200);
    }
}