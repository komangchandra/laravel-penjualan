<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $payments = Payment::all();
        return view('dashboard.payments.index', compact('payments'));
    }

    public function edit(Payment $payment)
    {
        return view('dashboard.payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'bank' => 'required',
            'number' => 'required'
        ]);

        $payment->update([
            'bank' => $request->bank,
            'number' => $request->number,
        ]);

        return redirect()->route('payments.index')->with('success', 'Berhasil update');
    }
}
