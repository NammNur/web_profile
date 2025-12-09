<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function manage($type)
    {
        $products = Product::where('type', $type)->get();
        return view('admin.manage-product', compact('products', 'type'));
    }

    public function store(Request $request, $type)
    {
        Product::create([
            'name'  => $request->name,
            'price' => $request->price,
            'type'  => $type
        ]);

        return back()->with('success', 'Produk berhasil ditambah!');
    }

    public function update(Request $request, $type, $id)
    {
        Product::where('id', $id)->update([
            'name'  => $request->name,
            'price' => $request->price,
        ]);

        return back()->with('success', 'Produk berhasil diupdate!');
    }

    public function delete($type, $id)
    {
        Product::where('id', $id)->delete();
        return back()->with('success', 'Produk berhasil dihapus!');
    }
}
