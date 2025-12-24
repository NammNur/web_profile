@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/payment.css') }}">

<div class="container py-5">
    <h3 class="page-title">Pembayaran</h3>

    <!-- CARD PRODUK -->
    <div class="payment-product-card">
        <div class="product-image">
            <img src="{{ asset('asset/img/' . ($order->produk->foto ?? 'no-image.png')) }}">
        </div>

        <div class="product-info">
            <span class="badge">
                {{ strtoupper($order->produk->kategori ?? 'PRODUK') }}
            </span>

            <h4 class="product-name">
                {{ $order->produk->nama_produk ?? $order->nama_produk }}
            </h4>

            <p class="product-price">
                Rp {{ number_format($order->total_price,0,',','.') }}
            </p>
        </div>
    </div>

    <!-- FORM -->
    <div class="card payment-form mt-4">
        <h5>Detail Pembayaran</h5>

        <div class="detail-row"><span>Nama</span><strong>{{ $order->user->nama }}</strong></div>
        <div class="detail-row"><span>No WA</span><strong>{{ $order->no_wa }}</strong></div>
        <div class="detail-row"><span>Jumlah</span><strong>{{ $order->quantity }}</strong></div>

        <hr>

        <form method="POST"
              action="{{ route('pembayaran.store', $order->id) }}"
              enctype="multipart/form-data">
            @csrf

            <label>Metode Pembayaran</label>
            <select name="metode" id="metodePembayaran" class="form-control mb-3" required>
                <option value="">-- Pilih Metode --</option>
                <option value="transfer">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
                <option value="cod">COD</option>
            </select>

            <!-- TRANSFER -->
            <div id="transferBox" class="payment-method d-none">
                <div class="rekening-box">
                    <b>Transfer Bank</b><br>
                    BCA : <b>1234567890</b><br>
                    A/N SKL Andi Jaya
                </div>
                <input type="file" name="bukti_transfer" class="form-control">
            </div>

            <!-- EWALLET -->
            <div id="ewalletBox" class="payment-method d-none">
                <div class="rekening-box">
                    <b>E-Wallet</b><br>
                    Dana / OVO / GoPay<br>
                    No : <b>0838-2933-5748</b><br>
                    A/N SKL Andi Jaya
                </div>
                <input type="file" name="bukti_ewallet" class="form-control">
            </div>

            <!-- COD -->
            <div id="codBox" class="cod-info d-none">
                Pembayaran dilakukan saat barang diterima
            </div>

            <div class="total-box">
                <span>Total</span>
                <strong>Rp {{ number_format($order->total_price,0,',','.') }}</strong>
            </div>

            <button class="btn-primary">Konfirmasi Pembayaran</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const metode = document.getElementById('metodePembayaran');
    const transferBox = document.getElementById('transferBox');
    const ewalletBox = document.getElementById('ewalletBox');
    const codBox = document.getElementById('codBox');

    metode.addEventListener('change', function () {
        [transferBox, ewalletBox, codBox].forEach(el => el.classList.add('d-none'));

        if (this.value === 'transfer') transferBox.classList.remove('d-none');
        if (this.value === 'ewallet') ewalletBox.classList.remove('d-none');
        if (this.value === 'cod') codBox.classList.remove('d-none');
    });
});
</script>
@endsection
