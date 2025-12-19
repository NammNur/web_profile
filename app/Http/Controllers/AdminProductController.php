<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminProductController extends Controller
{
    // Tampilkan semua produk
    public function index()
    {
        $products = Produk::all();

        // ALIAS TAMBAHAN (TIDAK MENGHAPUS APA PUN)
        $produk = $products;

        return view('admin.manage-product', compact('products', 'produk'));
    }

    // Tampilkan produk berdasarkan kategori (untuk route /products/manage/{type})
    public function indexByType($type)
    {
        $products = Produk::where('kategori', $type)->get();

        // ALIAS TAMBAHAN (TIDAK MENGHAPUS APA PUN)
        $produk = $products;

        return view('admin.manage-product', compact('products', 'produk', 'type'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string|max:1000',
            'harga_jual' => 'required|integer',
            'stok_saat_ini' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('asset/img'), $filename);
            $data['foto'] = $filename;
        }

        Produk::create($data);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    // Update produk dari form tabel (updateAll)
    public function updateAll(Request $request)
    {
        $update_id = $request->input('update_id');

        if ($update_id) {
            $product = Produk::find($update_id);
            if ($product) {
                $product->nama_produk   = $request->input("nama_produk.$update_id");
                $product->kategori      = $request->input("kategori.$update_id");
                $product->harga         = $request->input("harga.$update_id");
                $product->stok          = $request->input("stok.$update_id");
                $product->deskripsi     = $request->input("deskripsi.$update_id");
                $product->satuan        = $request->input("satuan.$update_id");
                $product->harga_jual    = $request->input("harga_jual.$update_id");
                $product->stok_saat_ini = $request->input("stok_saat_ini.$update_id");
                $product->save();

                return redirect()->back()->with('success', 'Produk berhasil diupdate!');
            }
        }

        return redirect()->back()->with('error', 'Produk gagal diupdate!');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Produk::find($id);
        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan!');
    }
}
