<?php

namespace App\Http\Controllers;

use App\Models\UlasanWisata;
use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasan = UlasanWisata::with(['warga','user'])->get();
        $ulasan = UlasanWisata::with('warga')->paginate(10);

        return view('pages.ulasan.index', compact('ulasan'));
    }

    public function create()
    {
        $warga = Warga::all();
        $users = User::all();
        return view('pages.ulasan.create', compact('warga','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destinasi'=>'required',
            'rating'=>'required',
            'komentar'=>'required',
            'warga_id'=>'required',
            'user_id'=>'required'
        ]);

        UlasanWisata::create($request->all());
        return redirect()->route('ulasan.index')->with('success','Ulasan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ulasan = UlasanWisata::findOrFail($id);
        $warga = Warga::all();
        $users = User::all();
        return view('pages.ulasan.edit', compact('ulasan','warga','users'));
    }

    public function update(Request $request, $id)
    {
        $ulasan = UlasanWisata::findOrFail($id);
        $ulasan->update($request->all());
        return redirect()->route('ulasan.index')->with('success','Ulasan berhasil diperbarui');
    }

    public function destroy($id)
    {
        UlasanWisata::destroy($id);
        return redirect()->route('ulasan.index')->with('success','Ulasan berhasil dihapus');
    }
}
