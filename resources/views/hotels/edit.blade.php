// resources/views/hotels/edit.blade.php

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Hotel</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('hotels.update', $hotel->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama Hotel</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $hotel->nama) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $hotel->lokasi) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="penilaian">Penilaian</label>
                            <input type="number" name="penilaian" id="penilaian" class="form-control" value="{{ old('penilaian', $hotel->penilaian) }}">
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file">
                            @if ($hotel->gambar)
                                <img src="{{ asset('images/' . $hotel->gambar) }}" alt="Gambar Hotel" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $hotel->alamat) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $hotel->email) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

