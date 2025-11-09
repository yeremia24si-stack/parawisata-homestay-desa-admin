<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::with('user')->get();
        return view('layouts.admin.warga.index', compact('warga'));
    }

    public function create()
    {
        $users = User::all();
        return view('layouts.admin.warga.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp'=>'required|unique:warga',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'agama'=>'required',
            'pekerjaan'=>'required',
            'telp'=>'required',
            'email'=>'required|email',
            'user_id'=>'required'
        ]);

        Warga::create($request->all());
        return redirect()->route('warga.index')->with('success','Data warga berhasil ditambahkan');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        $users = User::all();
        return view('layouts.admin.warga.edit', compact('warga','users'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->update($request->all());
        return redirect()->route('warga.index')->with('success','Data warga berhasil diupdate');
    }

    public function destroy($id)
    {
        Warga::destroy($id);
        return redirect()->route('warga.index')->with('success','Data warga berhasil dihapus');
    }
}
