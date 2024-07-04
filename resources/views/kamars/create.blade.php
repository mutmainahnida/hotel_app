<!-- resources/views/kamars/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kamar Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kamars.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="hotel_id">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="form-control" required>
                <option value="">Pilih Hotel</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jenis_kamar">Jenis Kamar</label>
            <input type="text" name="jenis_kamar" id="jenis_kamar" class="form-control" value="{{ old('jenis_kamar') }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group">
            <label for="harga_permalam">Harga Per Malam</label>
            <input type="number" name="harga_permalam" id="harga_permalam" class="form-control" value="{{ old('harga_permalam') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kamars.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
