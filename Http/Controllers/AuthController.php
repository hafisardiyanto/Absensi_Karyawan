<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Proses login
        if (Auth::guard('karyawan')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika login berhasil
            echo "Berhasil login";
        } else {
            // Jika login gagal
            echo "Gagal login";
        }
    }
}
