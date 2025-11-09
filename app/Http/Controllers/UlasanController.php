<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasan = Ulasan::with(['warga','user'])->get();
        return view('layouts.admin.ulasan.index', compact('ulasan'));
    }

    public function create()
    {
        $warga = Warga::all();
        $users = User::all();
        return view('layouts.admin.ulasan.create', compact('warga','users'));
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

        Ulasan::create($request->all());
        return redirect()->route('ulasan.index')->with('success','Ulasan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $warga = Warga::all();
        $users = User::all();
        return view('layouts.admin.ulasan.edit', compact('ulasan','warga','users'));
    }

    public function update(Request $request, $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->update($request->all());
        return redirect()->route('ulasan.index')->with('success','Ulasan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Ulasan::destroy($id);
        return redirect()->route('ulasan.index')->with('success','Ulasan berhasil dihapus');
    }
}
