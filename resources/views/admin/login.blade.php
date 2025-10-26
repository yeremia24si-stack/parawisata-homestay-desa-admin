<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Bina Desa</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header">Admin Login</div>
                <div class="card-body">
                    <form action="{{ route('admin.login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input value="{{ old('email') }}" name="email" type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" required>
                        </div>
                        <button class="btn btn-primary w-100">Login</button>
                        <hr>
                        <a href="{{ route('admin.register') }}">Belum punya akun? Daftar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
