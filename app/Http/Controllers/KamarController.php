<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::with('hotel')->get();
        return view('kamars.index', compact('kamars'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('kamars.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'jenis_kamar' => 'required',
            'deskripsi' => 'required',
            'harga_permalam' => 'required|numeric',
        ]);

        Kamar::create($request->all());

        return redirect()->route('kamars.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kamar = Kamar::with('hotel')->findOrFail($id);
        return view('kamars.show', compact('kamar'));
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        $hotels = Hotel::all();
        return view('kamars.edit', compact('kamar', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'jenis_kamar' => 'required',
            'deskripsi' => 'required',
            'harga_permalam' => 'required|numeric',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->all());

        return redirect()->route('kamars.index')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamars.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
