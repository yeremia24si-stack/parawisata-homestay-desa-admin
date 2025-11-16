<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\UlasanController;

// Route untuk halaman utama (redirect ke login jika belum login)
Route::get('/', function () {
    return redirect()->route('login');
});

// Route Authentication (Accessible only when not logged in)
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    
    // Register Routes
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

// Route untuk halaman yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Tambahkan route lain yang memerlukan autentikasi di sini
    // Contoh:
    // Route::resource('products', ProductController::class);
    // Route::resource('categories', CategoryController::class);
});


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('user', UserController::class);
Route::resource('warga', WargaController::class);
Route::resource('ulasan', UlasanController::class);




use App\Http\Controllers\DestinasiController;

Route::resource('destinasi', DestinasiController::class);


Route::view('/dashboard', 'pages.dashboard');
