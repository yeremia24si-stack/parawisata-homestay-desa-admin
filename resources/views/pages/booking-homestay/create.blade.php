@extends('layouts.admin.app')

@section('title', 'Tambah Booking Homestay')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Booking Homestay</h3>
                    <p class="text-subtitle text-muted">Form untuk menambahkan booking homestay baru.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('booking-homestay.index') }}">Booking Homestay</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Form Booking Homestay</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('booking-homestay.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="kamar_id" class="form-label">Kamar <span class="text-danger">*</span></label>
                            <select class="form-select @error('kamar_id') is-invalid @enderror" 
                                    id="kamar_id" name="kamar_id" required>
                                <option value="">Pilih Kamar</option>
                                @foreach($kamars as $kamar)
                                    <option value="{{ $kamar->kamar_id }}" {{ old('kamar_id') == $kamar->kamar_id ? 'selected' : '' }}>
                                        {{ $kamar->nama_kamar }} - {{ $kamar->homestay->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kamar_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="warga_id" class="form-label">Pemesan <span class="text-danger">*</span></label>
                            <select class="form-select @error('warga_id') is-invalid @enderror" 
                                    id="warga_id" name="warga_id" required>
                                <option value="">Pilih Pemesan</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('warga_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('warga_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="checkin" class="form-label">Tanggal Check-in <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('checkin') is-invalid @enderror" 
                                           id="checkin" name="checkin" value="{{ old('checkin') }}" required>
                                    @error('checkin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="checkout" class="form-label">Tanggal Check-out <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('checkout') is-invalid @enderror" 
                                           id="checkout" name="checkout" value="{{ old('checkout') }}" required>
                                    @error('checkout')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="total" class="form-label">Total Pembayaran <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('total') is-invalid @enderror" 
                                           id="total" name="total" value="{{ old('total') }}" min="0" required>
                                    @error('total')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="metode_bayar" class="form-label">Metode Pembayaran</label>
                            <input type="text" class="form-control @error('metode_bayar') is-invalid @enderror" 
                                   id="metode_bayar" name="metode_bayar" value="{{ old('metode_bayar') }}" 
                                   placeholder="Contoh: Transfer Bank, Cash, E-Wallet">
                            @error('metode_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="media" class="form-label">Bukti Pembayaran</label>
                            <input type="file" class="form-control @error('media') is-invalid @enderror" 
                                   id="media" name="media" accept="image/*">
                            @error('media')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                            <a href="{{ route('booking-homestay.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection