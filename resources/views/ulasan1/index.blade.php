<h2>Daftar Ulasan Wisata</h2>
<a href="{{ route('ulasan.create') }}">+ Tambah Ulasan</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Destinasi</th>
        <th>Warga</th>
        <th>Rating</th>
        <th>Komentar</th>
        <th>Waktu</th>
        <th>Aksi</th>
    </tr>
    @foreach($ulasan as $u)
    <tr>
        <td>{{ $u['id'] }}</td>
        <td>{{ $u['destinasi'] }}</td>
        <td>{{ $u['warga'] }}</td>
        <td>{{ $u['rating'] }}</td>
        <td>{{ $u['komentar'] }}</td>
        <td>{{ $u['waktu'] }}</td>
        <td>
            <a href="{{ route('ulasan.edit', $u['id']) }}">Edit</a> | 
            <a href="{{ route('ulasan.destroy', $u['id']) }}">Hapus</a>
        </td>
    </tr>
    @endforeach
</table>
