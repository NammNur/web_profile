@extends('layouts.app')

@section('content')

{{-- RESET KHUSUS HALAMAN ABOUT --}}
<style>
    body {
        margin: 0;
        padding: 0;
    }

    main, .content, .container, .container-fluid {
        margin: 0 !important;
        padding: 0 !important;
    }

    .about-hero {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }
</style>

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
            dengan kualitas premium, tenaga ahli profesional, dan proses produksi yang cepat
            serta presisi.
        </p>

    </div>
</section>

<!-- PROFIL PERUSAHAAN DETAIL -->
<section class="profile-detailed">
    <div class="profile-container">

        <h2 class="headline-main">Elevate Your Professional Image.</h2>
        <h3 class="headline-sub">
            Precision Solutions For Uniforms, Embroidery, and Official Attributes
        </h3>

        <p class="profile-text">
            CV SKL Andi Jaya merupakan suatu perusahaan yang bergerak di bidang produksi dan
            penyedia jasa. Adapun jenis produksi dan jasa ditawarkan adalah beragam jenis produk
            jersey, bordir, konveksi, percetakan, atribut TNI/POLRI, PNS dan Satpam.
            <br><br>
            CV SKL Andi Jaya terlahir sebagai UD Andi Jaya yang didirikan pada 24 Maret 2014 di
            Dusun 3 Rt 13/03 Desa Sindang Kecamatan Lebakwangi, Kabupaten Kuningan oleh
            Bapak Andi Darsim selaku pemilik perusahaan.
            <br><br>
            Berdasarkan SK Bupati Kuningan, Nomor 503/KPTS.297-IG/2014, perusahaan perseorangan
            ini bergerak dalam bidang jasa penjualan atribut TNI/POLRI dan reklame. Kemudian
            pada 25 Oktober 2017, CV SKL Andi Jaya terbentuk melalui akta notaris nomor 157 lalu
            mendapatkan surat izin usaha perdagangan (SIUP) Kecil pada 28 November 2017
            berdasarkan nomor 510/KPTS.385-SIUP/XI/2017.
        </p>

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
        <img src="{{ asset('asset/img/struktur.png') }}" class="structure-img">
    </div>
</section>

<!-- NILAI NILAI -->
<section class="about-section nilai-section">
    <h2 class="section-title">Nilai Nilai Perusahaan</h2>

    <div class="nilai-layout">

        <div class="nilai-left">
            <h3 class="nilai-title">Kompetitif</h3>
            <p class="nilai-text">
                Kemampuan perusahaan untuk bersaing dan bertahan di pasar melalui keunggulan.
            </p>
        </div>

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

        <div class="nilai-right">
            <div class="nilai-right-item">
                <h3 class="nilai-title">Sinergis</h3>
                <p class="nilai-text">
                    Kolaborasi yang menghasilkan nilai lebih besar daripada usaha individu.
                </p>
            </div>

            <div class="nilai-right-item">
                <h3 class="nilai-title">Loyal</h3>
                <p class="nilai-text">
                    Sikap kesetiaan karyawan yang berkontribusi positif terhadap perusahaan.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- PRODUK PERUSAHAAN -->
<section class="about-section">
    <h2 class="section-title">Produk Perusahaan</h2>

    @php
        $produk = [
            ['PRODUKSI JERSEY', ['Jersey Sepak Bola','Jersey Futsal','Jersey Volly','Jersey Badminton','Jersey Sepeda','Kaos','Jumper','Printing Lembur','Sablon']],
            ['PRODUKSI LOGAM', ['Anting TNI, Polri, PNS dan Satpam','Pin Maritim','Pin TNI POLRI','Pin PNS, POS, POL PP, PDH Satpam','Brevet TNI, PNS Polri']],
            ['PRODUKSI KONVEKSI', ['Jaket','Kemeja','Seragam Kaos Polo','Kaos Muslim','Toga']],
            ['PRODUKSI PRINTING', ['X-Banner','Sticker A3','One Way','Roll Banner','Nota','Striker A5','Kartu Nama','Map','Plakat Akrilik','Gantungan Kunci']],
            ['PRODUKSI BORDIR', ['Bordir Nama','Bordir Logo','Bordir Badge','Bordir Pangkat']],
        ];
    @endphp

    @foreach($produk as $item)
        <div class="product-card">
            <h3 class="product-title">{{ $item[0] }}</h3>
            <ul>
                @foreach($item[1] as $list)
                    <li>{{ $list }}</li>
                @endforeach
            </ul>
            <button class="card-btn">Katalog</button>
        </div>
    @endforeach

</section>

@include('layouts.footer')
@endsection
