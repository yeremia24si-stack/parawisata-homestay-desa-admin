@extends('layouts.admin.app')

@section('title', 'Edit Homestay')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Homestay</h3>
                    <p class="text-subtitle text-muted">Form untuk mengubah data homestay.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('homestay.index') }}">Daftar Homestay</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Form Edit Homestay</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('homestay.update', $homestay->homestay_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama" class="form-label">Nama Homestay <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                           id="nama" name="nama" value="{{ old('nama', $homestay->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="pemilik_warga_id" class="form-label">Pemilik <span class="text-danger">*</span></label>
                                    <select class="form-select @error('pemilik_warga_id') is-invalid @enderror" 
                                            id="pemilik_warga_id" name="pemilik_warga_id" required>
                                        <option value="">Pilih Pemilik</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" 
                                                {{ old('pemilik_warga_id', $homestay->pemilik_warga_id) == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pemilik_warga_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                      id="alamat" name="alamat" rows="3" required>{{ old('alamat', $homestay->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="rt" class="form-label">RT <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('rt') is-invalid @enderror" 
                                           id="rt" name="rt" value="{{ old('rt', $homestay->rt) }}" required>
                                    @error('rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="rw" class="form-label">RW <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('rw') is-invalid @enderror" 
                                           id="rw" name="rw" value="{{ old('rw', $homestay->rw) }}" required>
                                    @error('rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Fasilitas</label>
                            @php
                                $fasilitas = is_array($homestay->fasilitas_json) ? $homestay->fasilitas_json : [];
                            @endphp
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas_json[]" 
                                               value="WiFi" id="wifi" {{ in_array('WiFi', $fasilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="wifi">WiFi</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas_json[]" 
                                               value="AC" id="ac" {{ in_array('AC', $fasilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ac">AC</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas_json[]" 
                                               value="TV" id="tv" {{ in_array('TV', $fasilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tv">TV</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas_json[]" 
                                               value="Parkir" id="parkir" {{ in_array('Parkir', $fasilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="parkir">Parkir</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="harga_per_malam" class="form-label">Harga per Malam <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('harga_per_malam') is-invalid @enderror" 
                                           id="harga_per_malam" name="harga_per_malam" 
                                           value="{{ old('harga_per_malam', $homestay->harga_per_malam) }}" required>
                                    @error('harga_per_malam')
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
                                        <option value="tersedia" {{ old('status', $homestay->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="penuh" {{ old('status', $homestay->status) == 'penuh' ? 'selected' : '' }}>Penuh</option>
                                        <option value="maintenance" {{ old('status', $homestay->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="media" class="form-label">Foto Cover</label>
                            @if($homestay->media)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $homestay->media) }}" alt="Current" width="150" class="rounded">
                                    <p class="text-muted small">Foto saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('media') is-invalid @enderror" 
                                   id="media" name="media" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                            @error('media')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update
                            </button>
                            <a href="{{ route('homestay.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection