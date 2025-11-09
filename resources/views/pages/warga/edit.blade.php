@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Warga</h3>
    <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>No KTP</label>
            <input type="text" name="no_ktp" value="{{ $warga->no_ktp }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $warga->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" value="{{ $warga->agama }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" value="{{ $warga->telp }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $warga->email }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
