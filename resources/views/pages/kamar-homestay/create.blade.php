@extends('layouts.admin.app')

@section('title', 'Tambah Kamar Homestay')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Kamar Homestay</h3>
                    <p class="text-subtitle text-muted">Form untuk menambahkan kamar homestay baru.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kamar-homestay.index') }}">Kamar Homestay</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Form Kamar Homestay</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kamar-homestay.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="homestay_id" class="form-label">Homestay <span class="text-danger">*</span></label>
                            <select class="form-select @error('homestay_id') is-invalid @enderror" 
                                    id="homestay_id" name="homestay_id" required>
                                <option value="">Pilih Homestay</option>
                                @foreach($homestays as $homestay)
                                    <option value="{{ $homestay->homestay_id }}" {{ old('homestay_id') == $homestay->homestay_id ? 'selected' : '' }}>
                                        {{ $homestay->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama_kamar" class="form-label">Nama Kamar <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_kamar') is-invalid @enderror" 
                                   id="nama_kamar" name="nama_kamar" value="{{ old('nama_kamar') }}" required>
                            @error('nama_kamar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kapasitas" class="form-label">Kapasitas <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('kapasitas') is-invalid @enderror" 
                                           id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}" min="1" required>
                                    @error('kapasitas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                                           id="harga" name="harga" value="{{ old('harga') }}" min="0" required>
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Fasilitas</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas_json[]" value="Kasur" id="kasur">
                                        <label class="form-check-label" for="kasur">Kasur</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas_json[]" value="Lemari" id="lemari">
                                        <label class="form-check-label" for="lemari">Lemari</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas_json[]" value="AC" id="ac_kamar">
                                        <label class="form-check-label" for="ac_kamar">AC</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas_json[]" value="Kamar Mandi Dalam" id="km">
                                        <label class="form-check-label" for="km">Kamar Mandi Dalam</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="media" class="form-label">Foto Kamar</label>
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
                            <a href="{{ route('kamar-homestay.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection