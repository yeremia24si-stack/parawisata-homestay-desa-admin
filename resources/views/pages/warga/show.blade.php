@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Detail Data Warga</h3>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>No KTP:</strong> {{ $warga->no_ktp }}</p>
            <p><strong>Nama:</strong> {{ $warga->nama }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin }}</p>
            <p><strong>Agama:</strong> {{ $warga->agama }}</p>
            <p><strong>Pekerjaan:</strong> {{ $warga->pekerjaan }}</p>
            <p><strong>Telepon:</strong> {{ $warga->telp }}</p>
            <p><strong>Email:</strong> {{ $warga->email }}</p>
        </div>
    </div>

    <a href="{{ route('warga.index') }}" class="btn btn-primary mt-3">Kembali</a>
    <a href="{{ route('warga.edit', $warga->warga_id) }}" class="btn btn-warning mt-3">Edit</a>
</div>
@endsection
