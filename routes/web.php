<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\MultipleuploadsController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\KamarHomestayController;
use App\Http\Controllers\BookingHomestayController;

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'checkislogin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | SUPER ADMIN ONLY - User Management
    |--------------------------------------------------------------------------
    */
    
        Route::resource('user', UserController::class);
    

    /*
    |--------------------------------------------------------------------------
    | SUPER ADMIN & ADMIN - Data Management
    |--------------------------------------------------------------------------
    */

        Route::resource('warga', WargaController::class);
        Route::resource('destinasi', DestinasiController::class);
        Route::get('/multipleuploads', [MultipleuploadsController::class, 'index'])->name('uploads');
        Route::post('/save', [MultipleuploadsController::class, 'store'])->name('uploads.store');
    

    /*
    |--------------------------------------------------------------------------
    | ALL AUTHENTICATED USERS - Ulasan
    |--------------------------------------------------------------------------
    */
    Route::resource('ulasan', UlasanController::class);
});

/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('dashboard');
});



// Tambahkan routes ini ke file routes/web.php

// Routes untuk Homestay
Route::resource('homestay', HomestayController::class)->parameters([
    'homestay' => 'homestay:homestay_id'
]);

// Routes untuk Kamar Homestay
Route::resource('kamar-homestay', KamarHomestayController::class)->parameters([
    'kamar-homestay' => 'kamarHomestay:kamar_id'
]);

// Routes untuk Booking Homestay
Route::resource('booking-homestay', BookingHomestayController::class)->parameters([
    'booking-homestay' => 'bookingHomestay:booking_id'
]);