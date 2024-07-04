<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
         $fileName = microtime() . '.' . $request->image->extension();
    Storage::putFileAs('/public/hotel/', $request->image, $fileName);

    Hotel::create([
        "image" => $fileName,
        "nama" => $request->nama,
        "lokasi" => $request->lokasi,
        "penilaian" => $request->penilaian,
        "alamat" => $request->alamat,
        "email" => $request->email
    ]);

    return redirect()->route('hotels.index')->with('success', 'Hotel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }

    public function edit($id)
{
    $hotel = Hotel::findOrFail($id);
    return view('hotels.edit', compact('hotel'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'lokasi' => 'required',
        'alamat' => 'required',
        'email' => 'required|email',
    ]);

    $hotel = Hotel::findOrFail($id);

    $hotelData = [
        'nama' => $request->nama,
        'lokasi' => $request->lokasi,
        'penilaian' => $request->penilaian ?? 0,
        'alamat' => $request->alamat,
        'email' => $request->email,
    ];

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/images', $fileName);
        $hotelData['gambar'] = $fileName;

        // Hapus gambar lama jika ada
        if ($hotel->gambar) {
            Storage::delete('public/images/' . $hotel->gambar);
        }
    }

    $hotel->update($hotelData);

    return redirect()->route('hotels.index')
        ->with('success', 'Data hotel berhasil diperbarui.');
}

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect()->route('hotels.index')
            ->with('success', 'Hotel berhasil dihapus.');
    }
}
