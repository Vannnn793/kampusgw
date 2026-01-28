<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    // Memproses data input
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'description' => 'nullable|string',
        ]);

        // 2. Handle Upload Gambar (Jika ada)
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder 'public/facilities'
            $imagePath = $request->file('image')->store('facilities', 'public');
            $validatedData['image'] = $imagePath;
        }

        // 3. Simpan ke Database
        Facility::create($validatedData);

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->route('admin.facilities.create')->with('success', 'Fasilitas berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facilities.edit', compact('facility'));
    }

    // 5. UPDATE: Memproses perubahan data
    public function update(Request $request, string $id)
    {
        $facility = Facility::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Cek apakah user upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($facility->image) {
                Storage::disk('public')->delete($facility->image);
            }
            // Simpan gambar baru
            $validatedData['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($validatedData);

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    // 6. DESTROY: Menghapus data dan gambar
    public function destroy(string $id)
    {
        $facility = Facility::findOrFail($id);

        // Hapus gambar dari storage sebelum hapus data di DB
        if ($facility->image) {
            Storage::disk('public')->delete($facility->image);
        }

        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}
