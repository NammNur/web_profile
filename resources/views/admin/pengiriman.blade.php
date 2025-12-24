@extends('layouts.admin')

@section('title', 'Data Pengiriman')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/orders.css') }}">

<div class="admin-orders">

    <h2 class="page-title">🚚 Data Pengiriman</h2>

    <div class="order-card">
        <table class="order-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Produk</th>
                    <th>No WA</th>
                    <th>Alamat</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Resi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($orders as $o)
                <tr>
                    <td class="center">{{ $loop->iteration }}</td>

                    {{-- NAMA PEMESAN --}}
                    <td>
                        {{ $o->user->nama ?? 'Tidak diketahui' }}
                    </td>

                    <td>{{ $o->nama_produk }}</td>
                    <td>{{ $o->no_wa }}</td>
                    <td>{{ $o->alamat ?? '-' }}</td>

                    <td class="center">{{ $o->quantity }}</td>

                    <td class="right">
                        Rp {{ number_format($o->total_price, 0, ',', '.') }}
                    </td>

                    <td class="center">
                        <span class="status {{ $o->status }}">
                            {{ ucfirst($o->status) }}
                        </span>
                    </td>

                    <td class="center">
                        {{ strtoupper($o->metode_pembayaran ?? '-') }}
                    </td>

                    {{-- RESI --}}
                    <td class="center">
                        {{ $o->resi ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $o->created_at->format('d M Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="center">
                        ❌ Belum ada data pengiriman
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
