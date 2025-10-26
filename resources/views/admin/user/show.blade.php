<!DOCTYPE html>
<html>
<head>
    <title>Detail User</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
</head>
<body>
<div class="container py-4">
    <h4>Detail User</h4>

    <table class="table table-bordered">
        <tr><th>Name</th><td>{{ $user->name }}</td></tr>
        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
        <tr><th>Position</th><td>{{ $user->position ?? '-' }}</td></tr>
        <tr><th>Department</th><td>{{ $user->department ?? '-' }}</td></tr>
        <tr><th>Phone</th><td>{{ $user->phone ?? '-' }}</td></tr>
        <tr><th>Status</th><td>{{ $user->status ?? '-' }}</td></tr>
        <tr><th>Dibuat</th><td>{{ $user->created_at }}</td></tr>
    </table>

    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
