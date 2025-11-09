@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Data Ulasan Wisata</h3>
    <a href="{{ route('ulasan.create') }}" class="btn btn-primary mb-3">+ Tambah Ulasan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Warga</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ulasan as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->warga->nama }}</td>
                    <td>{{ $u->rating }}</td>
                    <td>{{ $u->komentar }}</td>
                    <td>
                        <a href="{{ route('ulasan.show', $u->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('ulasan.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
