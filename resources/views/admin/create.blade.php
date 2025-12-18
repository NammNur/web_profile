@extends('layouts.admin')

@section('title', 'Upload Produk')

@section('content')
    <div class="content">

        <div class="title-bar">Upload Produk</div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
            @csrf

            <div class="upload-layout">

                <!-- LEFT : IMAGE UPLOAD -->
                <!-- LEFT : IMAGE UPLOAD -->
                <div class="upload-image">
                    <label for="foto" class="image-box">
                        <input type="file" id="foto" name="foto" hidden accept="image/*">
                        <img src="{{ asset('asset/img/upload.png') }}" alt="Upload" id="preview">
                        <p>Upload Foto Produk</p>
                        <span>PNG / JPG max 2MB</span>
                    </label>
                </div>


                <!-- RIGHT : PRODUCT INFO -->
                <div class="upload-info">

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" placeholder="Masukkan nama produk">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="jersey">Jersey</option>
                            <option value="printing">Printing</option>
                            <option value="konveksi">Konveksi</option>
                            <option value="bordir">Bordir</option>
                            <option value="logam">Logam</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" placeholder="Rp">
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" placeholder="Jumlah stok">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <textarea name="deskripsi" placeholder="Deskripsi produk..."></textarea>
                    </div>

                    <button type="submit" class="btn-save">
                        Simpan Produk
                    </button>

                </div>

            </div>

        </form>

    </div>
@endsection
