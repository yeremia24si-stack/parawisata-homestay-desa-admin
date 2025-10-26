<!DOCTYPE html>
<html>
<head>
    <title>Edit Ulasan</title>
</head>
<body>
    <h1>Edit Ulasan Wisata</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('ulasan.update', $ulasan->id) }}">
        @csrf
        @method('PUT')

        <label>Destinasi ID:</label><br>
        <input type="text" name="destinasi_id" value="{{ $ulasan->destinasi_id }}" required><br><br>

        <label>Warga ID:</label><br>
        <input type="number" name="warga_id" value="{{ $ulasan->warga_id }}"><br><br>

        <label>Rating (1-5):</label><br>
        <input type="number" name="rating" min="1" max="5" value="{{ $ulasan->rating }}" required><br><br>

        <label>Komentar:</label><br>
        <textarea name="komentar" required>{{ $ulasan->komentar }}</textarea><br><br>

        <label>Waktu:</label><br>
        <input type="datetime-local" name="waktu" value="{{ date('Y-m-d\TH:i', strtotime($ulasan->waktu)) }}" required><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('ulasan.index') }}">← Kembali</a>
</body>
</html>
