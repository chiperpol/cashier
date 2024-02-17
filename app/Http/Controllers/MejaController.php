<?php

namespace App\Http\Controllers;

use App\Models\MasterMeja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        return view('masterMeja.index', [
            'mejas' => MasterMeja::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMeja' => 'required|string',
            'lantai' => 'required|in:1,2,3',
            'status' => 'required|in:0,1',
        ]);

        $data = [
            'namaMeja' => $request->namaMeja,
            'lantai' => $request->lantai,
            'status' => $request->status,
        ];

        MasterMeja::create($data);
        return redirect()->route('mastermeja.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaMeja' => 'required|string',
            'lantai' => 'required|in:1,2,3',
            'status' => 'required|in:0,1',
        ]);

        $meja = MasterMeja::findOrFail($id);

        $meja->namaMeja = $request->namaMeja;
        $meja->lantai = $request->lantai;
        $meja->status = $request->status;
        $meja->save();

        return redirect()->route('mastermeja.index');

    }

    public function delete($id)
    {
        $data = MasterMeja::find($id);
        $data->delete();

        return redirect()->route('mastermeja.index');
    }
}
