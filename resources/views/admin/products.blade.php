@extends('layouts.admin')

@section('title', 'Admin Products')

@section('content')
<div class="content">

    <!-- HEADER BAR -->
    <div class="page-header">
        <div class="title-bar">Data Produk</div>

        <a href="{{ route('admin.products.create') }}" class="btn-create">
            + Create Produk
        </a>
    </div>

    <!-- PRODUCT GRID -->
    <div class="product-grid">

        <a href="{{ route('admin.products.manage', ['type' => 'jersey']) }}" class="product-link">
            <div class="product-card">
                <img src="{{ asset('asset/img/jersey.png') }}">
                <p>Produk Jersey</p>
            </div>
        </a>

        <a href="{{ route('admin.products.manage', ['type' => 'printing']) }}" class="product-link">
            <div class="product-card">
                <img src="{{ asset('asset/img/printing.png') }}">
                <p>Produk Printing</p>
            </div>
        </a>

        <a href="{{ route('admin.products.manage', ['type' => 'konveksi']) }}" class="product-link">
            <div class="product-card">
                <img src="{{ asset('asset/img/jaket.png') }}">
                <p>Produk Konveksi</p>
            </div>
        </a>

        <a href="{{ route('admin.products.manage', ['type' => 'bordir']) }}" class="product-link">
            <div class="product-card">
                <img src="{{ asset('asset/img/bordir.png') }}">
                <p>Produk Bordir</p>
            </div>
        </a>

        <a href="{{ route('admin.products.manage', ['type' => 'logam']) }}" class="product-link">
            <div class="product-card">
                <img src="{{ asset('asset/img/logam.png') }}">
                <p>Produk Logam</p>
            </div>
        </a>

    </div>

</div>
@endsection
