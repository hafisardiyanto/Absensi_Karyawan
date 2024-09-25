<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanAuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.karyawan_login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'user' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Coba autentikasi menggunakan guard 'karyawan'
        if (Auth::guard('karyawan')->attempt(['User' => $request->user, 'password' => $request->password])) {
            // Jika login berhasil, redirect ke dashboard
            return redirect()->intended('/tampilan');
        }

        // Jika login gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'user' => 'Username atau password salah.',
        ])->onlyInput('user');
    }

    // Logout
    public function logout()
    {
        Auth::guard('karyawan')->logout();
        return redirect('/karyawan/login');
    }
}
