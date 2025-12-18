<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminOrderController extends Controller
{
    private function ordersByKategori($kategori)
    {
        return Order::with('produk')
            ->whereHas('produk', function ($q) use ($kategori) {
                $q->where('kategori', $kategori);
            })
            ->selectRaw('
                produk_id,
                SUM(quantity) as total_qty,
                SUM(total_price) as total_harga
            ')
            ->groupBy('produk_id')
            ->paginate(10);
    }

    public function jersey()
    {
        $orders = $this->ordersByKategori('jersey');
        return view('admin.orders.index', [
            'orders' => $orders,
            'title'  => 'Earnings Product Jersey'
        ]);
    }

    public function konveksi()
    {
        $orders = $this->ordersByKategori('konveksi');
        return view('admin.orders.index', [
            'orders' => $orders,
            'title'  => 'Earnings Product Konveksi'
        ]);
    }

    public function printing()
    {
        $orders = $this->ordersByKategori('printing');
        return view('admin.orders.index', [
            'orders' => $orders,
            'title'  => 'Earnings Product Printing'
        ]);
    }

    public function logam()
    {
        $orders = $this->ordersByKategori('logam');
        return view('admin.orders.index', [
            'orders' => $orders,
            'title'  => 'Earnings Product Logam'
        ]);
    }

    public function bordir()
    {
        $orders = $this->ordersByKategori('bordir');
        return view('admin.orders.index', [
            'orders' => $orders,
            'title'  => 'Earnings Product Bordir'
        ]);
    }
}
