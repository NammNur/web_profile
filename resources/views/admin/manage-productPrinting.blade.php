@extends('layouts.admin')

@section('title', 'Admin Manage Product Printing')

@section('content')
<div class="container">
    <div class="content">

        <div class="title-bar">Data Produk Printing</div>

        <!-- TABLE WRAPPER -->
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
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td>{{ $p->nama_produk }}</td>
                            <td>{{ ucfirst($p->kategori) }}</td>
                            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>{{ $p->satuan ?? '-' }}</td>
                            <td class="desc">
                                {{ Str::limit($p->deskripsi, 50, '...') }}
                            </td>

                            <!-- 🔥 AKSI -->
                            <td class="aksi">
                                <!-- EDIT -->
                                <a href="{{ route('admin.produk.edit', $p->id_produk) }}"
                                   class="btn edit">
                                    Edit
                                </a>

                                <!-- HAPUS -->
                                <form action="{{ route('admin.produk.destroy', $p->id_produk) }}"
                                      method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty">
                                Data produk printing belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
