@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Edit User</h3>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" class="form-control mb-2" value="{{ $user->name }}">
        <input type="email" name="email" class="form-control mb-2" value="{{ $user->email }}">
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
