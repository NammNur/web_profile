<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * HALAMAN FORM PESANAN
     */
    public function create($id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();

        return view('produk.pesan', compact('product'));
    }

    /**
     * SIMPAN PESANAN
     */
    public function store(Request $request, $id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();

        $request->validate([
            'no_wa'    => 'required|string',
            'quantity' => 'required|integer|min:1|max:' . $product->stok,
            'catatan'  => 'nullable|string',
        ]);

        // HITUNG TOTAL HARGA
        $totalPrice = $product->harga * $request->quantity;

        Order::create([
            'user_id'     => Auth::id(),
            'produk_id'   => $product->id_produk,
            'nama_produk' => $product->nama_produk,
            'harga'       => $product->harga,
            'quantity'    => $request->quantity,
            'total_price' => $totalPrice,
            'no_wa'       => $request->no_wa,
            'catatan'     => $request->catatan,
            'status'      => 'pending',
        ]);

        // KURANGI STOK PRODUK
        $product->decrement('stok', $request->quantity);

        return redirect()
            ->route('produk.show', $product->id_produk)
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}
