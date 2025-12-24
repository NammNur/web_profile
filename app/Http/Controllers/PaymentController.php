<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    /**
     * Tampilkan halaman pembayaran
     */
    public function index($id)
    {
        $order = Order::with(['produk', 'user'])->findOrFail($id);
        return view('produk.pembayaran', compact('order'));
    }

    /**
     * Simpan bukti pembayaran (USER)
     * ❗ TIDAK BOLEH MENGUBAH STATUS KE PROSES
     */
    public function store(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'metode' => 'required|in:transfer,ewallet,cod',
            'bukti_transfer' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bukti_ewallet'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $bukti = null;

        // TRANSFER
        if ($request->metode === 'transfer' && $request->hasFile('bukti_transfer')) {
            $bukti = $request->file('bukti_transfer')
                ->store('bukti_pembayaran', 'public');
        }

        // EWALLET
        if ($request->metode === 'ewallet' && $request->hasFile('bukti_ewallet')) {
            $bukti = $request->file('bukti_ewallet')
                ->store('bukti_pembayaran', 'public');
        }

        // UPDATE ORDER
        $order->update([
            'metode_pembayaran' => $request->metode,
            'bukti_pembayaran'  => $bukti,
            'status'            => 'pending', // ✅ WAJIB PENDING
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Bukti pembayaran berhasil dikirim, menunggu verifikasi admin');
    }
}
