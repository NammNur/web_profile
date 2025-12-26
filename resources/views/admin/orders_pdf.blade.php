<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 4px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h3 align="center">Data Orders</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $o)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $o->nama_produk }}</td>
            <td>{{ ucfirst($o->produk->kategori ?? '-') }}</td>
            <td>{{ $o->user->nama ?? '-' }}</td>
            <td>{{ $o->quantity }}</td>
            <td>Rp {{ number_format($o->total_price, 0, ',', '.') }}</td>
            <td>{{ ucfirst($o->status) }}</td>
            <td>{{ $o->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
