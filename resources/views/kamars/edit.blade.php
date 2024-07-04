@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kamar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kamars.update', $kamar->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="hotel_id">Hotel</label>
                            <select name="hotel_id" id="hotel_id" class="form-control" required>
                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}" {{ $hotel->id == $kamar->hotel_id ? 'selected' : '' }}>{{ $hotel->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kamar">Jenis Kamar</label>
                            <input type="text" name="jenis_kamar" id="jenis_kamar" class="form-control" value="{{ old('jenis_kamar', $kamar->jenis_kamar) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi', $kamar->deskripsi) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="harga_permalam">Harga per Malam</label>
                            <input type="number" name="harga_permalam" id="harga_permalam" class="form-control" value="{{ old('harga_permalam', $kamar->harga_permalam) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('kamars.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
