<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    public function profile()
    {
        // Ambil data karyawan dari database, sesuaikan dengan model dan relasi yang digunakan.
        $karyawan = auth()->user(); // Atau ambil dari database sesuai dengan kebutuhan Anda.
        
        return view('karyawan.profile', compact('karyawan'));
    }
}
