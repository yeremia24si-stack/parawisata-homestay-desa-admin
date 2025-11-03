<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f8f9fa; text-align:center; padding:50px; }
        .container { width: 400px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, button { width: 90%; padding: 10px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #007bff; color: white; border: none; }
        a { color: #007bff; text-decoration: none; }
        .msg { margin-bottom: 10px; color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Halaman Login</h2>
        @if(session('error'))
            <div class="msg">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="msg" style="color:green;">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('pages.auth.login.post') }}">
            @csrf
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
        </form>

        <p>Belum punya akun? <a href="{{ route('pages.auth.register') }}">Registrasi</a></p>
    </div>
</body>
</html>
