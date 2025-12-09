@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('asset/css/katalog.css') }}">

<!-- MAIN CONTENT -->
<div class="content container">
    
    <h4 class="section-title">PRODUK</h4>

    <div class="search-wrapper margin-right-20px">
        <input type="text" class="form-control search-input" placeholder="Search">
        <i class="bi bi-search search-icon"></i>
    </div>

    <!-- Category Filter -->
    <div class="category-buttons">
        <button class="btn category active">Produksi Jersey</button>
        <button class="btn category">Produksi Logam</button>
        <button class="btn category">Produksi Konveksi</button>
        <button class="btn category">Produksi Printing</button>
        <button class="btn category">Produksi Bordir</button>
    </div>

    <!-- PRODUCT GRID -->
    <section class="best-seller-section">
        {{-- <div class="best-seller-title">Best Seller</div> --}}
        <div class="best-seller-grid">
            <div class="seller-card">
                <img src="{{ asset('asset/img/jersey 1.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Jersey Bola</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/PDH.png') }}" alt="">
                <p class="category">Product Konveksi</p>
                <h4 class="product-name">Seragam PDH</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/T-shirt.png') }}" alt="">
                <p class="category">Product Konveksi</p>
                <h4 class="product-name">T-Shirt Printing</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/jersey 2.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Jersey Basket</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/stiker.png') }}" alt="">
                <p class="category">Product Printing</p>
                <h4 class="product-name">Stiker A3</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/printing.png') }}" alt="">
                <p class="category">Product Printing</p>
                <h4 class="product-name">Kartu Nama</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/jaket.png') }}" alt="">
                <p class="category">Product Konveksi</p>
                <h4 class="product-name">Jaket</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/banner.png') }}" alt="">
                <p class="category">Product Printing</p>
                <h4 class="product-name">Banner</h4>
            </div>
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
