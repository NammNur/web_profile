@extends('layouts.admin')

@section('title', 'Data Semua Orders')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/orders.css') }}">

<div class="admin-orders">

    <h2 class="page-title">Data Orders</h2>

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
                    <th>No</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Catatan</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($orders as $o)
                <tr>
                    <td class="center">{{ $loop->iteration }}</td>
                    <td>{{ $o->nama_produk }}</td>
                    <td class="center">
                        {{ ucfirst(str_replace('produksi ', '', $o->produk->kategori ?? '-')) }}
                    </td>
                    <td>{{ $o->user->nama ?? '-' }}</td>
                    <td>{{ $o->alamat ?? '-' }}</td>
                    <td class="center">{{ $o->quantity }}</td>
                    <td class="right">Rp {{ number_format($o->total_price, 0, ',', '.') }}</td>
                    <td class="center">{{ strtoupper($o->metode_pembayaran ?? '-') }}</td>

                    {{-- STATUS (AMBIL MURNI DARI DATABASE) --}}
                    <td class="center">
                        <span class="status {{ $o->status }}">
                            {{ ucfirst($o->status) }}
                        </span>
                    </td>

                    <td>{{ $o->catatan ?? '-' }}</td>
<td class="center">
    @if ($o->bukti_pembayaran)
        <a href="{{ asset('storage/'.$o->bukti_pembayaran) }}"
           target="_blank"
           class="btn-bukti">
            Lihat Bukti
        </a>
    @else
        <span class="text-muted">Belum ada</span>
    @endif
</td>


                   <td class="center aksi-col">
    @if ($o->status === 'pending')
        <a href="{{ route('admin.orders.resiForm', $o->id) }}"
           class="status-btn proses">
            Proses
        </a>
    @else
                            -
                        @endif
                    </td>

                    <td class="center">{{ $o->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="13" class="center">Belum ada data order</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
</div>
@endsection
