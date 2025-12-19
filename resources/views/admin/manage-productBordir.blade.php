@extends('layouts.admin')

@section('title', 'Data Produk Bordir')

@section('content')
<div class="container">
    <div class="content">

        <div class="title-bar">Data Produk Bordir</div>

        <div class="table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($produk as $p)
                        <tr>
                            <td>{{ $p->id_produk }}</td>

                            <td>
                                @if($p->foto)
                                    <img src="{{ asset('asset/img/' . $p->foto) }}" class="product-img">
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ $p->nama_produk }}</td>
                            <td>{{ ucfirst($p->kategori) }}</td>
                            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>{{ $p->satuan }}</td>
                            <td class="desc">
                                {{ $p->deskripsi ?? '-' }}
                            </td>

                            <td>
                                <button class="btn edit">Edit</button>
                                <button class="btn delete">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty">
                                Data tidak tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
