@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Detail User</h3>
    <table class="table table-bordered">
        <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
        <tr><th>Role</th><td>{{ $user->role }}</td></tr>
    </table>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
