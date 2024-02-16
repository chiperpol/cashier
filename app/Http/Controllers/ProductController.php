<?php

namespace App\Http\Controllers;

use App\Models\MasterKategori;
use Illuminate\Http\Request;
use App\Models\Product; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $kategoris = MasterKategori::where('status', '1')->get();

        return view('produk.index', compact('products', 'kategoris'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'namaProduk' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'status' => 'required|in:0,1',
            'kategori_id' => 'required|exists:master_kategori,id',
            'pict' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('pict')) {
            $imageName = Str::uuid() . '.' . $request->file('pict')->getClientOriginalExtension();
            $request->file('pict')->storeAs('public/products', $imageName);
        } else {
            $imageName = null;
        }

        $data = [
            'namaProduk' => $request->namaProduk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'kategori_id' => $request->kategori_id,
            'pict' => $imageName
        ];

        Product::create($data);
        return redirect()->route('product.index');
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'namaProduk' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'status' => 'required|in:0,1',
            'kategori_id' => 'required|exists:master_kategori,id',
            'pict' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produk = Product::findOrFail($id);

        if ($request->hasFile('pict')) {
            $imageName = Str::uuid() . '.' . $request->file('pict')->getClientOriginalExtension();
            $request->file('pict')->storeAs('public/products', $imageName);
            
            if ($produk->pict) {
                Storage::delete('public/products/' . $produk->pict);
            }
            $produk->pict = $imageName;
        }

        $produk->namaProduk = $request->namaProduk;
        $produk->harga = $request->harga;
        $produk->kategori_id = $request->kategori_id;
        $produk->deskripsi = $request->deskripsi;
        $produk->status = $request->status;

        $produk->save();

        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();

        return redirect()->route('product.index');
    }
}
