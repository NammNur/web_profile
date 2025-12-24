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
        $kategoriAktif = $request->get('kategori', 'jersey');

        $query = Produk::query();

        if ($kategoriAktif) {
            $query->where('kategori', 'LIKE', '%' . $kategoriAktif . '%');
        }

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
     * ADMIN
     * ===============================
     */

    // HALAMAN GRID PRODUK ADMIN
    public function indexAdmin()
    {
        return view('admin.products');
    }

  public function manage($type)
{
    // Mapping type ke keyword database
    $mapKategori = [
        'jersey'   => 'produksi jersey',
        'konveksi' => 'produksi konveksi',
        'bordir'   => 'produksi bordir',
        'printing' => 'produksi printing',
        'logam'    => 'produksi logam',
    ];

    if (!array_key_exists($type, $mapKategori)) {
        abort(404);
    }

    // Ambil data sesuai kategori database
    $produk = Produk::where('kategori', $mapKategori[$type])->get();

    switch ($type) {
        case 'jersey':
            return view('admin.manage-product', compact('produk'));

        case 'bordir':
            return view('admin.manage-productBordir', compact('produk'));

        case 'konveksi':
            return view('admin.manage-productKonveksi', compact('produk'));

        case 'printing':
            return view('admin.manage-productPrinting', compact('produk'));

        case 'logam':
            return view('admin.manage-productLogam', compact('produk'));
    }
}


    // FORM CREATE PRODUK
    public function create()
    {
        return view('admin.create');
    }

    // SIMPAN PRODUK
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
}
