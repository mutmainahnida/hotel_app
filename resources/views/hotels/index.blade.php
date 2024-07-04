@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Hotel</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('hotels.create') }}" class="btn btn-primary">Tambah Hotel Baru</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Penilaian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->nama }}</td>
                    <td>{{ $hotel->lokasi }}</td>
                    <td>{{ $hotel->penilaian }}</td>
                    <td>
                        <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus hotel ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
