

@extends('layouts.app') <!-- Misalkan menggunakan layout Blade yang umum -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Penilaian Baru</div>

                    <div class="card-body">
                        <form action="{{ route('penilaians.store') }}" method="POST">
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
                                <label for="penilaian">Penilaian</label>
                                <input type="number" id="penilaian" name="penilaian" class="form-control" min="1" max="5" required>
                            </div>

                            <div class="form-group">
                                <label for="teks_penilaian">Teks Penilaian</label>
                                <textarea id="teks_penilaian" name="teks_penilaian" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
