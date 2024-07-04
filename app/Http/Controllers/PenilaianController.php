<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penilaians = penilaian::with('penilaian')->get();
        return view('penilaians.index', compact('penilaians'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        $hotels = Hotel::all();
        return view('kamars.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'penilaian' => 'required|integer|min:1|max:5',
            'teks_penilaian' => 'nullable|string',
        ]);

        Penilaian::create([
            'hotel_id' => $request->hotel_id,
            'penilaian' => $request->penilaian,
            'teks_penilaian' => $request->teks_penilaian,
        ]);

        return redirect()->route('penilaians.index')->with('success', 'Penilaian baru berhasil ditambahkan.');
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
        $penilaian = Penilaian::findOrFail($id);
        // Jika diperlukan, tambahkan logic untuk mengambil data hotel terkait
        // Contoh: $hotel = $penilaian->hotel;
        return view('penilaian.edit', compact('penilaian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'penilaian' => 'required|integer',
            'teks_penilaian' => 'required|string',
        ]);

        $penilaian = Penilaian::findOrFail($id);
        $penilaian->update($request->all());

        return redirect()->route('penilaian.edit', $penilaian->id)
                         ->with('success', 'Penilaian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->delete();

        return redirect()->route('penilaians.index')->with('success', 'Penilaian berhasil dihapus.');
    }
}