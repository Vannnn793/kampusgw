<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Curriculum;
use App\Models\Course;

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
    $prodis = Prodi::all();
    $curriculums = $prodi->curriculums()->with('courses')->get();

    return view('admin.prodis.kurikulum', compact(
        'prodi',
        'prodis',
        'curriculums'
    ));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $request->validate([
        'prodi_id' => 'required|exists:prodis,id',
        'courses'  => 'required|array'
    ]);

    foreach ($request->courses as $semester => $courses) {

        // cek ada matkul valid atau nggak
        $hasValidCourse = false;
        foreach ($courses as $course) {
            if (!empty($course['name']) && !empty($course['sks'])) {
                $hasValidCourse = true;
                break;
            }
        }
        if (!$hasValidCourse) continue;

        // ambil / buat curriculum
        $curriculum = Curriculum::firstOrCreate([
            'prodi_id' => $request->prodi_id,
            'semester' => $semester
        ]);

        // 🔥 HAPUS MATKUL LAMA SEMESTER INI
        $curriculum->courses()->delete();

        // simpan matkul baru
        foreach ($courses as $course) {
            if (empty($course['name']) || empty($course['sks'])) {
                continue;
            }

            Course::create([
                'curriculum_id' => $curriculum->id,
                'name' => $course['name'],
                'sks'  => $course['sks']
            ]);
        }
    }

    return back()->with('success', 'Kurikulum berhasil diperbarui 🔥');
}
/**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
