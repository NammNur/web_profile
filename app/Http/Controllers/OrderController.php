<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // ===============================
    // FORM PESANAN
    // ===============================
    public function create($id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();
        return view('produk.pesan', compact('product'));
    }

    // ===============================
    // SIMPAN PESANAN
    // ===============================
    public function store(Request $request, $id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();

        $request->validate([
            'no_wa'    => 'required|string',
            'quantity' => 'required|integer|min:1|max:' . $product->stok,
            'alamat'   => 'required|string',
            'catatan'  => 'nullable|string',
        ]);

        $order = Order::create([
            'user_id'     => Auth::id(),
            'produk_id'   => $product->id_produk,
            'nama_produk' => $product->nama_produk,
            'quantity'    => $request->quantity,
            'total_price' => $product->harga * $request->quantity,
            'no_wa'       => $request->no_wa,
            'alamat'      => $request->alamat,
            'catatan'     => $request->catatan,
            'status'      => 'pending',
        ]);

        // Kurangi stok
        $product->decrement('stok', $request->quantity);

        // ✅ PAKAI id (BUKAN id_order)
        return redirect()
            ->route('pembayaran.show', $order->id)
            ->with('success', 'Pesanan berhasil dibuat');
    }

    // ===============================
    // HALAMAN PEMBAYARAN
    // ===============================
    public function pembayaran($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('produk.pembayaran', compact('order'));
    }

    // ===============================
    // SIMPAN PEMBAYARAN
    // ===============================
    public function pembayaranStore(Request $request, $id)
    {
        $request->validate([
            'metode' => 'required|string',
        ]);

        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $order->update([
            'metode_pembayaran' => $request->metode,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('home')
            ->with('success', 'Pembayaran berhasil dikonfirmasi');
    }
}
