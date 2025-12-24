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
                    <th>Aksi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($orders as $o)
                <tr>
                    <td class="center">{{ $loop->iteration }}</td>

                    {{-- NAMA PEMESAN --}}
                    <td>{{ $o->user->nama ?? 'Tidak diketahui' }}</td>

                    <td>{{ $o->nama_produk }}</td>
                    <td>{{ $o->no_wa }}</td>
                    <td>{{ $o->alamat ?? '-' }}</td>

                    <td class="center">{{ $o->quantity }}</td>

                    <td class="right">
                        Rp {{ number_format($o->total_price, 0, ',', '.') }}
                    </td>

                    {{-- STATUS --}}
                    <td class="center">
                        <span class="status {{ $o->status }}">
                            {{ ucfirst($o->status) }}
                        </span>
                    </td>

                    {{-- PEMBAYARAN --}}
                    <td class="center">
                        {{ strtoupper($o->metode_pembayaran ?? '-') }}
                    </td>

                    {{-- RESI --}}
                    <td class="center">
                        {{ $o->resi ?? '-' }}
                    </td>

                    {{-- AKSI --}}
                    <td class="center aksi-col">

                        {{-- EDIT / INPUT RESI --}}
                        <a href="{{ route('admin.orders.resiForm', $o->id) }}"
                           class="status-btn proses">
                           Edit
                        </a>

                        {{-- SELESAI --}}
                        @if ($o->status !== 'selesai')
                        <form method="POST"
                              action="{{ route('admin.orders.updateStatus', $o->id) }}"
                              style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="selesai">
                            <button class="status-btn selesai">
                                Selesai
                            </button>
                        </form>
                        @endif
                    </td>

                    <td class="center">
                        {{ $o->created_at->format('d M Y') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="center">
                        ❌ Belum ada data pengiriman
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
