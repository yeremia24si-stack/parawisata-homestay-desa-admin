@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Data User</h3>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->role }}</td>
                    <td>
                        <a href="{{ route('user.show', $u->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
