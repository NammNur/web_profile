@extends('layouts.app')

@section('content')
    {{-- RESET KHUSUS HALAMAN HOME --}}
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        main,
        .content,
        .container-fluid {
            padding: 0 !important;
            margin: 0 !important;
        }

        .hero {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
    </style>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-inner">

            <div class="hero-text">
                <h3>Welcome to SKL Andi Jaya</h3>
                <p>
                    Elevate Your Professional Image.<br>
                    Precision Solutions<br>
                    For Uniforms,<br>
                    Embroidery, and<br>
                    Official Attributes
                </p>

                <a href="{{ route('produk.index') }}" class="shop-btn">Shop Now</a>
            </div>

            <div class="hero-logo">
                <img src="{{ asset('asset/img/logo.png') }}" alt="Logo">
            </div>

        </div>
    </section>

    <!-- PRODUCTS TITLE -->
    <h2 class="product-title">OUR PRODUCTS</h2>

    <!-- PRODUCTS -->
    <section class="products">

        <div class="product-card">
            <div class="product-left">
                <h4>Produksi Jersey</h4>
                <button>Lainnya</button>
            </div>
            <img src="{{ asset('asset/img/jersey.png') }}" class="product-img">
        </div>

        <div class="product-card">
            <div class="product-left">
                <h4>Produksi Logam</h4>
                <button>Lainnya</button>
            </div>
            <img src="{{ asset('asset/img/logam.png') }}" class="product-img">
        </div>

        <div class="product-card">
            <div class="product-left">
                <h4>Produksi Konveksi</h4>
                <button>Lainnya</button>
            </div>
            <img src="{{ asset('asset/img/jaket.png') }}" class="product-img">
        </div>

        <div class="product-card">
            <div class="product-left">
                <h4>Produksi Printing</h4>
                <button>Lainnya</button>
            </div>
            <img src="{{ asset('asset/img/printing.png') }}" class="product-img">
        </div>

        <div class="product-card single">
            <div class="product-left">
                <h4>Produksi Bordir</h4>
                <button>Lainnya</button>
            </div>
            <img src="{{ asset('asset/img/bordir.png') }}" class="product-img">
        </div>

        <div class="star-decor">
            <img src="{{ asset('asset/img/bintang.png') }}" class="star-img">
        </div>

    </section>

    <!-- BEST SELLER -->
    <section class="best-seller-section">
        <div class="best-seller-title">Best Seller</div>

        <div class="best-seller-grid">

            @php
                $bestSeller = [
                    ['jersey 1.png', 'Product Jersey', 'Jersey Bola'],
                    ['PDH.png', 'Product Konveksi', 'Seragam PDH'],
                    ['T-shirt.png', 'Product Konveksi', 'T-Shirt Printing'],
                    ['jersey 2.png', 'Product Jersey', 'Jersey Basket'],
                    ['stiker.png', 'Product Printing', 'Stiker A3'],
                    ['printing.png', 'Product Printing', 'Kartu Nama'],
                    ['jaket.png', 'Product Konveksi', 'Jaket'],
                    ['banner.png', 'Product Printing', 'Banner'],
                ];
            @endphp

            @foreach ($bestSeller as $item)
                <div class="seller-card">
                    <img src="{{ asset('asset/img/' . $item[0]) }}">
                    <p class="category">{{ $item[1] }}</p>
                    <h4 class="product-name">{{ $item[2] }}</h4>
                </div>
            @endforeach

        </div>

        <div class="more-container">
            <button class="btn-more">Lainnya</button>
        </div>
    </section>

    <!-- LOCATION -->
    <section class="location-section">
        <div class="location-container">

            <div class="location-info">
                <h2>— LOKASI</h2>
                <p class="address">
                    Jl. Ki Gedeng Luragung, Sindang,<br>
                    Kec. Lebakwangi, Kabupaten<br>
                    Kuningan, Jawa Barat 45574
                </p>

                <a href="#" class="about-btn">Tentang Perusahaan</a>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.518684382646!2d108.58210397591372!3d-7.001424494983134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f12456a96120b%3A0x17d1837bb9c525ea!2sCV.%20SKL%20ANDI%20JAYA!5e0!3m2!1sid!2sid!4v1733820000000" width="100%" height="100%"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>


        </div>
    </section>

    @include('layouts.footer')
@endsection
