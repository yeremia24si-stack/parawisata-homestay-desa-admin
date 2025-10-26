<!DOCTYPE html>
<html>
<head>
    <title>Detail Warga</title>
</head>
<body>
    <h1>Detail Data Warga</h1>

    <p><strong>Nama:</strong> {{ $warga->nama }}</p>
    <p><strong>Alamat:</strong> {{ $warga->alamat }}</p>
    <p><strong>No HP:</strong> {{ $warga->no_hp }}</p>

    <a href="{{ route('warga.edit', $warga->id) }}">Edit</a> |
    <a href="{{ route('warga.index') }}">Kembali</a>
</body>
</html>
