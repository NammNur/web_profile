@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('asset/css/katalog.css') }}">

<div class="content container">

    <h4 class="section-title">PRODUK</h4>

    <!-- SEARCH (opsional nanti kita aktifkan) -->
    <div class="search-wrapper">
        <input type="text" class="form-control search-input" placeholder="Search">
        <i class="bi bi-search search-icon"></i>
    </div>

    <!-- CATEGORY -->
    <div class="category-buttons">
        @php
            $categories = [
                'Produksi Jersey',
                'Produksi Logam',
                'Produksi Konveksi',
                'Produksi Printing',
                'Produksi Bordir'
            ];
        @endphp

        @foreach ($categories as $cat)
            <a href="{{ route('produk.index', ['kategori' => $cat]) }}"
               class="btn category {{ $kategoriAktif == $cat ? 'active' : '' }}">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    <!-- PRODUCT GRID -->
    <section class="best-seller-section">
        <div class="best-seller-grid">

            @forelse ($products as $product)
                <a href="{{ route('produk.show', $product->id_produk) }}" class="product-link">
                    <div class="seller-card">
                        <img src="{{ asset($product->foto) }}" alt="">
                        <p class="category">{{ $product->kategori }}</p>
                        <h4 class="product-name">{{ $product->nama_produk }}</h4>
                        <p class="price">
                            Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                        </p>
                    </div>
                </a>
            @empty
                <p class="text-center">Produk belum tersedia</p>
            @endforelse

        </div>

        <div class="more-container">
            <button class="btn-more">Lainnya</button>
        </div>
    </section>

    <div class="text-center mt-4">
        <button class="btn btn-dark rounded-pill px-4">Buat Pesanan</button>
    </div>

</div>

@endsection
