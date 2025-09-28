<h2>Tambah Ulasan Baru</h2>
<form action="{{ route('ulasan.store') }}" method="POST">
    @csrf
    <label>Destinasi: </label>
    <input type="text" name="destinasi"><br>
    <label>Warga: </label>
    <input type="text" name="warga"><br>
    <label>Rating: </label>
    <input type="number" name="rating" min="1" max="5"><br>
    <label>Komentar: </label>
    <textarea name="komentar"></textarea><br>
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('ulasan.index') }}">Kembali</a>
