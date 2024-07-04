@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Hotel Baru</h2>

    <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Hotel</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>

        <div class="form-group">
            <label for="penilaian">Penilaian</label>
            <input type="number" class="form-control" id="penilaian" name="penilaian" value="0">
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
