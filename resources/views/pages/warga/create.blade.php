@extends('admin.layouts.app')

@section('title', 'Tambah Warga')

@section('content')
<div class="card shadow-sm p-4">
    <h5 class="mb-3">Tambah Data Warga</h5>
    <form>
        <div class="mb-3">
            <label>Nama Warga</label>
            <input type="text" class="form-control" placeholder="Masukkan nama warga">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" class="form-control" placeholder="Masukkan alamat warga">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" class="form-control" placeholder="Masukkan nomor HP">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select class="form-select">
                <option value="">-- Pilih Status --</option>
                <option value="aktif">Aktif</option>
                <option value="tidak_aktif">Tidak Aktif</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.warga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
