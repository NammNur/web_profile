@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h3 class="mb-4 fw-bold">Buat Pesanan</h3>

        <div class="row g-4">

            <!-- PRODUK -->
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <img src="{{ $product->foto ? asset('storage/' . $product->foto) : asset('asset/img/no-image.png') }}"
                        class="card-img-top" alt="{{ $product->nama_produk }}">

                    <div class="card-body">
                        <p class="text-muted mb-1">
                            {{ strtoupper($product->kategori) }}
                        </p>

                        <h5 class="fw-bold">{{ $product->nama_produk }}</h5>

                        <p class="text-success fw-semibold fs-5">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </p>

                        <p>
                            <strong>Stok:</strong>
                            <span class="{{ $product->stok > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $product->stok > 0 ? 'Tersedia' : 'Habis' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- FORM PESANAN -->
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="mb-3 fw-semibold">Form Pemesanan</h5>

                        <form action="{{ route('produk.pesan.store', $product->id_produk) }}" method="POST">
                            @csrf

                            <!-- NAMA -->
                            <div class="mb-3">
                                <label class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            </div>

                            <!-- NO WA -->
                            <div class="mb-3">
                                <label class="form-label">No WhatsApp</label>
                                <input type="text" name="no_wa" class="form-control" placeholder="08xxxxxxxxxx"
                                    required>
                            </div>

                            <!-- JUMLAH -->
                            <div class="mb-3">
                                <label class="form-label">Jumlah Pesanan</label>
                                <input type="number" name="quantity" id="jumlah" class="form-control" min="1"
                                    max="{{ $product->stok }}" value="1" required>
                            </div>

                            <!-- CATATAN -->
                            <div class="mb-3">
                                <label class="form-label">Catatan (Opsional)</label>
                                <textarea name="catatan" class="form-control" rows="3" placeholder="Contoh: ukuran, warna, dll"></textarea>
                            </div>

                            <hr>

                            <!-- TOTAL -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">Total Harga</span>
                                <span class="fw-bold fs-5 text-success" id="totalHarga">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </span>
                            </div>

                            <!-- BUTTON -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success w-100">
                                    Pesan Sekarang
                                </button>

                                <a href="{{ route('produk.show', $product->id_produk) }}"
                                    class="btn btn-outline-secondary w-100">
                                    Kembali
                                </a>
                            </div>
                        </form>


                    </div>
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
