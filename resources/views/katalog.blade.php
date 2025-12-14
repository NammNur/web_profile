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
                <img src="{{ asset('asset/img/jersey.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Jersey Futsal TNI</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/jersey swoba.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Jersey Futsal Swoba</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/jersey 2.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Jersey Basket</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/jersey Bola.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Jersey Sepak Bola</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/jersey Futsal.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Jersey Futsal Andi Jaya</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/jersey Indo.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Indo Mix Argentina</h4>
            </div>

            <div class="seller-card">
                <img src="{{ asset('asset/img/jersey bola2.png') }}" alt="">
                <p class="category">Product Jersey</p>
                <h4 class="product-name">Jersey Sepak Bola</h4>
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
