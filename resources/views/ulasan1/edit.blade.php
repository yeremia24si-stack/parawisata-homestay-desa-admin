<h2>Edit Ulasan</h2>
<form action="{{ route('ulasan.update', $ulasan['id']) }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $ulasan['id'] }}">
    <label>Destinasi: </label>
    <input type="text" name="destinasi" value="{{ $ulasan['destinasi'] }}"><br>
    <label>Warga: </label>
    <input type="text" name="warga" value="{{ $ulasan['warga'] }}"><br>
    <label>Rating: </label>
    <input type="number" name="rating" min="1" max="5" value="{{ $ulasan['rating'] }}"><br>
    <label>Komentar: </label>
    <textarea name="komentar">{{ $ulasan['komentar'] }}</textarea><br>
    <button type="submit">Update</button>
</form>
<a href="{{ route('ulasan.index') }}">Kembali</a>
