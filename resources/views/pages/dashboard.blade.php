@extends('layouts.admin.app')

@section('title', 'Dashboard Pariwisata Homestay Desa')

@section('content')
    <div class="page-heading">
        <h3>Dashboard Pariwisata Homestay Desa</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                {{-- STATISTIK UTAMA --}}
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldLocation"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Destinasi Wisata</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalDestinasi }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldHome"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Homestay</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalHomestay }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldTicket"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Booking</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalBooking }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldStar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Ulasan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalUlasan }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CHART BOOKING --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Statistik Booking Tahun {{ date('Y') }}</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-booking"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TOP DESTINASI & HOMESTAY --}}
                <div class="row">
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Top 5 Destinasi Wisata</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Destinasi</th>
                                                <th>Ulasan</th>
                                                <th>Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($topDestinasi as $destinasi)
                                                <tr>
                                                    <td>{{ $destinasi->destinasi }}</td>
                                                    <td><span class="badge bg-info">{{ $destinasi->total_ulasan }}</span></td>
                                                    <td>
                                                        <span class="badge bg-warning">⭐ {{ number_format($destinasi->rata_rating, 1) }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted">Belum ada data ulasan</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Top 5 Homestay Terfavorit</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Homestay</th>
                                                <th>Total Booking</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($topHomestay as $homestay)
                                                <tr>
                                                    <td>{{ $homestay->nama }}</td>
                                                    <td><span class="badge bg-success">{{ $homestay->total_booking }} booking</span></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="text-center text-muted">Belum ada data booking</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ULASAN TERBARU --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ulasan Terbaru</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Pengguna</th>
                                                <th>Destinasi</th>
                                                <th>Rating</th>
                                                <th>Komentar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($ulasanTerbaru as $ulasan)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md bg-primary">
                                                                <span class="text-white fw-bold">
                                                                    {{ substr($ulasan->warga->nama ?? 'U', 0, 1) }}
                                                                </span>
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0">{{ $ulasan->warga->nama ?? 'Unknown' }}</p>
                                                        </div>
                                                    </td>
                                                    <td>{{ $ulasan->destinasi }}</td>
                                                    <td>
                                                        <span class="badge bg-warning">⭐ {{ $ulasan->rating }}</span>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">{{ Str::limit($ulasan->komentar, 50) }}</p>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">Belum ada ulasan</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SIDEBAR KANAN --}}
            <div class="col-12 col-lg-3">
                {{-- PENDAPATAN --}}
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="text-center">
                            <div class="avatar avatar-xl bg-success mb-3">
                                <i class="bi bi-cash-stack text-white" style="font-size: 2rem;"></i>
                            </div>
                            <div class="name">
                                <h6 class="text-muted mb-1">Total Pendapatan</h6>
                                <h5 class="font-bold text-success">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h5>
                            </div>
                            <hr>
                            <div class="name">
                                <h6 class="text-muted mb-1">Bulan Ini</h6>
                                <h6 class="font-bold">Rp {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- STATUS BOOKING --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Status Booking</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Pending</span>
                                <span class="badge bg-warning">{{ $bookingPending }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" style="width: {{ $totalBooking > 0 ? ($bookingPending/$totalBooking)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Confirmed</span>
                                <span class="badge bg-info">{{ $bookingConfirmed }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-info" style="width: {{ $totalBooking > 0 ? ($bookingConfirmed/$totalBooking)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Completed</span>
                                <span class="badge bg-success">{{ $bookingCompleted }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" style="width: {{ $totalBooking > 0 ? ($bookingCompleted/$totalBooking)*100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between mb-1">
                                <span>Cancelled</span>
                                <span class="badge bg-danger">{{ $bookingCancelled }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: {{ $totalBooking > 0 ? ($bookingCancelled/$totalBooking)*100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- STATUS HOMESTAY --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Status Homestay</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-homestay-status"></div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tersedia</span>
                                <span class="badge bg-success">{{ $homestayTersedia }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Penuh</span>
                                <span class="badge bg-warning">{{ $homestayPenuh }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Maintenance</span>
                                <span class="badge bg-danger">{{ $homestayMaintenance }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BOOKING TERBARU --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Booking Terbaru</h4>
                    </div>
                    <div class="card-content pb-4">
                        @forelse($bookingTerbaru as $booking)
                            <div class="recent-message d-flex px-4 py-3 border-bottom">
                                <div class="avatar avatar-lg bg-primary">
                                    <span class="text-white fw-bold">
                                        {{ substr($booking->warga->nama ?? 'U', 0, 1) }}
                                    </span>
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">{{ $booking->warga->nama ?? 'Unknown' }}</h5>
                                    <h6 class="text-muted mb-0">{{ $booking->kamar->homestay->nama ?? '-' }}</h6>
                                    <small class="text-muted">{{ $booking->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @empty
                            <div class="px-4 py-3 text-center text-muted">
                                <p>Belum ada booking</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets-admin/vendors/apexcharts/apexcharts.js') }}"></script>
    <script>
        // Chart Booking per Bulan
        var optionsBooking = {
            series: [{
                name: 'Booking',
                data: @json($chartData)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#435ebe'],
            xaxis: {
                categories: @json($chartLabels)
            },
            dataLabels: {
                enabled: false
            },
            title: {
                text: 'Total Booking per Bulan',
                align: 'left'
            }
        };
        var chartBooking = new ApexCharts(document.querySelector("#chart-booking"), optionsBooking);
        chartBooking.render();

        // Chart Homestay Status (Donut)
        var optionsHomestay = {
            series: [{{ $homestayTersedia }}, {{ $homestayPenuh }}, {{ $homestayMaintenance }}],
            chart: {
                type: 'donut',
                height: 250
            },
            labels: ['Tersedia', 'Penuh', 'Maintenance'],
            colors: ['#198754', '#ffc107', '#dc3545'],
            legend: {
                show: false
            }
        };
        var chartHomestay = new ApexCharts(document.querySelector("#chart-homestay-status"), optionsHomestay);
        chartHomestay.render();
    </script>
@endpush