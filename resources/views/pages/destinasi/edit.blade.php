@extends('layouts.admin.app')

@section('title', 'Edit Destinasi')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Destinasi</h3>
                <p class="text-subtitle text-muted">Form untuk mengedit data destinasi wisata.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('destinasi.index') }}">Daftar Destinasi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <section class="section">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Form Edit Destinasi</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('destinasi.update', $data->destinasi_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">

                            {{-- NAMA DESTINASI --}}
                            <div class="form-group mb-3">
                                <label for="nama" class="form-label">Nama Destinasi</label>
                                <input type="text"
                                       id="nama"
                                       name="nama"
                                       class="form-control @error('nama') is-invalid @enderror"
                                       value="{{ old('nama', $data->nama) }}"
                                       required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- DESKRIPSI --}}
                            <div class="form-group mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi"
                                          name="deskripsi"
                                          rows="4"
                                          class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ALAMAT --}}
                            <div class="form-group mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text"
                                       id="alamat"
                                       name="alamat"
                                       class="form-control @error('alamat') is-invalid @enderror"
                                       value="{{ old('alamat', $data->alamat) }}"
                                       required>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- RT & RW --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <input type="text"
                                           id="rt"
                                           name="rt"
                                           class="form-control @error('rt') is-invalid @enderror"
                                           value="{{ old('rt', $data->rt) }}">
                                    @error('rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="rw" class="form-label">RW</label>
                                    <input type="text"
                                           id="rw"
                                           name="rw"
                                           class="form-control @error('rw') is-invalid @enderror"
                                           value="{{ old('rw', $data->rw) }}">
                                    @error('rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- JAM BUKA --}}
                            <div class="form-group mb-3">
                                <label for="jam_buka" class="form-label">Jam Buka</label>
                                <input type="text"
                                       id="jam_buka"
                                       name="jam_buka"
                                       class="form-control @error('jam_buka') is-invalid @enderror"
                                       value="{{ old('jam_buka', $data->jam_buka) }}">
                                @error('jam_buka')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- HARGA TIKET --}}
                            <div class="form-group mb-3">
                                <label for="tiket" class="form-label">Harga Tiket</label>
                                <input type="number"
                                       id="tiket"
                                       name="tiket"
                                       class="form-control @error('tiket') is-invalid @enderror"
                                       value="{{ old('tiket', $data->tiket) }}">
                                @error('tiket')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- KONTAK --}}
                            <div class="form-group mb-3">
                                <label for="kontak" class="form-label">Kontak</label>
                                <input type="text"
                                       id="kontak"
                                       name="kontak"
                                       class="form-control @error('kontak') is-invalid @enderror"
                                       value="{{ old('kontak', $data->kontak) }}">
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- COVER --}}
                            <div class="form-group mb-3">
                                <label for="cover" class="form-label">Cover Foto</label>
                                <input type="file"
                                       id="cover"
                                       name="cover"
                                       class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if($data->cover)
                                    <img src="{{ asset('uploads/destinasi/' . $data->cover) }}"
                                         width="150"
                                         class="img-thumbnail mt-2">
                                @endif
                            </div>

                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <a href="{{ route('destinasi.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection
