@extends('layouts.admin.app')

@section('title', 'Detail User')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail User</h3>
                <p class="text-subtitle text-muted">Informasi lengkap mengenai user.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Daftar User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail User</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>


    <section class="section">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Data User</h4>
            </div>

            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px">ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ $user->role ?? '-' }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('user.index') }}" class="btn btn-light-secondary">Kembali</a>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                </div>

            </div>

        </div>
    </section>

</div>

@endsection
