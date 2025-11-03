@extends('admin.layouts.app')

@section('title', 'Data User')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Data User</h5>
        <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah User</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Peran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Admin Desa</td>
                <td>admin@desa.test</td>
                <td>Admin</td>
                <td>
                    <a href="{{ route('user.edit', 1) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
