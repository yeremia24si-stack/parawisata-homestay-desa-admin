@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Detail Ulasan</h3>
    <table class="table table-bordered">
        <tr><th>Warga</th><td>{{ $ulasan->warga->nama }}</td></tr>
        <tr><th>Rating</th><td>{{ $ulasan->rating }}</td></tr>
        <tr><th>Komentar</th><td>{{ $ulasan->komentar }}</td></tr>
    </table>
    <a href="{{ route('ulasan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
