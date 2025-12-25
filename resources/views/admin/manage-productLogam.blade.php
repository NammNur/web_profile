@extends('layouts.admin')

@section('title', 'Admin Manage Product Logam')

@section('content')
<div class="container">
    <div class="content">

        <div class="title-bar">Data Produk Logam</div>

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

                        <td class="aksi">
                            {{-- EDIT --}}
                            <a href="{{ route('admin.produk.edit', $p->id_produk) }}"
                               class="btn edit">
                                Edit
                            </a>

                            {{-- HAPUS --}}
                            <form action="{{ route('admin.produk.destroy', $p->id_produk) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus produk ini?')"
                                  style="display:inline;">
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
                            Data produk logam belum tersedia
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

<style>
/* ===== TABLE STYLE ===== */
.table-wrapper {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.admin-table thead {
    background: #f3f4f6;
}

.admin-table th,
.admin-table td {
    padding: 12px;
    text-align: left;
    vertical-align: middle;
    border-bottom: 1px solid #e5e7eb;
}

.admin-table tr:hover {
    background: #f9fafb;
}

.product-img {
    width: 55px;
    height: 55px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.desc {
    max-width: 220px;
    font-size: 13px;
    color: #555;
}

/* ===== BUTTON ===== */
.btn {
    padding: 6px 12px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
}

.btn.edit {
    background: #2563eb;
    color: #fff;
}

.btn.delete {
    background: #dc2626;
    color: #fff;
}

.aksi {
    display: flex;
    gap: 6px;
}

.empty {
    text-align: center;
    padding: 30px;
    color: #6b7280;
}
</style>
@endsection
