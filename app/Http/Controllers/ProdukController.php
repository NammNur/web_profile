<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        // kategori aktif (default)
        $kategoriAktif = $request->get('kategori', 'Produksi Jersey');

        // ambil produk dari database berdasarkan kategori
        $products = Produk::where('kategori', $kategoriAktif)->get();

        return view('produk.index', compact(
            'products',
            'kategoriAktif'
        ));
    }

    public function show($id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();
        return view('produk.detail', compact('product'));
    }
}
