<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'deskripsi',
        'foto',
    ];

    public function orders()
    {
        return $this->hasMany(
            Order::class,
            'produk_id',   // FK di tabel orders
            'id_produk'    // PK di tabel produk
        );
    }
}
