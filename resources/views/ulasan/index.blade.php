<!DOCTYPE html>
<html>
<head>
    <title>Daftar Ulasan Wisata</title>
</head>
<body>
    <h1>Daftar Ulasan Wisata</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('ulasan.create') }}">+ Tambah Ulasan Baru</a>
    <hr>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Destinasi ID</th>
            <th>Warga ID</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
        @forelse($ulasans as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->destinasi_id }}</td>
            <td>{{ $u->warga_id }}</td>
            <td>{{ $u->rating }}</td>
            <td>{{ $u->komentar }}</td>
            <td>{{ $u->waktu }}</td>
            <td>
                <a href="{{ route('ulasan.show', $u->id) }}">Lihat</a> |
                <a href="{{ route('ulasan.edit', $u->id) }}">Edit</a> |
                <form action="{{ route('ulasan.destroy', $u->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus ulasan ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" align="center">Belum ada ulasan.</td></tr>
        @endforelse
    </table>
</body>
</html>
