@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hotel List</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Penilaian</th>
                    <th>Gambar</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->nama }}</td>
                        <td>{{ $hotel->lokasi }}</td>
                        <td>{{ $hotel->penilaian }}</td>
                        <td><img src="{{ $hotel->gambar }}" alt="Hotel Gambar" width="100"></td>
                        <td>{{ $hotel->alamat }}</td>
                        <td>{{ $hotel->email }}</td>
                        <td>
                            <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
