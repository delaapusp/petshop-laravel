<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'deskripsi'   => 'required'
        ]);

        Product::create([
            'nama_barang' => $request->nama_barang,
            'harga'       => $request->harga,
            'stock'       => $request->stock,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Barang berhasil ditambah');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        //update
        $request -> validate(
        [
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'deskripsi' => 'required'
        ]
        );
        //cari produk berdasarkan id
        $product = \App\Models\Product::findOrFail($id);
        //update
        $product->update($request->all());
        return redirect()->route('products.index')->with('succes','barang berhasil diupdate');
    }

    public function destroy(string $id)
    {
        //HAPUS DATA BERDASARKAN ID
        $product = \App\Models\Product::FindOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('succes','barang berhasil dihapus');

    }
}