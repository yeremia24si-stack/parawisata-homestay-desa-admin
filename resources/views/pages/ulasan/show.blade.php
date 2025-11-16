@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Detail Ulasan</h3>

    <div class="card">
        <div class="card-body">

            <div class="mb-3">
                <label class="fw-bold">Nama Warga:</label><br>
                {{ $ulasan->warga->nama ?? '-' }}
            </div>

            <div class="mb-3">
                <label class="fw-bold">Rating:</label><br>
                {{ $ulasan->rating }} / 5
            </div>

            <div class="mb-3">
                <label class="fw-bold">Komentar:</label><br>
                {{ $ulasan->komentar }}
            </div>

            <div class="mt-3">
                <a href="{{ route('ulasan.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('ulasan.edit', $ulasan->ulasan_id) }}" class="btn btn-primary">Edit</a>
            </div>

        </div>
    </div>

</div>
@endsection
