@extends('layouts.admin.app')

@section('title', 'Daftar User')

@push('css')
    {{-- Tambahkan CSS tambahan jika diperlukan --}}
@endpush

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar User</h3>
                <p class="text-subtitle text-muted">Menampilkan semua data user di sistem.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <section class="section">
        <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Tabel User</h4>

                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg"></i> Tambah User
                    </a>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($users as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ ucfirst($u->role) }}</td>

                                    <td>

                                        <a href="{{ route('user.show', $u->id) }}"
                                            class="btn btn-info btn-sm" title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('user.edit', $u->id) }}"
                                            class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('user.destroy', $u->id) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Tidak ada data user.</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </section>

</div>

@endsection

@push('js')
    {{-- (Opsional) Datatables --}}
    {{-- <script>
        $(document).ready(function() {
            $('#table-data').DataTable();
        });
    </script> --}}
@endpush
