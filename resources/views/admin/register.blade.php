<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register - Bina Desa</title>
<link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">@foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
        </div>
      @endif

      <div class="card">
        <div class="card-header">Register Admin</div>
        <div class="card-body">
          <form action="{{ route('admin.register.post') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input name="name" value="{{ old('name') }}" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input name="email" value="{{ old('email') }}" class="form-control" type="email" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input name="password" type="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input name="password_confirmation" type="password" class="form-control" required>
            </div>
            <button class="btn btn-success w-100">Register</button>
            <hr>
            <a href="{{ route('admin.login') }}">Sudah punya akun? Login</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
