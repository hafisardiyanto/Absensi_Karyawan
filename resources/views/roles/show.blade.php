<!-- resources/views/roles/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Role</h1>
    <p>Nama Role: {{ $role->name }}</p>
    <p>Deskripsi Role: {{ $role->description }}</p>

    <a href="{{ route('roles.index') }}">Kembali ke daftar role</a>
@endsection
