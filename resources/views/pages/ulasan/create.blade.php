@extends('layouts.admin.app')

@section('title', 'Tambah Ulasan')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Ulasan</h3>
                <p class="text-subtitle text-muted">Formulir untuk menambah ulasan baru.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ulasan.index') }}">Daftar Ulasan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Tambah Ulasan</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('ulasan.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">

                            {{-- WARGA --}}
                            <div class="form-group mb-3">
                                <label for="warga_id" class="form-label">Warga</label>
                                <select name="warga_id" id="warga_id" class="form-select @error('warga_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach($warga as $w)
                                        <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                                    @endforeach
                                </select>
                                @error('warga_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- RATING --}}
                            <div class="form-group mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" 
                                       name="rating" 
                                       id="rating" 
                                       class="form-control @error('rating') is-invalid @enderror" 
                                       min="1" max="5" required>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- KOMENTAR --}}
                            <div class="form-group mb-3">
                                <label for="komentar" class="form-label">Komentar</label>
                                <textarea 
                                    name="komentar" 
                                    id="komentar" 
                                    rows="4" 
                                    class="form-control @error('komentar') is-invalid @enderror"
                                ></textarea>
                                @error('komentar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <a href="{{ route('ulasan.index') }}" class="btn btn-light-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </section>
</div>

@endsection
