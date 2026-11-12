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
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}