@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('asset/css/payment.css') }}">

    <div class="container py-5">

        <h3 class="page-title">Pembayaran</h3>

        <!-- PRODUK -->
        <div class="card payment-product">
            <img src="{{ asset('asset/img/' . $order->produk->foto) }}">

            <div class="info">
                <span class="badge">{{ strtoupper($order->produk->kategori) }}</span>
                <h4>{{ $order->produk->nama_produk }}</h4>
                <p class="price">
                    Rp {{ number_format($order->produk->harga, 0, ',', '.') }}
                </p>

                <small>Status:
                    <strong class="text-warning">
                        Menunggu Pembayaran
                    </strong>
                </small>
            </div>
        </div>

        <!-- FORM PEMBAYARAN -->
        <div class="card payment-form mt-4">

            <h5>Detail Pembayaran</h5>

            <div class="detail-row">
                <span>Nama Pemesan</span>
                <strong>{{ $order->user->nama }}</strong>
            </div>

            <div class="detail-row">
                <span>No WhatsApp</span>
                <strong>{{ $order->no_wa }}</strong>
            </div>

            <div class="detail-row">
                <span>Jumlah</span>
                <strong>{{ $order->quantity }}</strong>
            </div>

            <hr>

            <form method="POST" action="{{ route('pembayaran.store', $order->id) }}" enctype="multipart/form-data">
                @csrf

                <label class="form-label">Metode Pembayaran</label>

                <select name="metode" id="metodePembayaran" class="form-control mb-3" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                    <option value="cod">Bayar di Tempat (COD)</option>
                </select>

                <!-- TRANSFER BANK -->
                <div id="formTransfer" class="payment-method d-none">
                    <label>Bank Tujuan</label>
                    <select name="bank" class="form-control mb-2">
                        <option value="bca">BCA</option>
                        <option value="bri">BRI</option>
                        <option value="mandiri">Mandiri</option>
                    </select>

                    <label>Bukti Transfer</label>
                    <input type="file" name="bukti_transfer" class="form-control mb-3">
                </div>

                <!-- E-WALLET -->
                <div id="formEwallet" class="payment-method d-none">
                    <label>E-Wallet</label>
                    <select name="ewallet" class="form-control mb-2">
                        <option value="dana">DANA</option>
                        <option value="ovo">OVO</option>
                        <option value="gopay">GoPay</option>
                    </select>

                    <label>Bukti Pembayaran</label>
                    <input type="file" name="bukti_ewallet" class="form-control mb-3">
                </div>

                <!-- COD -->
                <div id="formCOD" class="payment-method d-none">
                    <div class="alert alert-info">
                        💡 Pembayaran dilakukan saat barang diterima.
                    </div>
                </div>

                <div class="total-box">
                    <span>Total Bayar</span>
                    <span>
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </span>
                </div>

                <div class="action">
                    <button class="btn-primary">
                        💳 Konfirmasi Pembayaran
                    </button>

                    <a href="{{ route('produk.index') }}" class="btn-outline">
                        ← Kembali ke Katalog
                    </a>
                </div>
            </form>


        </div>
    </div>

    <script>
        document.getElementById('metodePembayaran').addEventListener('change', function() {
            const metode = this.value;

            document.getElementById('formTransfer').classList.add('d-none');
            document.getElementById('formEwallet').classList.add('d-none');
            document.getElementById('formCOD').classList.add('d-none');

            if (metode === 'transfer') {
                document.getElementById('formTransfer').classList.remove('d-none');
            } else if (metode === 'ewallet') {
                document.getElementById('formEwallet').classList.remove('d-none');
            } else if (metode === 'cod') {
                document.getElementById('formCOD').classList.remove('d-none');
            }
        });
    </script>
@endsection
