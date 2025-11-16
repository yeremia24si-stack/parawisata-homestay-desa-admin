@extends('layouts.admin.app')

@section('title', 'Daftar Destinasi Wisata')

@push('css')
    {{-- Tambahkan CSS tambahan jika diperlukan --}}
@endpush

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Destinasi Wisata</h3>
                <p class="text-subtitle text-muted">Menampilkan semua data destinasi wisata.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Destinasi Wisata</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <section class="section">
        <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Tabel Destinasi Wisata</h4>

                    <a href="{{ route('destinasi.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg"></i> Tambah Data
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
                                <th>Alamat</th>
                                <th>Tiket</th>
                                <th>Cover</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>Rp {{ number_format($d->tiket, 0) }}</td>

                                    <td>
                                        @if($d->cover)
                                            <img src="{{ asset('uploads/destinasi/'.$d->cover) }}" width="80">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('destinasi.show', $d->destinasi_id) }}"
                                            class="btn btn-info btn-sm" title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('destinasi.edit', $d->destinasi_id) }}"
                                            class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('destinasi.destroy', $d->destinasi_id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Hapus destinasi ini?');">
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
                                    <td colspan="6" class="text-center text-muted">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                {{-- Pagination jika diperlukan --}}
                <div class="mt-3">
                    {{-- {{ $data->links() }} --}}
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

@push('js')
    {{-- JS tambahan jika butuh datatables --}}
    {{-- <script>
        $(document).ready(function() {
            $('#table-data').DataTable();
        });
    </script> --}}
@endpush
