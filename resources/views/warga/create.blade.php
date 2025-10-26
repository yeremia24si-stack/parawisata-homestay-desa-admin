<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
</head>
<body>
    <h1>Tambah Data Warga</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('warga.store') }}">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}" required><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="{{ old('alamat') }}" required><br><br>

        <label>No HP:</label><br>
        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('warga.index') }}">← Kembali</a>
</body>
</html>
