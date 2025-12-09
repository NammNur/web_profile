 @include('layouts.header')

    <!-- HERO -->
    <section class="hero">
        <div class="hero-inner">

            <div class="hero-text">
                <h3>Welcome to SKL Andi Jaya</h3>
                <p>Elevate Your Professional Image.<br>
                    Precision Solutions<br>
                    For Uniforms,<br>
                    Embroidery, and<br>
                    Official Attributes</p>

                <a href="{{ route('katalog') }}" class="shop-btn">Shop Now</a>
            </div>

            <div class="hero-logo">
                <!-- logo (placeholder SVG) -->
                <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" onerror="this.style.display='none'">
            </div>

        </div>
    </section>

    <!-- PRODUCTS TITLE -->
    <h2 class="product-title">OUR PRODUCTS</h2>

    <!-- PRODUCTS SECTION -->
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
            <img src="{{ asset('asset/img/bintang.png') }}" class="star-img" alt="stars">
        </div>

    </section>

    <section class="best-seller-section">
        <div class="best-seller-title">Best Seller</div>
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


    {{-- location --}}
    <section class="location-section">
        <div class="location-container">

            <!-- Kolom Kiri -->
            <div class="location-info">
                <h2>---------- LOKASI</h2>

                <p class="address">
                    Jl. Ki Gedeng Luragung, Sindang,<br>
                    Kec. Lebakwangi, Kabupaten<br>
                    Kuningan, Jawa Barat 45574
                </p>

                <a href="#" class="about-btn">Tentang Perusahaann</a>
            </div>

            <!-- Kolom Kanan (Maps) -->
            <div class="location-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.752781169177!2d108.500000!3d-7.033333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMDInMDAuMCJTIDEwOMKwMzAnMDAuMCJF!5e0!3m2!1sid!2sid!4v1700000000000"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>

        </div>
    </section>

@include('layouts.footer')
