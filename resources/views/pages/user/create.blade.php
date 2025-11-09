@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah User</h3>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <input type="text" name="name" class="form-control mb-2" placeholder="Nama">
        <input type="email" name="email" class="form-control mb-2" placeholder="Email">
        <input type="password" name="password" class="form-control mb-2" placeholder="Password">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
