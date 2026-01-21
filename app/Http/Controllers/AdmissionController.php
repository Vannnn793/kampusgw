<?php

namespace App\Http\Controllers;
use App\Models\Admission;
use App\Models\Admissions;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
{
    $faculties = Faculty::with('prodis')->get();
    return view('admissions.index', compact('faculties'));
}

public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required',
        'email' => 'required|email',
        'no_hp' => 'required',
        'prodi_id' => 'required|exists:prodis,id',
        'faculty_id' => 'required|exists:faculties,id',
        'tahun_akademik' => 'required',
    ]);

    Admissions::create($request->all());

    return back()->with('success', 'Pendaftaran berhasil');
}
}
