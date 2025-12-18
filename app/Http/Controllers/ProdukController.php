<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * ===============================
     * FRONTEND (USER)
     * ===============================
     */

    public function index(Request $request)
    {
        $kategoriAktif = $request->get('kategori');

        $products = Produk::when($kategoriAktif, function ($query) use ($kategoriAktif) {
            $query->where('kategori', $kategoriAktif);
        })->get();

        return view('produk.index', compact('products', 'kategoriAktif'));
    }

    public function show($id)
    {
        $product = Produk::where('id_produk', $id)->firstOrFail();
        return view('produk.detail', compact('product'));
    }

    /**
     * ===============================
     * ADMIN (UPLOAD PRODUK)
     * ===============================
     */

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // upload foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()
            ->route('admin.products')
            ->with('success', 'Produk berhasil diupload');
    }
}
