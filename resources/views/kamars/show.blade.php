@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Kamar</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="hotel_id">Hotel</label>
                        <input type="text" id="hotel_id" class="form-control" value="{{ $kamar->hotel->nama }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kamar">Jenis Kamar</label>
                        <input type="text" id="jenis_kamar" class="form-control" value="{{ $kamar->jenis_kamar }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" class="form-control" rows="3" readonly>{{ $kamar->deskripsi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="harga_permalam">Harga per Malam</label>
                        <input type="number" id="harga_permalam" class="form-control" value="{{ $kamar->harga_permalam }}" readonly>
                    </div>

                    <a href="{{ route('kamars.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
