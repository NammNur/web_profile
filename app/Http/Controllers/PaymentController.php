<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function index(Order $order)
    {
        return view('pembayaran.index', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        $request->validate([
            'metode' => 'required',
        ]);

        $order->update([
            'metode_pembayaran' => $request->metode,
            'status' => 'menunggu_verifikasi',
        ]);

        return redirect()->route('home')
            ->with('success', 'Pembayaran berhasil dikonfirmasi');
    }
}
