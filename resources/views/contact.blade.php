@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('asset/css/contact.css') }}">

<div class="container py-5">

    <!-- TITLE -->
    <h6 class="text-center mb-4" style="letter-spacing: 2px; font-size: 14px;">LOKASI</h6>

    <!-- LOGO + TEXT -->
    <div class="d-flex justify-content-center align-items-center mb-5">
        <img src="{{ asset('asset/img/logo.png') }}" 
             alt="Logo" 
             style="width:130px; margin-right:20px;">
        
        <div>
            <h2 class="mb-0" style="font-weight:900;">CV SKL<br>ANDI JAYA</h2>
            <p style="margin-top:5px; font-size:14px;">
                Kantor Pusat, Toko<br>Penjualan & Rumah Produksi
            </p>
        </div>
    </div>

    <!-- CONTENT WRAPPER -->
    <div style="max-width: 950px; margin:auto;">

        <p class="address-text">
            CV SKL Andi Jaya memiliki 1 kantor pusat, 1 toko penjualan dan 5 rumah produksi 
            yang berlokasi tempat yang berbeda, diantaranya:
        </p>

        <!-- 1 -->
        <p class="address-text">
            Kantor Pusat, toko penjualan atribut dan Rumah Produksi Atribut & logam beralamat di 
            Dusun 3 Rt 13/03 Desa Sindang Kecamatan Lebakwangi, Kabupaten Kuningan.
        </p>

        <div class="map-wrapper">
            <img src="{{ asset('asset/img/map.png') }}" class="map-img">
            <img src="{{ asset('asset/img/map.png') }}" class="map-img">
            <img src="{{ asset('asset/img/map.png') }}" class="map-img">
        </div>

        <!-- ---------- Tambahkan lokasi berikut dengan pola yang sama ----------- -->

    </div>

</div>

@endsection
