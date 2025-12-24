<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomestayController extends Controller
{
    public function index()
    {
        $homestays = Homestay::with('pemilik')->latest()->get();
        return view('pages.homestay.index', compact('homestays'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.homestay.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pemilik_warga_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'fasilitas_json' => 'nullable|array',
            'harga_per_malam' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,penuh,maintenance',
            'media' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('media')) {
            $validated['media'] = $request->file('media')->store('homestay', 'public');
        }

        $validated['fasilitas_json'] = json_encode($validated['fasilitas_json'] ?? []);

        Homestay::create($validated);

        return redirect()->route('homestay.index')->with('success', 'Homestay berhasil ditambahkan!');
    }

    public function show(Homestay $homestay)
    {
        $homestay->load('pemilik', 'kamar');
        return view('pages.homestay.show', compact('homestay'));
    }

    public function edit(Homestay $homestay)
    {
        $users = User::all();
        return view('pages.homestay.edit', compact('homestay', 'users'));
    }

    public function update(Request $request, Homestay $homestay)
    {
        $validated = $request->validate([
            'pemilik_warga_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'fasilitas_json' => 'nullable|array',
            'harga_per_malam' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,penuh,maintenance',
            'media' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('media')) {
            if ($homestay->media) {
                Storage::disk('public')->delete($homestay->media);
            }
            $validated['media'] = $request->file('media')->store('homestay', 'public');
        }

        $validated['fasilitas_json'] = json_encode($validated['fasilitas_json'] ?? []);

        $homestay->update($validated);

        return redirect()->route('homestay.index')->with('success', 'Homestay berhasil diupdate!');
    }

    public function destroy(Homestay $homestay)
    {
        if ($homestay->media) {
            Storage::disk('public')->delete($homestay->media);
        }
        
        $homestay->delete();

        return redirect()->route('homestay.index')->with('success', 'Homestay berhasil dihapus!');
    }
}