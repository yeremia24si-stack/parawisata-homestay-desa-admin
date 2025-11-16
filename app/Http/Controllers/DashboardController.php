<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use App\Models\Ulasan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalWarga = Warga::count();
        $totalUlasan = Ulasan::count();

        return view('pages.dashboard', compact('totalUser', 'totalWarga', 'totalUlasan'));
    }
}
