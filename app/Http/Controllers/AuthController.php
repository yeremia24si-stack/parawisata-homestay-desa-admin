<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    // show login
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    // process login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah'])->withInput();
        }

        // sukses -> set session
        session()->put('admin_id', $user->id);
        session()->put('admin_name', $user->name);
        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil');
    }

    // show register
    public function showRegister()
    {
        return view('pages.auth.register');
    }

    // process register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','email','max:255', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            // optional fields left null
        ]);

        session()->put('admin_id', $user->id);
        session()->put('admin_name', $user->name);

        return redirect()->route('admin.dashboard')->with('success', 'Registrasi berhasil');
    }

    // logout
    public function logout()
    {
        session()->forget(['admin_id','admin_name']);
        session()->flush();
        return redirect()->route('admin.login')->with('success', 'Logout berhasil');
    }
}
