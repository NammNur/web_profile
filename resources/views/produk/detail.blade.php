@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/detailproduct.css') }}">

<div class="container py-5">

    <div class="row align-items-center product-detail">

        <!-- IMAGE -->
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-image-card">
                <img src="{{ $product->foto
                    ? asset('asset/img/' . $product->foto)
                    : asset('asset/img/no-image.png') }}"
                    alt="{{ $product->nama_produk }}">
            </div>
        </div>

        <!-- INFO -->
        <div class="col-md-6">
            <span class="product-category">
                {{ strtoupper($product->kategori) }}
            </span>

            <h2 class="product-title">
                {{ $product->nama_produk }}
            </h2>

            <h4 class="product-price">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </h4>

            <p class="product-stock">
                <strong>Status:</strong>
                <span class="{{ $product->stok > 0 ? 'available' : 'empty' }}">
                    {{ $product->stok > 0 ? 'Tersedia' : 'Habis' }}
                </span>
            </p>

            <hr>

            <h5 class="desc-title">Deskripsi Produk</h5>
            <p class="product-desc">
                {{ $product->deskripsi ?? '-' }}
            </p>

            <div class="action-btn mt-4">
                <a href="{{ route('produk.pesan', $product->id_produk) }}" class="btn btn-order">
                    🛒 Pesan Sekarang
                </a>

                <a href="{{ route('produk.index') }}" class="btn btn-back">
                    ← Kembali
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
