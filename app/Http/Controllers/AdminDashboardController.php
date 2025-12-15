<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total user
        $totalUser = User::count();

        // Total order
        $totalOrder = DB::table('orders')->count();

        // Produk terkirim (status delivered)
        $deliveredProduct = DB::table('orders')
            ->where('status', 'delivered')
            ->count();

        // Pendapatan minggu lalu
        $lastWeekEarning = DB::table('orders')
            ->whereBetween('created_at', [
                Carbon::now()->subWeek(),
                Carbon::now()
            ])
            ->sum('total_price');

        return view('admin.dashboard', compact(
            'totalUser',
            'totalOrder',
            'deliveredProduct',
            'lastWeekEarning'
        ));
    }
}
