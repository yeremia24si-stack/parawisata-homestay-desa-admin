<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
</head>
<body>
    <h1>Edit Data Warga</h1>

    <form method="POST" action="{{ route('warga.update', $warga->id) }}">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $warga->nama }}" required><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="{{ $warga->alamat }}" required><br><br>

        <label>No HP:</label><br>
        <input type="text" name="no_hp" value="{{ $warga->no_hp }}" required><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('warga.index') }}">← Kembali</a>
</body>
</html>
