<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
| Semua route aplikasi web didefinisikan di sini
| Versi ini sudah dirapikan agar tidak ada duplikasi.
*/

// ========================
//  HALAMAN UMUM
// ========================

// Halaman Welcome Laravel
Route::get('/', function () {
    return view('pages.auth.login'); // Halaman utama warga
})->name('home');

// Halaman tambahan (contoh belajar route)
Route::get('/pcr', fn() => 'Selamat Datang di Website Kampus PCR!');
Route::get('/mahasiswa', fn() => 'Halo Mahasiswa')->name('mahasiswa.show');
Route::get('/nama/{param1}', fn($param1) => 'Nama saya: ' . $param1);
Route::get('/nim/{param1?}', fn($param1 = '') => 'NIM saya: ' . $param1);
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);
Route::get('/about', fn() => view('halaman-about'))->name('about');


// ========================
//  AUTENTIKASI ADMIN
// ========================

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('pages.auth.login.post');

Route::get('/admin/register', [AuthController::class, 'showRegister'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'register'])->name('pages.auth.register.post');

Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ========================
//  ADMIN AREA
// ========================

// Dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Modul CRUD User & Warga
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('warga', WargaController::class);
});

// ========================
//  MODUL ULASAN
// ========================
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

// ========================
//  DATA WARGA (Publik)
// ========================
Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');
