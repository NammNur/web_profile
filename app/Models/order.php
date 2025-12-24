<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    // ❌ JANGAN pakai primaryKey custom
    // Laravel otomatis pakai `id`

   protected $fillable = [
    'user_id',
    'produk_id',
    'nama_produk',
    'quantity',
    'total_price',
    'no_wa',
    'alamat',
    'catatan',
    'status',
    'metode_pembayaran',
    'resi', // ✅ TAMBAHKAN
];

    // RELASI KE PRODUK
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id_produk');
    }

    // RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
