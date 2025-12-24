<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::with('user')->paginate(10);
        return view('pages.warga.index', compact('warga'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.warga.create', compact('users'));
    }

    public function store(Request $request)
{
    $request->validate([
        'no_ktp'=>'required|unique:warga,no_ktp',
        'nama'=>'required',
        'jenis_kelamin'=>'required',
        'agama'=>'required',
        'pekerjaan'=>'required',
        'telp'=>'required',
        'email'=>'required|email',
        'user_id'=>'required'
    ]);

    Warga::create($request->all());

    return redirect()->route('warga.index')
        ->with('success','Data warga berhasil ditambahkan');
}

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        $users = User::all();
        return view('pages.warga.edit', compact('warga','users'));
    }

    public function update(Request $request, $id)
{
    $warga = Warga::findOrFail($id);

    $request->validate([
        'no_ktp' => 'required|unique:warga,no_ktp,'.$id.',warga_id',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'pekerjaan' => 'required',
        'telp' => 'required',
        'email' => 'required|email',
        'user_id' => 'required'
    ]);

    $warga->update($request->all());

    return redirect()->route('warga.index')
        ->with('success', 'Data warga berhasil diupdate');
}


    public function destroy($id)
{
    $warga = Warga::findOrFail($id);
    $warga->delete();

    return redirect()->route('warga.index')
        ->with('success', 'Data warga berhasil dihapus');
}

}
