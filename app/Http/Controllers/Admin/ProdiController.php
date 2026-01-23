<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.prodis.index', [
            'prodis' => Prodi::with('faculty')->get(),
            'faculties' => Faculty::all()
        ]);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'faculty_id' => 'required|exists:faculties,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'goal' => 'nullable|string',
        'curriculum' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // slug aman walau nama sama
    $validated['slug'] = Str::slug($validated['name']) . '-' . uniqid();

    // image (kalau ada)
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')
            ->store('prodis', 'public');
    }

    Prodi::create($validated);

    return redirect()->back()->with('success', 'Prodi berhasil ditambahkan');
}/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
