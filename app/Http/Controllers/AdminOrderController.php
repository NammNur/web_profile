<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function exportPdf(Request $request)
    {
        $orders = Order::with(['user', 'produk'])
            ->when($request->kategori, function ($query) use ($request) {
                $query->whereHas('produk', function ($q) use ($request) {
                    $q->where('kategori', $request->kategori);
                });
            })
            ->get();

        $pdf = Pdf::loadView('admin.orders_pdf', compact('orders'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('data-orders.pdf');
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

        return back()->with('success', 'Status berhasil diubah');
    }


    public function resiForm($id)
    {
        $order = Order::with('user')->findOrFail($id);

        return view('admin.orders-resi', compact('order'));
    }

    public function storeResi(Request $request, $id)
    {
        $request->validate([
            'resi' => 'required|string|max:100'
        ]);

        $order = Order::findOrFail($id);
        $order->resi = $request->resi;
        $order->status = 'proses';
        $order->save();

        return redirect()->route('admin.orders')
            ->with('success', 'Resi berhasil disimpan & order diproses');
    }
}
