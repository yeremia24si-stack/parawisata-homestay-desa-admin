<!DOCTYPE html>
<html>
<head>
    <title>Data Warga</title>
</head>
<body>
    <h1>Data Warga</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Form tambah data --}}
    <form method="POST" action="{{ url('/warga') }}">
        @csrf
        <input type="text" name="nama" placeholder="Nama" required><br>
        <input type="text" name="alamat" placeholder="Alamat" required><br>
        <input type="text" name="no_hp" placeholder="No HP" required><br>
        <button type="submit">Tambah</button>
    </form>

    <hr>

    {{-- Tabel data warga --}}
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th> {{-- kolom baru --}}
        </tr>
        @foreach($wargas as $w)
        <tr>
            <td>{{ $w->id }}</td>
            <td>{{ $w->nama }}</td>
            <td>{{ $w->alamat }}</td>
            <td>{{ $w->no_hp }}</td>
            <td>
                {{-- Tombol hapus --}}
                <form action="{{ url('/warga/' . $w->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
