@extends('layouts.admin')

@section('title', 'Data Semua Orders')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/orders.css') }}">

<div class="admin-orders">

    <h2 class="page-title">Orders</h2>

    {{-- FILTER KATEGORI --}}
    <form method="GET" action="{{ route('admin.orders') }}" class="filter-bar">
        <select name="kategori" onchange="this.form.submit()">
            <option value="">🔽 Semua Kategori</option>
            <option value="jersey" {{ request('kategori') == 'jersey' ? 'selected' : '' }}>Jersey</option>
            <option value="konveksi" {{ request('kategori') == 'konveksi' ? 'selected' : '' }}>Konveksi</option>
            <option value="printing" {{ request('kategori') == 'printing' ? 'selected' : '' }}>Printing</option>
            <option value="logam" {{ request('kategori') == 'logam' ? 'selected' : '' }}>Logam</option>
            <option value="bordir" {{ request('kategori') == 'bordir' ? 'selected' : '' }}>Bordir</option>
        </select>
    </form>

    <div class="order-card">
        <table class="order-table">
            <thead>
                <tr>
                    <th class="col-no">No</th>
                    <th class="col-produk">Produk</th>
                    <th class="col-kategori">Kategori</th>
                    <th class="col-jumlah">Jumlah</th>
                    <th class="col-total">Total</th>
                    <th class="col-status">Status</th>
                    <th class="col-catatan">Catatan</th>
                    <th class="col-aksi">Aksi</th>
                    <th class="col-tanggal">Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $o)
                <tr>
                    <td class="center col-no">{{ $loop->iteration }}</td>
                    <td class="col-produk">{{ $o->nama_produk }}</td>
                    <td class="center col-kategori">{{ ucfirst(str_replace('produksi ', '', $o->produk->kategori ?? '-')) }}</td>
                    <td class="center col-jumlah">{{ $o->quantity }}</td>
                    <td class="right col-total">Rp {{ number_format($o->total_price, 0, ',', '.') }}</td>
                    <td class="center col-status">
                        <span class="status {{ $o->status }}">{{ ucfirst($o->status) }}</span>
                    </td>
                    <td class="col-catatan">{{ $o->catatan ?? '-' }}</td>
                    <td class="center action-col col-aksi">
                        @if ($o->status !== 'proses')
                        <form method="POST" action="{{ route('admin.orders.updateStatus', $o->id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="proses">
                            <button class="status-btn proses">Proses</button>
                        </form>
                        @endif

                        @if ($o->status !== 'selesai')
                        <form method="POST" action="{{ route('admin.orders.updateStatus', $o->id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="selesai">
                            <button class="status-btn selesai">Selesai</button>
                        </form>
                        @endif
                    </td>
                    <td class="center col-tanggal">{{ $o->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
</div>
@endsection
