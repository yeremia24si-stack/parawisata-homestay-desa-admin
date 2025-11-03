@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="card shadow-sm p-4">
    <h5 class="mb-3">Edit Data User</h5>
    <form>
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" value="Admin Desa">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" value="admin@desa.test">
        </div>

        <div class="mb-3">
            <label>Peran</label>
            <select class="form-select">
                <option value="admin" selected>Admin</option>
                <option value="petugas">Petugas</option>
                <option value="warga">Warga</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Password Baru (opsional)</label>
            <input type="password" class="form-control" placeholder="Isi jika ingin ganti password">
        </div>

        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
