<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * ===============================
     * HALAMAN FORM PESANAN
     * ===============================
     */
    public function create($id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();
        return view('produk.pesan', compact('product'));
    }

    /**
     * ===============================
     * SIMPAN PESANAN (LOGIC TIDAK DIUBAH)
     * ===============================
     */
    public function store(Request $request, $id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();

        $request->validate([
            'no_wa'    => 'required|string',
            'quantity' => 'required|integer|min:1|max:' . $product->stok,
            'catatan'  => 'nullable|string',
        ]);

        $totalPrice = $product->harga * $request->quantity;

        // 🔥 SIMPAN KE VARIABEL
        $order = Order::create([
            'user_id'     => Auth::id(),
            'produk_id'   => $product->id_produk,
            'nama_produk' => $product->nama_produk,
            'harga_jual'  => $product->harga,
            'quantity'    => $request->quantity,
            'total_price' => $totalPrice,
            'no_wa'       => $request->no_wa,
            'alamat'       => $request->alamat,
            'catatan'     => $request->catatan,
            'status'      => 'pending',
        ]);

        // KURANGI STOK
        $product->decrement('stok', $request->quantity);

        // 🔥 ARAHKAN KE PEMBAYARAN
        return redirect()
            ->route('pembayaran.show', $order->id_order)
            ->with('success', 'Pesanan berhasil dibuat, silakan lakukan pembayaran.');
    }

    /**
     * ===============================
     * HALAMAN PEMBAYARAN
     * ===============================
     */
    public function pembayaran($id)
    {
        $order = Order::with('produk')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('produk.pembayaran', compact('order'));
    }


    /**
     * ===============================
     * SIMPAN METODE PEMBAYARAN
     * ===============================
     */
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
            'status' => 'menunggu_verifikasi',
        ]);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Pembayaran berhasil dikonfirmasi');
    }
}
