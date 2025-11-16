@extends('layouts.admin.app')

@section('title', 'Edit Data Warga')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Warga</h3>
                <p class="text-subtitle text-muted">Form untuk memperbarui data warga.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Daftar Warga</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>


    <section class="section">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Form Edit Data Warga</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-12">

                            {{-- No KTP --}}
                            <div class="form-group mb-3">
                                <label class="form-label">No KTP</label>
                                <input type="text"
                                       name="no_ktp"
                                       value="{{ $warga->no_ktp }}"
                                       class="form-control @error('no_ktp') is-invalid @enderror"
                                       required>
                                @error('no_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nama --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text"
                                       name="nama"
                                       value="{{ $warga->nama }}"
                                       class="form-control @error('nama') is-invalid @enderror"
                                       required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Agama --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Agama</label>
                                <input type="text"
                                       name="agama"
                                       value="{{ $warga->agama }}"
                                       class="form-control @error('agama') is-invalid @enderror">
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Pekerjaan --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text"
                                       name="pekerjaan"
                                       value="{{ $warga->pekerjaan }}"
                                       class="form-control @error('pekerjaan') is-invalid @enderror">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Telp --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Telp</label>
                                <input type="text"
                                       name="telp"
                                       value="{{ $warga->telp }}"
                                       class="form-control @error('telp') is-invalid @enderror">
                                @error('telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                       name="email"
                                       value="{{ $warga->email }}"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <a href="{{ route('warga.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>

                </form>

            </div>

        </div>
    </section>

</div>

@endsection
