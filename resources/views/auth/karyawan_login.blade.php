<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Karyawan</title>
</head>
<body>
    <h2>Login Karyawan</h2>
    
    <!-- Tampilkan pesan error jika login gagal -->
    @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Form login -->
    <form method="POST" action="{{ url('/karyawan/login') }}">
        @csrf
        <div>
            <label for="user">Username:</label>
            <input type="text" name="user" id="user" value="{{ old('user') }}">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
