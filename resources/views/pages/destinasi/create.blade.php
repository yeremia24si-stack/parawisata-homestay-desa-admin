@extends('layouts.admin.app')

@section('title', 'Tambah Destinasi Wisata')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Destinasi Wisata</h3>
                <p class="text-subtitle text-muted">Formulir untuk menambah destinasi wisata baru.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('destinasi.index') }}">Daftar Destinasi Wisata</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>


    <section class="section">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Form Tambah Destinasi Wisata</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">

                            {{-- Nama --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Nama Destinasi</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Deskripsi --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- RT - RW --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">RT</label>
                                    <input type="text" name="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ old('rt') }}">
                                    @error('rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">RW</label>
                                    <input type="text" name="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw') }}">
                                    @error('rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Jam Buka --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Jam Buka</label>
                                <input type="text" name="jam_buka" class="form-control @error('jam_buka') is-invalid @enderror" value="{{ old('jam_buka') }}">
                                @error('jam_buka')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Harga Tiket --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Harga Tiket</label>
                                <input type="number" name="tiket" class="form-control @error('tiket') is-invalid @enderror" value="{{ old('tiket') }}">
                                @error('tiket')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kontak --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Kontak</label>
                                <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak') }}">
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Cover Foto --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Cover Foto</label>
                                <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <a href="{{ route('destinasi.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </section>

</div>

@endsection
