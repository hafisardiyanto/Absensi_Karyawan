<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function showCamera()
    {
        // Menampilkan halaman untuk mengambil foto jam masuk
        return view('absensi.masuk');
    }

    public function submitAbsensi(Request $request)
{
    // Menyimpan foto dari input 'image' dalam format base64
    $imageData = $request->input('image');

    // Mengubah base64 menjadi file gambar
    $fileName = time() . '.png';
    $path = public_path('images/absensi/' . $fileName);
    file_put_contents($path, file_get_contents($imageData));

    // Simpan informasi absensi (misalnya waktu, ID karyawan, dsb.)
    // ...

    return redirect()->back()->with('success', 'Absensi berhasil disimpan!');
}

}


