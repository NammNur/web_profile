@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="container">
    <div class="content">

        <h2 class="title-bar">Edit Produk</h2>

        <form action="{{ route('admin.produk.update', $produk->id_produk) }}" 
              method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- 🔥 PENTING: SIMPAN KATEGORI ASAL --}}
            <input type="hidden" name="redirect_kategori" value="{{ $produk->kategori }}">

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" 
                       value="{{ old('nama_produk', $produk->nama_produk) }}" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" 
                       value="{{ old('kategori', $produk->kategori) }}" required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" 
                       value="{{ old('harga', $produk->harga) }}" required>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" 
                       value="{{ old('stok', $produk->stok) }}" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" 
                       value="{{ old('satuan', $produk->satuan) }}">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn save">Simpan</button>

                {{-- 🔥 KEMBALI KE KATEGORI ASAL --}}
                <a href="{{ route('admin.products.manage', [
                    'type' => str_replace('produksi ', '', $produk->kategori)
                ]) }}" class="btn back">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

<style>
.form-group { margin-bottom: 15px; }
label { font-weight: 600; display:block; margin-bottom:6px; }
input, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ddd;
}
textarea { min-height: 100px; }

.form-actions {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.btn.save {
    background: #2563eb;
    color: #fff;
    padding: 10px 18px;
    border-radius: 6px;
    border: none;
}

.btn.back {
    background: #6b7280;
    color: #fff;
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
}
</style>
@endsection
