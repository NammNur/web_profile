@extends('layouts.app')

@section('title', 'Data Pesanan Saya')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/pengiriman.css') }}">

<div class="pengiriman-container">

    <h2 class="pengiriman-title">📦 Data Pesanan Saya</h2>

    @forelse($orders as $o)
        <div class="pengiriman-card">

            <div class="pengiriman-header">
                <strong>{{ $o->nama_produk }}</strong>
                <span class="status {{ $o->status }}">
                    {{ strtoupper($o->status) }}
                </span>
            </div>

            <div class="pengiriman-body">
                <p><b>Jumlah:</b> {{ $o->quantity }}</p>
                <p><b>Total:</b> Rp {{ number_format($o->total_price,0,',','.') }}</p>
                <p><b>Pembayaran:</b> {{ strtoupper($o->metode_pembayaran ?? '-') }}</p>
                <p><b>Alamat:</b> {{ $o->alamat }}</p>
                <p><b>Resi:</b> {{ $o->resi ?? '-' }}</p>
            </div>

            <div class="pengiriman-footer">
                {{ $o->created_at->format('d M Y') }}
            </div>

        </div>
    @empty
        <p>Tidak ada data pengiriman</p>
    @endforelse

</div>

@endsection
