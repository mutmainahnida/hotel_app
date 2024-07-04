@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Penilaian Hotel</h1>
    <a href="{{ route('penilaians.create') }}" class="btn btn-primary">Tambah Penilaian</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hotel</th>
                <th>Penilaian</th>
                <th>Teks Penilaian</th>
                <th>Dibuat Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penilaians as $penilaian)
            <tr>
                <td>{{ $penilaian->id }}</td>
                <td>{{ $penilaian->hotel->nama }}</td>
                <td>{{ $penilaian->penilaian }}</td>
                <td>{{ $penilaian->teks_penilaian }}</td>
                <td>{{ $penilaian->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection