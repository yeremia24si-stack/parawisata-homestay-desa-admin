<!DOCTYPE html>
<html>
<head>
    <title>Tambah Ulasan Baru</title>
</head>
<body>
    <h1>Tambah Ulasan Wisata</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('ulasan.store') }}">
        @csrf
        <label>Destinasi ID:</label><br>
        <input type="text" name="destinasi_id" value="{{ old('destinasi_id') }}" required><br><br>

        <label>Warga ID:</label><br>
        <input type="number" name="warga_id" value="{{ old('warga_id') }}"><br><br>

        <label>Rating (1-5):</label><br>
        <input type="number" name="rating" min="1" max="5" value="{{ old('rating') }}" required><br><br>

        <label>Komentar:</label><br>
        <textarea name="komentar" required>{{ old('komentar') }}</textarea><br><br>

        <label>Waktu:</label><br>
        <input type="datetime-local" name="waktu" value="{{ old('waktu') }}" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('ulasan.index') }}">← Kembali</a>
</body>
</html>
