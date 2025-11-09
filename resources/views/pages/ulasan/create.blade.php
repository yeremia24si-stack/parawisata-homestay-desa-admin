@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Ulasan</h3>
    <form action="{{ route('ulasan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Warga</label>
            <select name="warga_id" class="form-control">
                @foreach($warga as $w)
                    <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Rating</label>
            <input type="number" name="rating" class="form-control" min="1" max="5">
        </div>
        <div class="mb-3">
            <label>Komentar</label>
            <textarea name="komentar" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
