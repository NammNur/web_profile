@include('layouts.header')

<!-- HERO SECTION -->
<section class="about-hero">
    <div class="about-hero-inner">

        <h1 class="about-title">Profil Perusahaan</h1>

        <div class="logo-wrapper">
            <img src="{{ asset('asset/img/logo.png') }}" class="about-logo" alt="Logo">
        </div>

        <p class="about-description">
            SKL Andi Jaya adalah perusahaan yang bergerak di bidang produksi jersey,
            konveksi, printing, dan bordir. Kami berkomitmen menghadirkan layanan terbaik
            dengan kualitas premium, tenaga ahli profesional, dan proses produksi yang cepat serta presisi.
        </p>

    </div>
</section>

<!-- PROFIL PERUSAHAAN DETAIL -->
<section class="profile-detailed">

    <div class="profile-container">

        <h2 class="headline-main">Elevate Your Professional Image.</h2>
        <h3 class="headline-sub">Precision Solutions For Uniforms, Embroidery, and Official Attributes</h3>

        <p class="profile-text">
            CV SKL Andi Jaya merupakan suatu perusahaan yang bergerak di bidang produksi dan penyedia jasa.
            Adapun jenis produksi dan jasa ditawarkan adalah beragam jenis produk jersey, bordir, konveksi,
            percetakan, atribut TNI/POLRI, PNS dan Satpam.
            <br><br>
            CV SKL Andi Jaya terlahir sebagai UD Andi Jaya yang didirikan pada 24 Maret 2014 di Dusun 3
            Rt 13/03 Desa Sindang Kecamatan Lebakwangi, Kabupaten Kuningan oleh Bapak Andi Darsim selaku
            pemilik perusahaan.
            <br><br>
            Berdasarkan SK Bupati Kuningan, Nomor 503/KPTS.297-IG/2014, perusahaan perseorangan ini bergerak
            dalam bidang jasa penjualan atribut TNI/POLRI dan reklame. Kemudian pada 25 Oktober 2017,
            CV SKL Andi Jaya terbentuk melalui akta notaris nomor 157 lalu mendapatkan surat izin usaha
            perdagangan (SIUP) Kecil pada 28 November 2017 berdasarkan nomor 510/KPTS.385-SIUP/XI/2017.
        </p>

        <!-- Dekorasi bulat warna (optional) -->
        <div class="circle-stack">
            <span class="circle c-green"></span>
            <span class="circle c-yellow"></span>
            <span class="circle c-red"></span>
        </div>
    </div>
</section>

<!-- VISI MISI -->
<section class="about-section">
    <h2 class="section-title">Visi & Misi</h2>

    <div class="card">
        <h3>Visi</h3>
        <p>
            Menjadi perusahaan produksi apparel dan percetakan terbaik di Indonesia
            dengan mengedepankan kualitas, inovasi, dan kepuasan pelanggan.
        </p>
    </div>

    <div class="card">
        <h3>Misi</h3>
        <ul>
            <li>Menghasilkan produk berkualitas tinggi dan presisi.</li>
            <li>Mengutamakan pelayanan cepat, ramah, dan profesional.</li>
            <li>Mengembangkan teknologi modern dalam proses produksi.</li>
            <li>Memberikan harga terbaik tanpa mengurangi kualitas.</li>
        </ul>
    </div>
</section>

<!-- STRUKTUR ORGANISASI -->
<section class="about-section">
    <h2 class="section-title">Struktur Organisasi</h2>

    <div class="image-center">
        <img src="{{ asset('asset/img/struktur.png') }}" class="structure-img" alt="Struktur Organisasi">
    </div>
</section>

