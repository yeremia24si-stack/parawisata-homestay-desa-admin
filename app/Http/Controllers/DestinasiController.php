<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
public function index(Request $request)
{
    $query = Destinasi::query();

    if ($request->search) {
        $query->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('alamat', 'like', '%' . $request->search . '%');
    }

    if ($request->tiket) {
        $query->where('tiket', '<=', $request->tiket);
    }

    $data = $query->latest()->paginate(10)->withQueryString();

    return view('pages.destinasi.index', compact('data'));
}


    public function create()
    {
        return view('pages.destinasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'cover' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fileName = null;

        if ($request->hasFile('cover')) {
            $fileName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('uploads/destinasi'), $fileName);
        }

        Destinasi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'jam_buka' => $request->jam_buka,
            'tiket' => $request->tiket,
            'kontak' => $request->kontak,
            'cover' => $fileName,
        ]);

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = Destinasi::findOrFail($id);
        return view('pages.destinasi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Destinasi::findOrFail($id);
        return view('pages.destinasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'cover' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fileName = $destinasi->cover;

        if ($request->hasFile('cover')) {
            $fileName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('uploads/destinasi'), $fileName);
        }

        $destinasi->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'jam_buka' => $request->jam_buka,
            'tiket' => $request->tiket,
            'kontak' => $request->kontak,
            'cover' => $fileName,
        ]);

        return redirect()->route('destinasi.index')->with('success', 'Berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Destinasi::findOrFail($id);

        if ($data->cover && file_exists(public_path('uploads/destinasi/' . $data->cover))) {
            unlink(public_path('uploads/destinasi/' . $data->cover));
        }

        $data->delete();
        return redirect()->route('destinasi.index')->with('success', 'Berhasil dihapus.');
    }
}
