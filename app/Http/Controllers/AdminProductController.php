<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;


class AdminProductController extends Controller
{
    /* =========================
     *  TAMPIL SEMUA PRODUK
     * ========================= */
    public function index()
    {
        $products = Produk::all();

        // Alias agar tidak merusak blade lama
        $produk = $products;

        return view('admin.manage-product', compact('products', 'produk'));
    }

    /* =========================
     *  FILTER BY TYPE (DINAMIS)
     * ========================= */
    public function indexByType($type)
    {
        $produk = Produk::where('kategori', 'produksi ' . $type)->get();

        return view('admin.manage-productKonveksi', compact('produk', 'type'));
    }

    public function indexBordir()
    {
        $produk = Produk::where('kategori', 'produksi bordir')->get();
        return view('admin.manage-productBordir', compact('produk'));
    }

    public function indexPrinting()
    {
        $produk = Produk::where('kategori', 'produksi printing')->get();
        return view('admin.manage-productPrinting', compact('produk'));
    }

    public function indexLogam()
    {
        $produk = Produk::where('kategori', 'produksi logam')->get();
        return view('admin.manage-productLogam', compact('produk'));
    }

    /* =========================
     *  SIMPAN PRODUK BARU
     * ========================= */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk'     => 'required|string|max:255',
            'kategori'        => 'required|string|max:255',
            'satuan'          => 'required|string|max:255',
            'harga'           => 'required|integer',
            'stok'            => 'required|integer',
            'deskripsi'       => 'nullable|string|max:1000',
            'harga_jual'      => 'required|integer',
            'stok_saat_ini'   => 'required|integer',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

    /* =========================
     *  EDIT PRODUK (FORM)
     * ========================= */
    public function edit($id)
    {
        $produk = Produk::where('id_produk', $id)->firstOrFail();

        return view('admin.edit-product', compact('produk'));
    }

    /* =========================
     *  UPDATE PRODUK (EDIT)
     * ========================= */
  public function update(Request $request, $id)
{
    $produk = Produk::where('id_produk', $id)->firstOrFail();

    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'kategori'    => 'required|string|max:255',
        'harga'       => 'required|integer',
        'stok'        => 'required|integer',
        'satuan'      => 'nullable|string|max:255',
        'deskripsi'   => 'nullable|string|max:1000',
    ]);

    $produk->update([
        'nama_produk' => $request->nama_produk,
        'kategori'    => $request->kategori,
        'harga'       => $request->harga,
        'stok'        => $request->stok,
        'satuan'      => $request->satuan,
        'deskripsi'   => $request->deskripsi,
    ]);

    // 🔥 AMBIL TYPE DARI KATEGORI
    $type = str_replace('produksi ', '', $request->kategori);

    return redirect()->route('admin.products.manage', $type)
        ->with('success', 'Produk berhasil diperbarui!');
}


    /* =========================
     *  UPDATE DARI TABEL (LAMA)
     * ========================= */
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

    /* =========================
     *  HAPUS PRODUK
     * ========================= */
    public function destroy($id)
    {
        $produk = Produk::where('id_produk', $id)->first();

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        // Hapus file foto (jika ada)
        if ($produk->foto && file_exists(public_path('asset/img/' . $produk->foto))) {
            unlink(public_path('asset/img/' . $produk->foto));
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
}
