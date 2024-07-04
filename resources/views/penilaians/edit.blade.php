
@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('penilaian.update', $penilaian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="penilaian">Penilaian:</label>
                <input type="number" class="form-control" id="penilaian" name="penilaian" value="{{ $penilaian->penilaian }}">
            </div>

            <div class="form-group">
                <label for="teks_penilaian">Teks Penilaian:</label>
                <textarea class="form-control" id="teks_penilaian" name="teks_penilaian">{{ $penilaian->teks_penilaian }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
