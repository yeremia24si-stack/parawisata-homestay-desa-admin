<!DOCTYPE html>
<html>
<head>
    <title>Data Warga</title>
</head>
<body>
    <h1>Data Warga</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('warga.create') }}">+ Tambah Warga Baru</a>
    <hr>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        @forelse($wargas as $w)
        <tr>
            <td>{{ $w->id }}</td>
            <td>{{ $w->nama }}</td>
            <td>{{ $w->alamat }}</td>
            <td>{{ $w->no_hp }}</td>
            <td>
                <a href="{{ route('warga.show', $w->id) }}">Lihat</a> |
                <a href="{{ route('warga.edit', $w->id) }}">Edit</a> |
                <form action="{{ route('warga.destroy', $w->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" align="center">Belum ada data warga.</td></tr>
        @endforelse
    </table>
</body>
</html>
