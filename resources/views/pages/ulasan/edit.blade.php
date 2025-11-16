@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Ulasan</h3>

    <form action="{{ route('ulasan.update', $ulasan->ulasan_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Warga</label>
            <select name="warga_id" class="form-control">
                @foreach($warga as $w)
                    <option value="{{ $w->warga_id }}" 
                        {{ $ulasan->warga_id == $w->warga_id ? 'selected' : '' }}>
                        {{ $w->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Rating</label>
            <input type="number" name="rating" class="form-control" min="1" max="5"
                   value="{{ $ulasan->rating }}" required>
        </div>

        <div class="mb-3">
            <label>Komentar</label>
            <textarea name="komentar" class="form-control" required>{{ $ulasan->komentar }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
