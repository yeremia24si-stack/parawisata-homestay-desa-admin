@extends('layouts.admin.app')

@section('title', 'Daftar Kamar Homestay')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Kamar Homestay</h3>
                    <p class="text-subtitle text-muted">Menampilkan semua data kamar homestay.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kamar Homestay</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-9">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari data..."
                    value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Tabel Kamar Homestay
                        <a href="{{ route('kamar-homestay.create') }}" class="btn btn-primary btn-sm float-end">
                            <i class="bi bi-plus-circle"></i> Tambah Data
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Homestay</th>
                                    <th>Nama Kamar</th>
                                    <th>Kapasitas</th>
                                    <th>Harga</th>
                                    <th>Cover</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kamars as $index => $kamar)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $kamar->homestay->nama ?? '-' }}</td>
                                        <td>{{ $kamar->nama_kamar }}</td>
                                        <td>{{ $kamar->kapasitas }} orang</td>
                                        <td>Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                                        <td>
                                            @if($kamar->media)
                                                <img src="{{ asset('storage/' . $kamar->media) }}" alt="Cover" width="60" class="rounded">
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('kamar-homestay.show', $kamar->kamar_id) }}" class="btn btn-info btn-sm" title="Detail">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('kamar-homestay.edit', $kamar->kamar_id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('kamar-homestay.destroy', $kamar->kamar_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data tidak ditemukan.</td>
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
    <script src="{{ asset('assets-admin/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endpush