<!-- NILAI NILAI PERUSAHAAN (SUDAH DISEJAJARKAN) -->
<section class="about-section nilai-section">
    <h2 class="section-title">Nilai Nilai Perusahaan</h2>

    <div class="nilai-layout">

        <!-- KIRI -->
        <div class="nilai-left">
            <h3 class="nilai-title">Kompetitif</h3>
            <p class="nilai-text">Kemampuan perusahaan untuk bersaing dan bertahan di pasar melalui keunggulan.</p>
        </div>

        <!-- TENGAH CIRCLE -->
        <div class="nilai-center">

            <div class="nilai-item">
                <div class="nilai-circle circle-1">
                    <img src="{{ asset('asset/img/note.png') }}" class="nilai-icon">
                </div>
            </div>

            <div class="nilai-item">
                <div class="nilai-circle circle-2">
                    <img src="{{ asset('asset/img/ladder.png') }}" class="nilai-icon">
                </div>
            </div>

            <div class="nilai-item">
                <div class="nilai-circle circle-3">
                    <img src="{{ asset('asset/img/loyal.png') }}" class="nilai-icon">
                </div>
            </div>

        </div>

        <!-- KANAN -->
        <div class="nilai-right">

            <div class="nilai-right-item">
                <h3 class="nilai-title">Sinergis</h3>
                <p class="nilai-text">Kolaborasi yang menghasilkan nilai lebih besar daripada usaha individu.</p>
            </div>

            <div class="nilai-right-item">
                <h3 class="nilai-title">Loyal</h3>
                <p class="nilai-text">Sikap kesetiaan karyawan yang berkontribusi positif terhadap perusahaan.</p>
            </div>

        </div>

    </div>
</section>

<!-- PRODUK PERUSAHAAN -->
<section class="about-section">
    <h2 class="section-title">Produk Perusahaan</h2>

    <!-- PRODUK JERSEY -->
    <div class="product-card kiri">
        <h3 class="product-title">PRODUKSI JERSEY</h3>
        <ul>
            <li>Jersey Sepak Bola</li>
            <li>Jersey Futsal</li>
            <li>Jersey Volly</li>
            <li>Jersey Badminton</li>
            <li>Jersey Sepeda</li>
            <li>Kaos</li>
            <li>Jumper</li>
            <li>Printing Lembur</li>
            <li>Sablon</li>
        </ul>
        <button class="card-btn">Katalog</button>
    </div>

    <!-- PRODUKSI LOGAM -->
    <div class="product-card">
        <h3 class="product-title">PRODUKSI LOGAM</h3>
        <ul>
            <li>Anting TNI, Polri, PNS dan Satpam</li>
            <li>Pin Maritim</li>
            <li>Pin TNI POLRI</li>
            <li>Pin PNS, POS, POL PP, PDH Satpam</li>
            <li>Brevet TNI, PNS Polri</li>
        </ul>
        <button class="card-btn">Katalog</button>
    </div>

    <!-- PRODUKSI KONVEKSI -->
    <div class="product-card">
        <h3 class="product-title">PRODUKSI KONVEKSI</h3>
        <ul>
            <li>Jaket</li>
            <li>Kemeja</li>
            <li>Seragam Kaos Polo</li>
            <li>Kaos Muslim</li>
            <li>Toga</li>
        </ul>
        <button class="card-btn">Katalog</button>
    </div>

    <!-- PRODUKSI PRINTING -->
    <div class="product-card">
        <h3 class="product-title">PRODUKSI PRINTING</h3>
        <ul>
            <li>X-Banner</li>
            <li>Sticker A3</li>
            <li>One Way</li>
            <li>Roll Banner</li>
            <li>Nota</li>
            <li>Striker A5</li>
            <li>Kartu Nama</li>
            <li>Map</li>
            <li>Plakat Akrilik</li>
            <li>Gantungan Kunci</li>
        </ul>
        <button class="card-btn">Katalog</button>
    </div>

    <!-- PRODUKSI BORDIR -->
    <div class="product-card">
        <h3 class="product-title">PRODUKSI BORDIR</h3>
        <ul>
            <li>Bordir Nama</li>
            <li>Bordir Logo</li>
            <li>Bordir Badge</li>
            <li>Bordir Pangkat</li>
        </ul>
        <button class="card-btn">Katalog</button>
    </div>

</section>

@include('layouts.footer')
