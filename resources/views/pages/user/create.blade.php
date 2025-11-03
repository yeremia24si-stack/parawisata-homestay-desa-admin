@extends('admin.layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="card shadow-sm p-4">
    <h5 class="mb-3">Tambah User Baru</h5>
    <form>
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" placeholder="Masukkan nama lengkap user">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Masukkan email user">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Masukkan password">
        </div>

        <div class="mb-3">
            <label>Peran</label>
            <select class="form-select">
                <option value="">-- Pilih Peran --</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
                <option value="warga">Warga</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
