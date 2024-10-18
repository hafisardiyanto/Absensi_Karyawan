<!-- resources/views/roles/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Edit Role</h2>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nama Role:</label>
        <input type="text" name="name" id="name" value="{{ $role->name }}">
        <button type="submit">Perbarui</button>
    </form>
@endsection
