@extends('layouts.admin.app')

@section('title', 'Daftar Ulasan Wisata')

@push('css')
    {{-- CSS tambahan jika diperlukan --}}
@endpush

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Ulasan Wisata</h3>
                <p class="text-subtitle text-muted">Menampilkan semua data ulasan wisata.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Ulasan Wisata
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
                    <h4 class="card-title">Tabel Ulasan Wisata</h4>

                    <a href="{{ route('ulasan.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg"></i> Tambah Ulasan
                    </a>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Warga</th>
                                <th>Rating</th>
                                <th>Komentar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($ulasan as $u)
                                <tr>
                                    {{-- NOMOR URUT PAGINATION --}}
                                    <td>{{ $ulasan->firstItem() + $loop->index }}</td>
                                    <td>{{ $u->warga->nama }}</td>
                                    <td>{{ $u->rating }}</td>
                                    <td>{{ Str::limit($u->komentar, 60) }}</td>

                                    <td>
                                        <a href="{{ route('ulasan.show', $u->id) }}"
                                           class="btn btn-info btn-sm" title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('ulasan.edit', $u->id) }}"
                                           class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('ulasan.destroy', $u->id) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus ulasan ini?');">
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
                                    <td colspan="5" class="text-center text-muted">
                                        Tidak ada data.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- pagination di luar table --}}
            <div class="d-flex justify-content-end mt-3">
                {{ $ulasan->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </section>

</div>

@endsection

@push('js')
    {{-- JS tetap, tidak diubah --}}
@endpush
