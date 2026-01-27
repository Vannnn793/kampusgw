<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::latest()->get();
        return view('admin.faculties.index', compact('faculties'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'facilities' => 'nullable',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('faculties', 'public');
        }

        $validated['slug'] = Str::slug($validated['name']);

        Faculty::create($validated);

        return redirect()->back()->with('success', 'Faculty berhasil ditambahkan');
    }
    

    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('admin.faculties.edit', compact('faculty'));
    }

    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'facilities' => 'nullable',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'vision' => $request->vision,
            'mission' => $request->mission,
            'facilities' => $request->facilities,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('faculties', 'public');
        }

        $faculty->update($data);

        return redirect()->route('admin.faculties.index')
            ->with('success', 'Faculty berhasil diupdate');
    }

    public function show(Faculty $faculty)
    {
        $faculty->load('prodis');
        return view('faculties.show', compact('faculty'));
    }
}
