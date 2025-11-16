@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">

    <h3>Detail Destinasi</h3>

    <a href="{{ route('destinasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card p-3">

        <div class="row">
            <div class="col-md-4">
                @if($data->cover)
                    <img src="{{ asset('uploads/destinasi/'.$data->cover) }}" class="img-fluid rounded mb-3">
                @else
                    <img src="https://via.placeholder.com/300x200?text=Tidak+ada+foto" class="img-fluid rounded mb-3">
                @endif
            </div>

            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $data->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <th>RT / RW</th>
                        <td>{{ $data->rt }} / {{ $data->rw }}</td>
                    </tr>
                    <tr>
                        <th>Jam Buka</th>
                        <td>{{ $data->jam_buka }}</td>
                    </tr>
                    <tr>
                        <th>Harga Tiket</th>
                        <td>Rp {{ number_format($data->tiket, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Kontak</th>
                        <td>{{ $data->kontak }}</td>
                    </tr>
                </table>

                <a href="{{ route('destinasi.edit', $data->destinasi_id) }}" class="btn btn-warning">
                    Edit Data
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
