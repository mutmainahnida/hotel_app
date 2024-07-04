<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();

        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'penilaian' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string',
            'email' => 'required|email|max:255',
        ]);

        $hotel = Hotel::findOrFail($id);
        
        // Mengisi model dengan data dari form
        $hotel->nama = $request->nama;
        $hotel->lokasi = $request->lokasi;
        $hotel->penilaian = $request->penilaian;
        $hotel->alamat = $request->alamat;
        $hotel->email = $request->email;

        // Mengelola file gambar jika ada upload baru
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $hotel->gambar = $imageName;
        }

        // Menyimpan data hotel yang telah diubah
        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Hotel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
