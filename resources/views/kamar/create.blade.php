@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Kamar Baru</div>

                    <div class="card-body">
                        <form action="{{ route('kamar.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="hotel_id">Hotel</label>
                                <select name="hotel_id" id="hotel_id" class="form-control">
                                    @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}">{{ $hotel->nama_hotel }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kamar">Jenis Kamar</label>
                                <input type="text" id="jenis_kamar" name="jenis_kamar" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="harga_permalam">Harga per Malam</label>
                                <input type="number" id="harga_permalam" name="harga_permalam" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
