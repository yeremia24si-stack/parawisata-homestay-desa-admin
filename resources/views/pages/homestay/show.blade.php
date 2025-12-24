@extends('layouts.admin.app')

@section('title', 'Detail Homestay')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Homestay</h3>
                    <p class="text-subtitle text-muted">Informasi lengkap tentang homestay.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('homestay.index') }}">Daftar Homestay</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Informasi Homestay</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th width="200">Nama Homestay</th>
                                        <td>: {{ $homestay->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pemilik</th>
                                        <td>: {{ $homestay->pemilik->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>: {{ $homestay->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>RT / RW</th>
                                        <td>: {{ $homestay->rt }} / {{ $homestay->rw }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fasilitas</th>
                                        <td>: 
                                            @if(is_array($homestay->fasilitas_json) && count($homestay->fasilitas_json) > 0)
                                                @foreach($homestay->fasilitas_json as $fasilitas)
                                                    <span class="badge bg-info">{{ $fasilitas }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-muted">Tidak ada fasilitas</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga per Malam</th>
                                        <td>: Rp {{ number_format($homestay->harga_per_malam, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>: 
                                            <span class="badge bg-{{ $homestay->status == 'tersedia' ? 'success' : ($homestay->status == 'penuh' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($homestay->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat pada</th>
                                        <td>: {{ $homestay->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir diupdate</th>
                                        <td>: {{ $homestay->updated_at->format('d M Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <a href="{{ route('homestay.edit', $homestay->homestay_id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('homestay.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <form action="{{ route('homestay.destroy', $homestay->homestay_id) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus homestay ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Foto Cover</h5>
                        </div>
                        <div class="card-body">
                            @if($homestay->media)
                                <img src="{{ asset('storage/' . $homestay->media) }}" 
                                     alt="{{ $homestay->nama }}" 
                                     class="img-fluid rounded">
                            @else
                                <div class="text-center text-muted py-5">
                                    <i class="bi bi-image" style="font-size: 3rem;"></i>
                                    <p class="mt-2">Tidak ada foto</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daftar Kamar ({{ $homestay->kamar->count() }})</h5>
                        </div>
                        <div class="card-body">
                            @forelse($homestay->kamar as $kamar)
                                <div class="mb-3 pb-3 border-bottom">
                                    <h6>{{ $kamar->nama_kamar }}</h6>
                                    <small class="text-muted">
                                        Kapasitas: {{ $kamar->kapasitas }} orang<br>
                                        Harga: Rp {{ number_format($kamar->harga, 0, ',', '.') }}
                                    </small>
                                </div>
                            @empty
                                <p class="text-muted text-center">Belum ada kamar</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection