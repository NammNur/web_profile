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
        // DEFAULT KATEGORI
        $kategoriAktif = $request->get('kategori', 'jersey');

        $query = Produk::query();

        // FILTER KATEGORI
        if ($kategoriAktif) {
            $query->where('kategori', 'LIKE', '%' . $kategoriAktif . '%');
        }

        // URUTAN KATEGORI
        $query->orderByRaw("
            CASE
                WHEN kategori LIKE '%jersey%' THEN 1
                WHEN kategori LIKE '%logam%' THEN 2
                WHEN kategori LIKE '%konveksi%' THEN 3
                WHEN kategori LIKE '%printing%' THEN 4
                WHEN kategori LIKE '%bordir%' THEN 5
                ELSE 6
            END
        ");

        $products = $query->get();

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

        // UPLOAD FOTO KE public/asset/img
        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('asset/img'), $filename);
            $data['foto'] = $filename;
        }

        Produk::create($data);

        return redirect()
            ->route('admin.products')
            ->with('success', 'Produk berhasil diupload');
    }
    /**
     * ===============================
     * ADMIN (LIST PRODUK)
     * ===============================
     */
    public function indexAdmin()
    {
        $products = Produk::orderBy('created_at', 'desc')->get();
        return view('admin.products', compact('products'));
    }
    
}
