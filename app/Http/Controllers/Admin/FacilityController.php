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
        $facilities = Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = \App\Models\Faculty::all();
        $taglines = \App\Models\Tagline::all();
        // $facility = Facility::all();
        return view('admin.facilities.create', compact('faculties', 'taglines'));
    }

    // Memproses data input
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'faculty_id' => 'nullable|exists:faculties,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'description' => 'nullable|string',
            'taglines' => 'array',
            'taglines.*' => 'exists:taglines,id',
        ]);

        // 2. Handle Upload Gambar (Jika ada)
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder 'public/facilities'
            $imagePath = $request->file('image')->store('facilities', 'public');
            $validatedData['image'] = $imagePath;
        }

        // 3. Simpan ke Database

        if($request->has('taglines')){
            $facility = Facility::create($validatedData);
            $facility->taglines()->attach($request->taglines);
        }

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
        $faculties = \App\Models\Faculty::all();
        $taglines = \App\Models\Tagline::all();
        return view('admin.facilities.edit', compact('facility', 'faculties', 'taglines'));
    }

    // 5. UPDATE: Memproses perubahan data
    public function update(Request $request, string $id)
    {
        $facility = Facility::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'faculty_id' => 'nullable|exists:faculties,id',
            'taglines' => 'array',
            'taglines.*' => 'exists:taglines,id',
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

        // Update taglines
        if($request->has('taglines')){
            $facility->taglines()->sync($request->taglines);
        }

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    // 6. DESTROY: Menghapus data dan gambar
    public function destroy(string $id)
    {
        $facility = Facility::findOrFail($id);

        // Hapus gambar dari storage sebelum hapus data di DB
        if ($facility->image) {
            Storage::disk('public')->delete($facility->image);
        }

        // Hapus relasi taglines sebelum menghapus fasilitas
        $facility->taglines()->detach();

        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}
