<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Faculty;
use App\Models\Prodi;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
{
    $faculties = Faculty::all();
    $prodis = Prodi::all();
    $alumni = Alumni::with(['faculty','prodi'])->get();

    return view('admin.alumni.index', compact('faculties','prodis','alumni'));
}
    public function create()
    {
        $faculties = Faculty::with('prodi')->get();

        return view('admin.alumni.create', compact('faculties'));
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'faculty_id' => 'required',
        'prodi_id' => 'required',
        'company' => 'nullable',
        'position' => 'nullable',
        'pesan_kesan' => 'nullable',
        'photo' => 'nullable|image|max:2048'
    ]);

    $data = [
        'name' => $request->name,
        'faculty_id' => $request->faculty_id,
        'prodi_id' => $request->prodi_id,
        'company' => $request->company,
        'position' => $request->position,
        'pesan_kesan' => $request->pesan_kesan,
    ];

    // upload foto
    if ($request->hasFile('photo')) {

        $file = $request->file('photo');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('alumni', $filename, 'public');

        $data['photo'] = $path;
    }

    Alumni::create($data);

    return redirect()
        ->route('admin.alumni.index')
        ->with('success','Alumni berhasil ditambahkan!');
}

    public function getProdi($faculty_id)
{
    return Prodi::where('faculty_id', $faculty_id)->get();
}


}
