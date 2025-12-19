<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminOrderController extends Controller
{
    /**
     * Mengambil pesanan berdasarkan kategori produk.
     */
    private function ordersByKategori($kategori)
    {
        return Order::with('produk')
            ->whereHas('produk', function ($q) use ($kategori) {
                $q->where('kategori', 'produksi ' . $kategori);
            })
            ->paginate(10);
    }

    /**
     * Menampilkan pesanan kategori Jersey
     */
    public function jersey()
    {
        $orders = $this->ordersByKategori('jersey');

        return view('admin.orders.index', [
            'title'  => 'Earnings Product Jersey',
            'orders' => $orders
        ]);
    }

    /**
     * Menampilkan pesanan kategori Konveksi
     */
    public function konveksi()
    {
        $orders = $this->ordersByKategori('konveksi');

        return view('admin.orders.index', [
            'title'  => 'Earnings Product Konveksi',
            'orders' => $orders
        ]);
    }

    /**
     * Menampilkan pesanan kategori Printing
     */
    public function printing()
    {
        $orders = $this->ordersByKategori('printing');

        return view('admin.orders.index', [
            'title'  => 'Earnings Product Printing',
            'orders' => $orders
        ]);
    }

    /**
     * Menampilkan pesanan kategori Logam
     */
    public function logam()
    {
        $orders = $this->ordersByKategori('logam');

        return view('admin.orders.index', [
            'title'  => 'Earnings Product Logam',
            'orders' => $orders
        ]);
    }

    /**
     * Menampilkan pesanan kategori Bordir
     */
    public function bordir()
    {
        $orders = $this->ordersByKategori('bordir');

        return view('admin.orders.index', [
            'title'  => 'Earnings Product Bordir',
            'orders' => $orders
        ]);
    }
}
