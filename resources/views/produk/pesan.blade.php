@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('asset/css/orders-form.css') }}">

    <div class="container py-5">

        <h3 class="page-title">Buat Pesanan</h3>

        <div class="row g-4 align-items-start order-wrapper">

            <!-- PRODUK -->
            <div class="col-md-5">
                <div class="product-card">

                    <img src="{{ $product->foto ? asset('asset/img/' . $product->foto) : asset('asset/img/no-image.png') }}"
                        alt="{{ $product->nama_produk }}">

                    <div class="product-info">

                        <span class="product-category">
                            {{ strtoupper($product->kategori) }}
                        </span>

                        <h5 class="product-title">
                            {{ $product->nama_produk }}
                        </h5>

                        <p class="product-price">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </p>

                        <p class="product-stock">
                            Status:
                            <span class="{{ $product->stok > 0 ? 'available' : 'empty' }}">
                                {{ $product->stok > 0 ? 'Tersedia' : 'Habis' }}
                            </span>
                        </p>

                    </div>
                </div>
            </div>

            <!-- FORM -->
            <div class="col-md-7">
                <div class="form-card">

                    <h5 class="form-title">Form Pemesanan</h5>

                    <form action="{{ route('produk.pesan.store', $product->id_produk) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Pemesan</label>

                            <input type="text" class="form-control" value="{{ auth()->user()->nama }}" readonly
                                style="background:#f9fafb">

                            <input type="hidden" name="nama_pemesan" value="{{ auth()->user()->nama }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No WhatsApp</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->telepon }}" readonly
                                style="background:#f9fafb">
                            <input type="hidden" name="no_wa" value="{{ auth()->user()->telepon }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="3" required></textarea>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Jumlah Pesanan</label>
                            <input type="number" name="quantity" id="jumlah" class="form-control" min="1"
                                max="{{ $product->stok }}" value="1" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Catatan (Opsional)</label>
                            <textarea name="catatan" class="form-control" rows="3"></textarea>
                        </div>

                        <hr>

                        <div class="total-box">
                            <span>Total Harga</span>
                            <span id="totalHarga">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="action-btn">
                            <button type="submit" class="btn-order">
                                🛒 Pesan Sekarang
                            </button>

                            <a href="{{ route('produk.show', $product->id_produk) }}" class="btn-back">
                                ← Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    {{-- SCRIPT TOTAL HARGA --}}
    <script>
        const harga = {{ $product->harga }};
        const jumlahInput = document.getElementById('jumlah');
        const totalHarga = document.getElementById('totalHarga');

        jumlahInput.addEventListener('input', function() {
            let total = harga * this.value;
            totalHarga.innerText = 'Rp ' + total.toLocaleString('id-ID');
        });
    </script>
@endsection
