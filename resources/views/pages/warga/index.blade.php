@extends('layouts.admin.app')

@section('title', 'Daftar Warga')

@section('content')
<div class="page-heading">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Warga</h3>
                <p class="text-subtitle text-muted">Menampilkan semua data warga.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Warga
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Tabel Warga</h4>
                    <a href="{{ route('warga.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg"></i> Tambah Warga
                    </a>
                </div>
            </div>

            <div class="card-body">

                {{-- SEARCH --}}
                <form method="GET" class="row g-2 mb-3">
                    <div class="col-md-9">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama atau No KTP..."
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No KTP</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Pekerjaan</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse ($warga as $w)
                            <tr>
                                <td>{{ $warga->firstItem() + $loop->index }}</td>
                                <td>{{ $w->no_ktp }}</td>
                                <td>{{ $w->nama }}</td>
                                <td>{{ $w->jenis_kelamin }}</td>
                                <td>{{ $w->agama }}</td>
                                <td>{{ $w->pekerjaan }}</td>
                                <td>{{ $w->telp }}</td>
                                <td>{{ $w->email }}</td>
                                <td>
                                    <a href="{{ route('warga.show', $w->warga_id) }}"
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>

                                    <a href="{{ route('warga.edit', $w->warga_id) }}"
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    <form action="{{ route('warga.destroy', $w->warga_id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data warga ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">
                                    Tidak ada data warga.
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="d-flex justify-content-end mt-3">
                    {{ $warga->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
