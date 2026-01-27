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
        'faculty_id' => 'required|exists:faculties,id',
        'prodi_id' => 'required|exists:prodis,id',
        'tahun_akademik' => 'required',
    ]);

    Admission::create($request->all());

    return redirect()->back()
        ->with('success','Pendaftar berhasil masuk sistem!');
}

public function adminIndex()
{
    $admissions = Admission::with(['faculty','prodi'])->latest()->get();
    return view('admin.admission.index', compact('admissions'));
}
}