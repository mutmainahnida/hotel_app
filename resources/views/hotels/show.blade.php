@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Hotel</h2>

    <div class="card">
        <div class="card-header">{{ $hotel->nama }}</div>
        <div class="card-body">
            <p>Lokasi: {{ $hotel->lokasi }}</p>
            <p>Penilaian: {{ $hotel->penilaian }}</p>
            <p>Alamat: {{ $hotel->alamat }}</p>
            <p>Email: {{ $hotel->email }}</p>
            @if ($hotel->image)
                <img src="{{ asset('storage/images' . $hotel->image) }}" alt="Hotel Image" style="max-width: 200px; max-height: 200px; margin-bottom: 10px;">
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus hotel ini?')">Hapus</button>
            </form>
            <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
