@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('asset/css/contact.css') }}">

<div class="container py-4">

    <!-- TITLE -->
    <h6 class="location-title text-center">LOKASI</h6>

    <!-- LOGO -->
    <div class="text-center">
        <img src="https://via.placeholder.com/120" class="logo-img" alt="Company Logo">
    </div>

    <div class="location-section">

        <p class="address-text">
            CV SKL Andi Jaya memiliki 1 kantor pusat, 1 toko penjualan dan 5 rumah produksi yang berlokasi di tempat yang berbeda, diantaranya:
        </p>

        <!-- SECTION 1 -->
        <p class="address-text">
            Kantor Pusat, toko penjualan atribut dan Rumah Produksi Airbrut & logam beralamat di Dusun 3 Rt 13/03 Desa Sindang Kecamatan Lebakwangi, Kabupaten Kuningan.
        </p>

        <div class="map-wrapper">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 1">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 1">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 1">
        </div>

        <!-- SECTION 2 -->
        <p class="address-text">
            Rumah Produksi Percetakan dan Rumah Produksi Jersey beralamat di Perkotaan Perumahan Graha Mutiara, Desa Sadaraja, Kecamatan Ciwaru, Kabupaten Kuningan.
        </p>

        <div class="map-wrapper">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 2">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 2">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 2">
        </div>

        <!-- SECTION 3 -->
        <p class="address-text">
            Rumah Produksi Konveksi 1 beralamat di Jalan Raya Desa Pasayangan, Desa Pasayangan, Kecamatan Lebakwangi, Kabupaten Kuningan.
        </p>

        <div class="map-wrapper">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 3">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 3">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 3">
        </div>

        <!-- SECTION 4 -->
        <p class="address-text">
            Rumah Produksi Konveksi 2 (Bordir dan Sablon) beralamat di Jalan Raya Desa Bendungan, Desa Bendungan, Kecamatan Lebakwangi, Kabupaten Kuningan.
        </p>

        <div class="map-wrapper">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 4">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 4">
            <img src="https://via.placeholder.com/100" class="map-img" alt="Lokasi 4">
        </div>

    </div>
</div>

@endsection
