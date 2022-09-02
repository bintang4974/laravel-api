<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get()
    {
        $product = Product::get();

        return response()->json([
            'message' => 'success!',
            'data' => $product
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_product' => 'required',
            'harga_product' => 'required',
            'stok_product' => 'required',
            'deskripsi_product' => 'required',
        ]);

        $product = new Product();
        $product->nama_product = $request->nama_product;
        $product->harga_product = $request->harga_product;
        $product->stok_product = $request->stok_product;
        $product->deskripsi_product = $request->deskripsi_product;
        $product->save();

        return response()->json([
            'message' => 'success!',
            'data' => $product
        ], 200);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return response()->json([
            'message' => 'success get data!',
            'data' => $product
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $request->validate([
            'nama_product' => 'required',
            'harga_product' => 'required',
            'stok_product' => 'required',
            'deskripsi_product' => 'required',
        ]);

        $product->update([
            'nama_product' => $request->nama_product,
            'harga_product' => $request->harga_product,
            'stok_product' => $request->stok_product,
            'deskripsi_product' => $request->deskripsi_product,
        ]);

        return response()->json([
            'message' => 'success!',
            'data' => $product
        ], 200);
    }
}
