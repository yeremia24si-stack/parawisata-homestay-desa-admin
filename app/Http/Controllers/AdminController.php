<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Warga;

class AdminController extends Controller
{
    // Dashboard admin bisa akses semua data
    public function index()
    {
        $ulasans = Ulasan::latest()->get();
        $wargas = Warga::latest()->get();
        return view('ulasan.index', compact('ulasans', 'wargas'));
    }
}
