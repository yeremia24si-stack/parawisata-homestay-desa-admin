@extends('layouts.admin.app')

@section('title', 'Tambah Warga')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Warga</h3>
                <p class="text-subtitle text-muted">Formulir untuk menambah warga baru.</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Daftar Warga</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <section class="section">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Form Tambah Warga</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">

                            {{-- NO KTP --}}
                            <div class="form-group mb-3">
                                <label for="no_ktp" class="form-label">No KTP</label>
                                <input type="text"
                                       id="no_ktp"
                                       name="no_ktp"
                                       value="{{ old('no_ktp') }}"
                                       class="form-control @error('no_ktp') is-invalid @enderror"
                                       required>
                                @error('no_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- NAMA --}}
                            <div class="form-group mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text"
                                       id="nama"
                                       name="nama"
                                       value="{{ old('nama') }}"
                                       class="form-control @error('nama') is-invalid @enderror"
                                       required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- JENIS KELAMIN --}}
                            <div class="form-group mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin"
                                        name="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan'?'selected':'' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- AGAMA --}}
                            <div class="form-group mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text"
                                       id="agama"
                                       name="agama"
                                       value="{{ old('agama') }}"
                                       class="form-control @error('agama') is-invalid @enderror">
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- PEKERJAAN --}}
                            <div class="form-group mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text"
                                       id="pekerjaan"
                                       name="pekerjaan"
                                       value="{{ old('pekerjaan') }}"
                                       class="form-control @error('pekerjaan') is-invalid @enderror">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- TELP --}}
                            <div class="form-group mb-3">
                                <label for="telp" class="form-label">Telp</label>
                                <input type="text"
                                       id="telp"
                                       name="telp"
                                       value="{{ old('telp') }}"
                                       class="form-control @error('telp') is-invalid @enderror">
                                @error('telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- EMAIL --}}
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <a href="{{ route('warga.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </section>

</div>

@endsection
