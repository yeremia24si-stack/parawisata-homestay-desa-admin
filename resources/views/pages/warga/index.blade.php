@extends('admin.layouts.app')

@section('title', 'Data Warga')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Data Warga</h5>
        <a href="{{ route('admin.warga.create') }}" class="btn btn-primary btn-sm">+ Tambah Warga</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-primary">
            <tr class="text-center">
                <th width="5%">No</th>
                <th>Nama Warga</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Status</th>
                <th width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($wargas as $index => $warga)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $warga->nama }}</td>
                    <td>{{ $warga->alamat }}</td>
                    <td>{{ $warga->no_hp }}</td>
                    <td>
                        <span class="badge bg-success">Aktif</span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.warga.edit', $warga->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <form action="{{ route('admin.warga.destroy', $warga->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data warga</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
