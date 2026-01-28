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
            'nama'        => 'required|string|max:255',
            'faculty_id'  => 'required|exists:faculties,id',
            'prodi_id'    => 'required|exists:prodis,id',
            'perusahaan'  => 'nullable|string|max:255',
            'jabatan'     => 'nullable|string|max:255',
            'pesan_kesan' => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama'        => $request->nama,
            'faculty_id'  => $request->faculty_id,
            'prodi_id'    => $request->prodi_id,
            'perusahaan'  => $request->perusahaan,
            'jabatan'     => $request->jabatan,
            'pesan_kesan' => $request->pesan_kesan,
        ];

        // Upload foto
        if ($request->hasFile('foto')) {

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('alumni', $filename, 'public');

            $data['foto'] = $path;
        }

        Alumni::create($data);

        return redirect()
            ->route('admin.alumni.index')
            ->with('success', 'Alumni berhasil ditambahkan!');
    }
    public function getProdi($faculty_id)
{
    return Prodi::where('faculty_id', $faculty_id)->get();
}


}
