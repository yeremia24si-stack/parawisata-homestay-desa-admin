<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UlasanController extends Controller
{
    private $data = [];

    public function __construct()
    {
        // Data dummy ulasan wisata
        $this->data = [
            ["id" => 1, "destinasi" => "Pantai Kuta", "warga" => "Budi", "rating" => 5, "komentar" => "Sangat indah!", "waktu" => "2025-09-20"],
            ["id" => 2, "destinasi" => "Gunung Bromo", "warga" => "Siti", "rating" => 4, "komentar" => "Pemandangannya luar biasa!", "waktu" => "2025-09-21"],
            ["id" => 3, "destinasi" => "Danau Toba", "warga" => "Andi", "rating" => 5, "komentar" => "Tempatnya keren banget!", "waktu" => "2025-09-22"],
        ];
    }

    // tampilkan semua ulasan
    public function index()
    {
        $ulasan = $this->data;
        return view('ulasan.index', compact('ulasan'));
    }

    // form tambah
    public function create()
    {
        return view('ulasan.create');
    }

    // simpan data baru (dummy)
    public function store(Request $request)
    {
        return redirect()->route('ulasan.index')
            ->with('success', 'Ulasan berhasil ditambahkan (dummy, belum ke DB)');
    }

    // form edit
    public function edit($id)
    {
        $ulasan = collect($this->data)->firstWhere('id', $id);
        return view('ulasan.edit', compact('ulasan'));
    }

    // update data dummy
    public function update(Request $request, $id)
    {
        return redirect()->route('ulasan.index')
            ->with('success', "Ulasan ID $id berhasil diupdate (dummy)");
    }

    // hapus data dummy
    public function destroy($id)
    {
        return redirect()->route('ulasan.index')
            ->with('success', "Ulasan ID $id berhasil dihapus (dummy)");
    }
}
