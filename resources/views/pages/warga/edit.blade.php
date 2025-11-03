@extends('admin.layouts.app')

@section('title', 'Edit Warga')

@section('content')
<div class="card shadow-sm p-4">
    <h5 class="mb-3">Edit Data Warga</h5>
    <form>
        <div class="mb-3">
            <label>Nama Warga</label>
            <input type="text" class="form-control" value="Budi Santoso">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" class="form-control" value="Desa Wisata Bawömataluo">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" class="form-control" value="0812-3456-7890">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select class="form-select">
                <option value="aktif" selected>Aktif</option>
                <option value="tidak_aktif">Tidak Aktif</option>
            </select>
        </div>

        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('admin.warga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
