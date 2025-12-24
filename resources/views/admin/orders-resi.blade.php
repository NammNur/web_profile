@extends('layouts.admin')

@section('title', 'Input Nomor Resi')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/orders.css') }}">

<div class="admin-orders">

    <h2 class="page-title">📦 Input Nomor Resi</h2>

    <div class="order-card">

        <table class="order-table">
            <tr>
                <th width="200">Nama Pemesan</th>
                <td>{{ $order->user->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nama Produk</th>
                <td>{{ $order->nama_produk }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $order->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </td>
            </tr>
        </table>

        <br>

        <form method="POST" action="{{ route('admin.orders.storeResi', $order->id) }}">
            @csrf
            @method('PATCH')

            <label><strong>Nomor Resi</strong></label>
            <input type="text"
                   name="resi"
                   class="form-control"
                   placeholder="Masukkan nomor resi pengiriman"
                   required>

            <br>

            <button class="status-btn proses">Simpan & Proses</button>
            <a href="{{ route('admin.orders') }}" class="status-btn selesai">
                Batal
            </a>
        </form>

    </div>
</div>
@endsection
