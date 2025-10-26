<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // Handle form login
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Validasi wajib diisi
        if (empty($username) || empty($password)) {
            return back()->with('error', 'Username dan password wajib diisi.');
        }

        // Login sederhana tanpa database
        if ($username === 'nim' && $password === 'nim') {
            return redirect()->route('auth.berhasil')->with('success', 'Selamat Datang Admin!');
        } else {
            return back()->with('error', 'Username atau password salah.');
        }
    }

    // Handle form register
    public function register(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'alamat' => ['required', 'max:300'],
            'tanggal_lahir' => ['required', 'date'],
            'username' => ['required'],
            'password' => ['required', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
            'confirm_password' => ['required', 'same:password'],
        ], [
            'nama.regex' => 'Nama tidak boleh mengandung angka.',
            'alamat.max' => 'Alamat maksimal 300 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital dan angka.',
            'confirm_password.same' => 'Password dan Konfirmasi Password harus sama.',
        ]);

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil! Silakan Login.');
    }
}
