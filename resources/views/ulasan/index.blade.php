<!DOCTYPE html>
<html>
<head>
    <title>Ulasan Wisata</title>
</head>
<body>
    <h1>Ulasan Wisata</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ url('/ulasan') }}">
        @csrf
        <input type="text" name="destinasi_id" placeholder="Destinasi ID" required><br>
        <input type="number" name="warga_id" placeholder="Warga ID"><br>
        <input type="number" name="rating" placeholder="Rating (1-5)" required><br>
        <textarea name="komentar" placeholder="Komentar" required></textarea><br>
        <input type="datetime-local" name="waktu" required><br>
        <button type="submit">Tambah</button>
    </form>

    <hr>

    <table border="1">
        <tr>
            <th>ID</th><th>Destinasi</th><th>Warga</th><th>Rating</th><th>Komentar</th><th>Waktu</th>
        </tr>
        @foreach($ulasans as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->destinasi_id }}</td>
            <td>{{ $u->warga_id }}</td>
            <td>{{ $u->rating }}</td>
            <td>{{ $u->komentar }}</td>
            <td>{{ $u->waktu }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
