<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminPengirimanController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pengiriman', compact('orders'));
    }
}
