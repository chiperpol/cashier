<?php

namespace App\Http\Controllers;

use App\Models\MasterKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class KategoriProdukController extends Controller
{
    public function index()
    {
        return view('masterKategoriProduk.index', [
            'kategoriproduks' => MasterKategori::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $data = [
            'namaKategori' => $request->namaKategori,
            'status' => $request->status,
        ];

        MasterKategori::create($data);
        return redirect()->route('masterkategoriproduk.index');
    }  
    
    public function show(MasterKategori $data)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $data  
        ]); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKategori' => 'required|string',
            'status' => 'required|in:0,1',
        ]);

        $kategori = MasterKategori::findOrFail($id);

        $kategori->namaKategori = $request->namaKategori;
        $kategori->status = $request->status;
        $kategori->save();

        return redirect()->route('masterkategoriproduk.index');
    }

    public function delete($id)
    {
        $data = MasterKategori::find($id);
        $data->delete();

        return redirect()->route('masterkategoriproduk.index');
    }
}
