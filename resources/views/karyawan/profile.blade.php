@extends('layouts.app') <!-- Pastikan menggunakan layout yang sesuai -->

@section('content')
<div class="container">
    <div class="profile-section">
        <h2>Profil Karyawan</h2>
        <div class="profile-info">
            <p><strong>Nama:</strong> {{ $karyawan->name }}</p>
            <p><strong>Email:</strong> {{ $karyawan->email }}</p>
            <p><strong>Jabatan:</strong> {{ $karyawan->role->name }}</p> <!-- Asumsi role terhubung dengan relasi -->
            <!-- Tambahkan informasi lain yang diperlukan seperti absensi, kontak, dll. -->
        </div>

        <!-- Tombol navigasi lain -->
        <a href="{{ route('absensi.index') }}" class="btn btn-primary">Lihat Absensi</a>
    </div>
</div>
@endsection
