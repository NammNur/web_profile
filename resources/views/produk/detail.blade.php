@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="row">

            <!-- IMAGE -->
            <div class="col-md-6">
                <img src="{{ $product->foto
    ? asset('asset/img/' . $product->foto)
    : asset('asset/img/no-image.png') }}"
    alt="{{ $product->nama_produk }}">
            </div>

            <!-- INFO -->
            <div class="col-md-6">
                <p class="text-muted">{{ strtoupper($product->kategori) }}</p>

                <h2>{{ $product->nama_produk }}</h2>

                <h4 class="text-success">
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </h4>

                <p>
                    <strong>Stok:</strong>
                    {{ $product->stok > 0 ? 'Tersedia' : 'Habis' }}
                </p>

                <hr>

                <h5>Deskripsi Produk</h5>
                <p>{{ $product->deskripsi ?? '-' }}</p>

                <div class="mt-4">
                    <a href="{{ route('produk.pesan', $product->id_produk) }}" class="btn btn-success">
                        Pesan Sekarang
                    </a>


                    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">
                        Kembali
                    </a>
                </div>
            </div>

        </div>

    </div>
@endsection
