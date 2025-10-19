<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    public function index()
    {
        $wargas = Warga::all();
        return view('warga.index', compact('wargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        Warga::create($request->all());
        return redirect()->back()->with('success', 'Data warga berhasil ditambahkan!');
    }

        public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->back()->with('success', 'Data warga berhasil dihapus!');
    }

}
