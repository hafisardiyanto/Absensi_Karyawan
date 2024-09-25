<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;
use Illuminate\View\View; // Ini tetap digunakan untuk type hint View
use Illuminate\Contracts\View\Factory; // Hapus jika tidak digunakan

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk halaman login
Route::get('/', function (): View {
    return view('auth.login');
});


Route::post('/login', [AuthController::class, 'proseslogin'])->name('login');

    // Route untuk layout dashboard
Route::get('/layout', function (): View {
    return view('dashboard.dashboard'); // Menggunakan huruf kecil sesuai standar umum penamaan file blade
});



// Route untuk profil karyawan (static view)
Route::get('/karyawan', function (): View {
    return view('karyawan.profile');
});

// Route untuk profil karyawan menggunakan controller
Route::get('/karyawan/profile', [KaryawanController::class, 'profile'])->name('karyawan.profile');

// Route untuk halaman kamera absensi
Route::get('/absensi/masuk', [AbsensiController::class, 'showCamera'])->name('absensi.masuk');

// Route untuk submit absensi
Route::post('/absensi/submit', [AbsensiController::class, 'submitAbsensi'])->name('absensi.submit');

// Route untuk halaman kamera secara umum
Route::get('/kamera', [AbsensiController::class, 'camera'])->name('camera.page');
