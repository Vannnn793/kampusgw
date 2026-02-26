<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $alumni = Alumni::where('status','approved')->latest()->get();
        $profile = \App\Models\Profile::first();

        return view('careers.index', compact('alumni', 'profile'));
    }

    public function create()
    {
        $faculties = \App\Models\Faculty::all();
        $prodis = \App\Models\Prodi::all();
        return view('careers.alumnicreate', compact('faculties','prodis'));
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
            'email'       => 'required|email',
            'no_telpon'   => 'required',
            'nim'         => 'required|string|max:255',
            'tahun_lulus' => 'required|integer'
        ]);

        $data = [
            'nama'        => $request->nama,
            'faculty_id'  => $request->faculty_id,
            'prodi_id'    => $request->prodi_id,
            'perusahaan'  => $request->perusahaan,
            'jabatan'     => $request->jabatan,
            'pesan_kesan' => $request->pesan_kesan,
            'email'       => $request->email,
            'no_telpon'   => $request->no_telpon,
            'nim'         => $request->nim,
            'tahun_lulus' => $request->tahun_lulus
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
            ->route('careers')
            ->with('success', 'Alumni berhasil ditambahkan! dan sedang direview oleh admin');
    }
    public function getProdi($faculty_id)
{
    // Ambil prodi yang faculty_id nya cocok
    $prodi = \App\Models\Prodi::where('faculty_id', $faculty_id)->get();
    
    // Kirim balik sebagai JSON
    return response()->json($prodi);
}
}
