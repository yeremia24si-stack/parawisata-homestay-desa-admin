<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
</head>
<body>
<div class="container py-4">
    <h4>Edit User</h4>

    @if($errors->any())
      <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul></div>
    @endif

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2"><label>Name</label><input name="name" class="form-control" value="{{ old('name', $user->name) }}" required></div>
        <div class="mb-2"><label>Email</label><input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required></div>
        <div class="mb-2"><label>New Password (kosongkan jika tidak diubah)</label><input name="password" type="password" class="form-control"></div>
        <div class="mb-2"><label>Confirm Password</label><input name="password_confirmation" type="password" class="form-control"></div>
        <div class="mb-2"><label>Position</label><input name="position" value="{{ old('position', $user->position) }}" class="form-control"></div>
        <div class="mb-2"><label>Department</label><input name="department" value="{{ old('department', $user->department) }}" class="form-control"></div>
        <div class="mb-2"><label>Phone</label><input name="phone" value="{{ old('phone', $user->phone) }}" class="form-control"></div>
        <div class="mb-2"><label>Status</label><input name="status" value="{{ old('status', $user->status) }}" class="form-control"></div>

        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
