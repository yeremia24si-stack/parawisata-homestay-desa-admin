<?php

namespace App\Http\Controllers;

use App\Models\KamarHomestay;
use App\Models\Homestay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarHomestayController extends Controller
{
    public function index()
    {
        $kamars = KamarHomestay::with('homestay')->latest()->get();
        return view('pages.kamar-homestay.index', compact('kamars'));
    }

    public function create()
    {
        $homestays = Homestay::all();
        return view('pages.kamar-homestay.create', compact('homestays'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'homestay_id' => 'required|exists:homestay,homestay_id',
            'nama_kamar' => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'fasilitas_json' => 'nullable|array',
            'harga' => 'required|numeric|min:0',
            'media' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('media')) {
            $validated['media'] = $request->file('media')->store('kamar_homestay', 'public');
        }

        $validated['fasilitas_json'] = json_encode($validated['fasilitas_json'] ?? []);

        KamarHomestay::create($validated);

        return redirect()->route('kamar-homestay.index')->with('success', 'Kamar Homestay berhasil ditambahkan!');
    }

    public function show(KamarHomestay $kamarHomestay)
    {
        $kamarHomestay->load('homestay', 'bookings');
        return view('pages.kamar-homestay.show', compact('kamarHomestay'));
    }

    public function edit(KamarHomestay $kamarHomestay)
    {
        $homestays = Homestay::all();
        return view('pages.kamar-homestay.edit', compact('kamarHomestay', 'homestays'));
    }

    public function update(Request $request, KamarHomestay $kamarHomestay)
    {
        $validated = $request->validate([
            'homestay_id' => 'required|exists:homestay,homestay_id',
            'nama_kamar' => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'fasilitas_json' => 'nullable|array',
            'harga' => 'required|numeric|min:0',
            'media' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('media')) {
            if ($kamarHomestay->media) {
                Storage::disk('public')->delete($kamarHomestay->media);
            }
            $validated['media'] = $request->file('media')->store('kamar_homestay', 'public');
        }

        $validated['fasilitas_json'] = json_encode($validated['fasilitas_json'] ?? []);

        $kamarHomestay->update($validated);

        return redirect()->route('kamar-homestay.index')->with('success', 'Kamar Homestay berhasil diupdate!');
    }

    public function destroy(KamarHomestay $kamarHomestay)
    {
        if ($kamarHomestay->media) {
            Storage::disk('public')->delete($kamarHomestay->media);
        }
        
        $kamarHomestay->delete();

        return redirect()->route('kamar-homestay.index')->with('success', 'Kamar Homestay berhasil dihapus!');
    }
}