@extends('layouts.admin.app')

@section('title', 'Daftar Homestay')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Homestay</h3>
                    <p class="text-subtitle text-muted">Menampilkan semua data homestay.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Homestay</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari homestay..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    @foreach(['tersedia','penuh','maintenance'] as $s)
                        <option value="{{ $s }}" {{ request('status')==$s?'selected':'' }}>
                            {{ ucfirst($s) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Filter</button>
            </div>
        </form>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Tabel Homestay
                        <a href="{{ route('homestay.create') }}" class="btn btn-primary btn-sm float-end">
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
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Pemilik</th>
                                    <th>Harga/Malam</th>
                                    <th>Status</th>
                                    <th>Cover</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($homestays as $index => $homestay)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $homestay->nama }}</td>
                                        <td>{{ Str::limit($homestay->alamat, 30) }}</td>
                                        <td>{{ $homestay->pemilik->name ?? '-' }}</td>
                                        <td>Rp {{ number_format($homestay->harga_per_malam, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $homestay->status == 'tersedia' ? 'success' : ($homestay->status == 'penuh' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($homestay->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($homestay->media)
                                                <img src="{{ asset('storage/' . $homestay->media) }}" alt="Cover" width="60" class="rounded">
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('homestay.show', $homestay->homestay_id) }}" class="btn btn-info btn-sm" title="Detail">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('homestay.edit', $homestay->homestay_id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('homestay.destroy', $homestay->homestay_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                                        <td colspan="8" class="text-center">Data tidak ditemukan.</td>
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