<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Berhasil</title>
    <style>
        body { font-family: Arial; background: #e6ffee; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align: center; width: 400px; }
        h2 { color: #006600; }
        a { display: inline-block; margin-top: 15px; text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login Berhasil!</h2>
        <p>Selamat datang, Admin.</p>
        <a href="{{ url('/auth') }}">Kembali ke Halaman Login</a>
    </div>
</body>
</html>
