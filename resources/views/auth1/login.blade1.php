<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Login</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .container { background: white; padding: 25px; border-radius: 10px; width: 340px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin: 6px 0; border: 1px solid #ccc; border-radius: 5px; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .alert { margin-bottom: 10px; padding: 10px; border-radius: 5px; }
        .error { background: #ffcccc; color: #a00; }
        .success { background: #ccffcc; color: #060; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Halaman Login</h2>

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/auth/login') }}" method="POST">
            @csrf
            <label>Username:</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan username">

            <label>Password:</label>
            <input type="password" name="password" placeholder="Masukkan password">

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
