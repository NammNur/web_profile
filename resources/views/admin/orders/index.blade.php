@extends('layouts.admin')

@section('content')

{{-- CSS ADMIN ORDERS --}}
<link rel="stylesheet" href="{{ asset('asset/css/adminorders.css') }}">

<div class="admin-orders">

    <div class="order-wrapper">

        <div class="order-title">
            {{ $title }}
        </div>

        <div class="order-card">

            <table class="order-table">

                {{-- FIX KOLOM --}}
                <colgroup>
                    <col style="width:5%">
                    <col style="width:25%">
                    <col style="width:25%">
                    <col style="width:10%">
                    <col style="width:20%">
                    <col style="width:15%">
                </colgroup>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Transaksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>Produksi {{ ucfirst($order->produk->kategori) }}</td>
                        <td>{{ $order->produk->nama_produk }}</td>
                        <td>{{ $order->total_qty }}</td>
                        <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="order-badge success">Lunas</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <div class="pagination-wrapper">
                {{ $orders->links() }}
            </div>

        </div>

    </div>

</div>

@endsection
