<!-- resources/views/roles/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Tambah Role Baru</h2>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <label for="name">Nama Role:</label>
        <input type="text" name="name" id="name">
        <button type="submit">Simpan</button>
        @endsection
    </form>
