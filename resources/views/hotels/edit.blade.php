@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Hotel</h2>

    <form method="POST" action="{{ route('hotels.update', $hotel->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Hotel</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $hotel->nama }}" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $hotel->lokasi }}" required>
        </div>

        <div class="form-group">
            <label for="penilaian">Penilaian</label>
            <input type="number" class="form-control" id="penilaian" name="penilaian" value="{{ $hotel->penilaian }}">
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            @if ($hotel->gambar)
                <img src="{{ asset('storage/images/' . $hotel->gambar) }}" alt="Hotel Image" style="max-width: 200px; max-height: 200px; margin-bottom: 10px;">
            @endif
            <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $hotel->alamat }}</textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $hotel->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
