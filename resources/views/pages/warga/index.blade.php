@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Data Warga</h3>
    <a href="{{ route('warga.create') }}" class="btn btn-primary mb-3">+ Tambah Warga</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No KTP</th><th>Nama</th><th>Jenis Kelamin</th><th>Agama</th>
                <th>Pekerjaan</th><th>Telp</th><th>Email</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warga as $w)
                <tr>
                    <td>{{ $w->no_ktp }}</td>
                    <td>{{ $w->nama }}</td>
                    <td>{{ $w->jenis_kelamin }}</td>
                    <td>{{ $w->agama }}</td>
                    <td>{{ $w->pekerjaan }}</td>
                    <td>{{ $w->telp }}</td>
                    <td>{{ $w->email }}</td>
                    <td>
                        <a href="{{ route('warga.show', $w->warga_id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
