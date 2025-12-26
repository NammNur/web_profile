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
        $search = $request->get('search'); // 🔍 AMBIL KEYWORD SEARCH

        $query = Produk::query();

        // FILTER KATEGORI
        if ($kategoriAktif) {
            $query->where('kategori', 'LIKE', '%' . $kategoriAktif . '%');
        }

        // 🔍 SEARCH PRODUK (NAMA & DESKRIPSI)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'LIKE', '%' . $search . '%')
                    ->orWhere('deskripsi', 'LIKE', '%' . $search . '%');
            });
        }

        // URUTAN KATEGORI (TETAP)
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

    // DASHBOARD PRODUK ADMIN
    public function indexAdmin()
    {
        $products = Produk::orderBy('created_at', 'desc')->get();
        return view('admin.products', compact('products'));
    }

    // KELOLA PRODUK PER KATEGORI
    public function manage($type)
    {
        // Validasi kategori yang boleh
        $allowed = ['jersey', 'konveksi', 'bordir', 'printing', 'logam'];

        if (!in_array($type, $allowed)) {
            abort(404);
        }

        // AMBIL SEMUA YANG MENGANDUNG KATA KUNCI
        // => jersey & produksi jersey
        $produk = Produk::where('kategori', 'LIKE', '%' . $type . '%')->get();

        switch ($type) {
            case 'jersey':
                return view('admin.manage-product', compact('produk'));

            case 'konveksi':
                return view('admin.manage-productKonveksi', compact('produk'));

            case 'bordir':
                return view('admin.manage-productBordir', compact('produk'));

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

        // 🔥 PAKSA FORMAT KATEGORI KONSISTEN
        // jersey => produksi jersey
        if (!str_contains($data['kategori'], 'produksi')) {
            $data['kategori'] = 'produksi ' . strtolower($data['kategori']);
        }

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
