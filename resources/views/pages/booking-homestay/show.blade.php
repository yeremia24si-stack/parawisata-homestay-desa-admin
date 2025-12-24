@extends('layouts.admin.app')

@section('title', 'Detail Booking Homestay')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Booking Homestay</h3>
                    <p class="text-subtitle text-muted">Informasi lengkap tentang booking homestay.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('booking-homestay.index') }}">Booking Homestay</a></li>
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
                            <h5 class="card-title">Informasi Booking</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th width="200">Booking ID</th>
                                        <td>: #{{ $bookingHomestay->booking_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Homestay</th>
                                        <td>: {{ $bookingHomestay->kamar->homestay->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kamar</th>
                                        <td>: {{ $bookingHomestay->kamar->nama_kamar ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pemesan</th>
                                        <td>: {{ $bookingHomestay->warga->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Check-in</th>
                                        <td>: {{ $bookingHomestay->checkin->format('d M Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Check-out</th>
                                        <td>: {{ $bookingHomestay->checkout->format('d M Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Durasi Menginap</th>
                                        <td>: {{ $bookingHomestay->checkin->diffInDays($bookingHomestay->checkout) }} malam</td>
                                    </tr>
                                    <tr>
                                        <th>Total Pembayaran</th>
                                        <td>: Rp {{ number_format($bookingHomestay->total, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>: 
                                            @php
                                                $statusColors = [
                                                    'pending' => 'warning',
                                                    'confirmed' => 'info',
                                                    'cancelled' => 'danger',
                                                    'completed' => 'success'
                                                ];
                                                $color = $statusColors[$bookingHomestay->status] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $color }}">{{ ucfirst($bookingHomestay->status) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Metode Pembayaran</th>
                                        <td>: {{ $bookingHomestay->metode_bayar ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat pada</th>
                                        <td>: {{ $bookingHomestay->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir diupdate</th>
                                        <td>: {{ $bookingHomestay->updated_at->format('d M Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <a href="{{ route('booking-homestay.edit', $bookingHomestay->booking_id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('booking-homestay.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <form action="{{ route('booking-homestay.destroy', $bookingHomestay->booking_id) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
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
                            <h5 class="card-title">Bukti Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            @if($bookingHomestay->media)
                                <img src="{{ asset('storage/' . $bookingHomestay->media) }}" 
                                     alt="Bukti Pembayaran" 
                                     class="img-fluid rounded">
                            @else
                                <div class="text-center text-muted py-5">
                                    <i class="bi bi-image" style="font-size: 3rem;"></i>
                                    <p class="mt-2">Tidak ada bukti pembayaran</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Info Kamar</h5>
                        </div>
                        <div class="card-body">
                            @if($bookingHomestay->kamar)
                                <h6>{{ $bookingHomestay->kamar->nama_kamar }}</h6>
                                <p class="text-muted mb-2">
                                    <small>
                                        Kapasitas: {{ $bookingHomestay->kamar->kapasitas }} orang<br>
                                        Harga: Rp {{ number_format($bookingHomestay->kamar->harga, 0, ',', '.') }}/malam
                                    </small>
                                </p>
                                @if($bookingHomestay->kamar->media)
                                    <img src="{{ asset('storage/' . $bookingHomestay->kamar->media) }}" 
                                         alt="Kamar" class="img-fluid rounded">
                                @endif
                            @else
                                <p class="text-muted">Info kamar tidak tersedia</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection