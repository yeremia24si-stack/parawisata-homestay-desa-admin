@extends('layouts.admin.app')

@section('title', 'Detail Kamar Homestay')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Kamar Homestay</h3>
                    <p class="text-subtitle text-muted">Informasi lengkap tentang kamar homestay.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kamar-homestay.index') }}">Kamar Homestay</a></li>
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
                            <h5 class="card-title">Informasi Kamar</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th width="200">Homestay</th>
                                        <td>: {{ $kamarHomestay->homestay->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Kamar</th>
                                        <td>: {{ $kamarHomestay->nama_kamar }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kapasitas</th>
                                        <td>: {{ $kamarHomestay->kapasitas }} orang</td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>: Rp {{ number_format($kamarHomestay->harga, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fasilitas</th>
                                        <td>: 
                                            @if(is_array($kamarHomestay->fasilitas_json) && count($kamarHomestay->fasilitas_json) > 0)
                                                @foreach($kamarHomestay->fasilitas_json as $fasilitas)
                                                    <span class="badge bg-info">{{ $fasilitas }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-muted">Tidak ada fasilitas</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat pada</th>
                                        <td>: {{ $kamarHomestay->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir diupdate</th>
                                        <td>: {{ $kamarHomestay->updated_at->format('d M Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <a href="{{ route('kamar-homestay.edit', $kamarHomestay->kamar_id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('kamar-homestay.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <form action="{{ route('kamar-homestay.destroy', $kamarHomestay->kamar_id) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
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
                            <h5 class="card-title">Foto Kamar</h5>
                        </div>
                        <div class="card-body">
                            @if($kamarHomestay->media)
                                <img src="{{ asset('storage/' . $kamarHomestay->media) }}" 
                                     alt="{{ $kamarHomestay->nama_kamar }}" 
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
                            <h5 class="card-title">Riwayat Booking ({{ $kamarHomestay->bookings->count() }})</h5>
                        </div>
                        <div class="card-body">
                            @forelse($kamarHomestay->bookings()->latest()->take(5)->get() as $booking)
                                <div class="mb-3 pb-3 border-bottom">
                                    <h6>{{ $booking->warga->name ?? '-' }}</h6>
                                    <small class="text-muted">
                                        {{ $booking->checkin->format('d M Y') }} - {{ $booking->checkout->format('d M Y') }}<br>
                                        Status: <span class="badge bg-{{ $booking->status == 'completed' ? 'success' : 'warning' }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </small>
                                </div>
                            @empty
                                <p class="text-muted text-center">Belum ada booking</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection