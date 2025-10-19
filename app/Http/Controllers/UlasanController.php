<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::all();
        return view('ulasan.index', compact('ulasans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destinasi_id' => 'required|string|max:100',
            'warga_id' => 'nullable|integer',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
            'waktu' => 'required|date',
        ]);

        Ulasan::create($request->all());
        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
