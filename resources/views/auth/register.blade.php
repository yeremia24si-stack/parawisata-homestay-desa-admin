<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #e9f0ff; text-align:center; padding:50px; }
        .container { width: 450px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, button { width: 90%; padding: 10px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #28a745; color: white; border: none; }
        a { color: #007bff; text-decoration: none; }
        .msg { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Registrasi</h2>
        @if ($errors->any())
            <div class="msg">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('auth.register.submit') }}">
            @csrf
            <input type="text" name="nama" placeholder="Nama Lengkap"><br>
            <input type="text" name="alamat" placeholder="Alamat"><br>
            <input type="date" name="tanggal_lahir"><br>
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password"><br>
            <button type="submit">Daftar</button>
        </form>

        <p>Sudah punya akun? <a href="{{ route('auth.login') }}">Login</a></p>
    </div>
</body>
</html>
