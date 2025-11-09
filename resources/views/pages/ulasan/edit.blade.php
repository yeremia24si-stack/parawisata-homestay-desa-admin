@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Ulasan</h3>
    <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Rating</label>
            <input type="number" name="rating" class="form-control" value="{{ $ulasan->rating }}">
        </div>
        <div class="mb-3">
            <label>Komentar</label>
            <textarea name="komentar" class="form-control">{{ $ulasan->komentar }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
