<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('produk')
            ->when($request->kategori, function ($q) use ($request) {
                $q->whereHas('produk', function ($query) use ($request) {
                    $query->where('kategori', 'produksi ' . $request->kategori);
                });
            })
            ->latest()
            ->paginate(10);

        return view('admin.orders', [
            'title'  => 'Data Semua Orders',
            'orders' => $orders
        ]);
    }

    /**
     * UPDATE STATUS ORDER
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status order berhasil diubah');
    }
}
