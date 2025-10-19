<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});



//use App\Http\Controllers\UlasanController;

//Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
//Route::get('/ulasan/create', [UlasanController::class, 'create'])->name('ulasan.create');
//Route::post('/ulasan/store', [UlasanController::class, 'store'])->name('ulasan.store');
//Route::get('/ulasan/{id}/edit', [UlasanController::class, 'edit'])->name('ulasan.edit');
//Route::post('/ulasan/{id}/update', [UlasanController::class, 'update'])->name('ulasan.update');
//Route::get('/ulasan/{id}/delete', [UlasanController::class, 'destroy'])->name('ulasan.destroy');





//use App\Http\Controllers\AuthController;

// Menampilkan halaman login
//Route::get('/auth', [AuthController::class, 'index']);

// Memproses form login
//Route::post('/auth/login', [AuthController::class, 'login']);

// Menampilkan halaman berhasil login
//Route::get('/auth/berhasil', [AuthController::class, 'berhasil']);





use App\Http\Controllers\AuthController;

// Halaman login
Route::get('/auth/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login.submit');

// Halaman register
Route::get('/auth/register', function () {
    return view('auth.register');
})->name('auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register.submit');

// Halaman berhasil (dashboard)
Route::get('/auth/berhasil', function () {
    return view('auth.berhasil');
})->name('auth.berhasil');

// Redirect root ke login
Route::get('/', function () {
    return redirect('/auth/login');
});


use App\Http\Controllers\AdminController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\WargaController;

Route::get('/', [AdminController::class, 'index']);

// Ulasan Wisata
Route::get('/ulasan', [UlasanController::class, 'index']);
Route::post('/ulasan', [UlasanController::class, 'store']);

// Data Warga
Route::get('/warga', [WargaController::class, 'index']);
Route::post('/warga', [WargaController::class, 'store']);
Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy'); // fitur hapus warga