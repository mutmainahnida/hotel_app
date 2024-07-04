@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Kamar</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('kamars.create') }}" class="btn btn-primary mb-3">Tambah Kamar</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Kamar</th>
                                <th>Deskripsi</th>
                                <th>Harga per Malam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kamars as $kamar)
                                <tr>
                                    <td>{{ $kamar->id }}</td>
                                    <td>{{ $kamar->jenis_kamar }}</td>
                                    <td>{{ $kamar->deskripsi }}</td>
                                    <td>{{ $kamar->harga_permalam }}</td>
                                    <td>
                                        <a href="{{ route('kamars.show', $kamar->id) }}" class="btn btn-info">Detail</a>
                                        <a href="{{ route('kamars.edit', $kamar->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('kamars.destroy', $kamar->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
