<!DOCTYPE html>
<html>
<head>
    <title>Detail Ulasan</title>
</head>
<body>
    <h1>Detail Ulasan #{{ $ulasan->id }}</h1>

    <p><strong>Destinasi ID:</strong> {{ $ulasan->destinasi_id }}</p>
    <p><strong>Warga ID:</strong> {{ $ulasan->warga_id }}</p>
    <p><strong>Rating:</strong> {{ $ulasan->rating }}</p>
    <p><strong>Komentar:</strong> {{ $ulasan->komentar }}</p>
    <p><strong>Waktu:</strong> {{ $ulasan->waktu }}</p>

    <a href="{{ route('ulasan.edit', $ulasan->id) }}">Edit</a> |
    <a href="{{ route('ulasan.index') }}">Kembali</a>
</body>
</html>
