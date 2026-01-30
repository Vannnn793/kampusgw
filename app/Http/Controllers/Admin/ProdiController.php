<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Curriculum;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

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
public function show(Faculty $faculty, Prodi $prodi)
{
    abort_if($prodi->faculty_id !== $faculty->id, 404);

    $prodi->load([
        'faculty',
        'curriculums.courses'
    ]);

    return view('faculties.prodi', compact('prodi'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        // Kita butuh data Fakultas untuk dropdown edit prodi
        $faculties = Faculty::all();
        
        // Kita butuh data kurikulum untuk tab kurikulum
        // Load relation courses agar tidak N+1 query di view
        $curriculums = $prodi->curriculums()->with('courses')->get();

        return view('admin.prodis.kurikulum', compact(
            'prodi',
            'faculties',
            'curriculums'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        // 1. VALIDASI GABUNGAN (Data Prodi + Kurikulum)
        $validated = $request->validate([
            // Validasi Data Prodi
            'faculty_id'  => 'required|exists:faculties,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'goal'        => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            
            // Validasi Kurikulum (Array)
            'courses'     => 'nullable|array' 
        ]);

        // 2. UPDATE DATA PRODI
        $prodiData = [
            'faculty_id'  => $request->faculty_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name), // Update slug jika nama berubah
            'description' => $request->description,
            'goal'        => $request->goal,
        ];

        // Cek jika ada upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($prodi->image) {
                Storage::disk('public')->delete($prodi->image);
            }
            // Simpan gambar baru
            $prodiData['image'] = $request->file('image')->store('prodis', 'public');
        }

        $prodi->update($prodiData);

        // 3. UPDATE KURIKULUM (Logika Loop Semester)
        // Kita cek apakah user mengirim data courses atau tidak
        if ($request->has('courses')) {
            
            foreach ($request->courses as $semester => $courses) {
                
                // Cek apakah di semester ini ada inputan valid (Nama & SKS tidak kosong)
                $hasValidCourse = collect($courses)->contains(function ($c) {
                    return !empty($c['name']) && !empty($c['sks']);
                });

                // Ambil atau Buat Parent Curriculum untuk semester ini
                // Jika tidak ada matkul valid, kita tetap cek curriculum utk jaga-jaga (opsional), 
                // tapi biasanya kita hanya create jika ada matkul.
                // Disini saya buat logic: Delete Old -> Create New (Clean Slate)
                
                $curriculum = Curriculum::firstOrCreate([
                    'prodi_id' => $prodi->id,
                    'semester' => $semester
                ]);

                // Hapus semua matkul lama di semester ini (Reset)
                $curriculum->courses()->delete();

                if ($hasValidCourse) {
                    foreach ($courses as $course) {
                        if (!empty($course['name']) && !empty($course['sks'])) {
                            Course::create([
                                'curriculum_id' => $curriculum->id,
                                'name'          => $course['name'],
                                'sks'           => $course['sks']
                            ]);
                        }
                    }
                } else {
                    // Opsional: Jika semester ini kosong melompong, apakah curriculumnya mau dihapus juga?
                    // $curriculum->delete(); 
                }
            }
        }

        return redirect()->route('admin.prodis.index')->with('success', 'Data Prodi & Kurikulum berhasil diperbarui!');
    }
/**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
