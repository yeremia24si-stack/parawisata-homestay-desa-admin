@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Detail Warga</h3>
    <table class="table table-bordered">
        <tr><th>No KTP</th><td>{{ $warga->no_ktp }}</td></tr>
        <tr><th>Nama</th><td>{{ $warga->nama }}</td></tr>
        <tr><th>Jenis Kelamin</th><td>{{ $warga->jenis_kelamin }}</td></tr>
        <tr><th>Agama</th><td>{{ $warga->agama }}</td></tr>
        <tr><th>Pekerjaan</th><td>{{ $warga->pekerjaan }}</td></tr>
        <tr><th>Telp</th><td>{{ $warga->telp }}</td></tr>
        <tr><th>Email</th><td>{{ $warga->email }}</td></tr>
    </table>
    <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
