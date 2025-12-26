@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('asset/css/katalog.css') }}">

    <div class="content container">

        <h4 class="section-title">PRODUK</h4>

        <!-- SEARCH -->
        <!-- SEARCH -->
        <form action="{{ route('produk.index') }}" method="GET" class="search-wrapper">
            <input type="text" name="search" class="form-control search-input" placeholder="Search produk..."
                value="{{ request('search') }}">
            <button type="submit" class="search-icon">
                <i class="bi bi-search"></i>
            </button>
        </form>


        <!-- CATEGORY -->
        <div class="category-buttons">
            @php
                $categories = [
                    'jersey' => 'Produksi Jersey',
                    'logam' => 'Produksi Logam',
                    'konveksi' => 'Produksi Konveksi',
                    'printing' => 'Produksi Printing',
                    'bordir' => 'Produksi Bordir',
                ];
            @endphp

            @foreach ($categories as $key => $label)
                <a href="{{ route('produk.index', ['kategori' => $key]) }}"
                    class="btn category {{ $kategoriAktif == $key ? 'active' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <!-- PRODUCT GRID -->
        <section class="best-seller-section">
            <div class="best-seller-grid">

                @forelse ($products as $product)
                    <a href="{{ route('produk.show', $product->id_produk) }}" class="product-link">
                        <div class="seller-card">

                            <img
                                src="{{ $product->foto ? asset('asset/img/' . $product->foto) : asset('asset/img/no-image.png') }}"
                                alt="{{ $product->nama_produk }}">


                                <p class="category">{{ ucfirst($product->kategori) }}</p>

                                <h4 class="product-name">{{ $product->nama_produk }}</h4>

                                <p class="price">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </p>

                        </div>
                    </a>
                @empty
                    <p class="text-center">Produk belum tersedia</p>
                @endforelse

            </div>
        </section>
    </div>
@endsection
