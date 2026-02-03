<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $faculties = Faculty::with('prodis')->get();
        $profile = \App\Models\Profile::first();

        return view('admissions.index', compact('faculties', 'profile'));
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

        try {
            Admission::create($request->all());

            return redirect()->back()
                ->with('success', 'Pendaftaran berhasil dikirim!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan, coba lagi.');
        }
    }

    public function adminIndex(Request $request)
    {
        $years = Admission::select('tahun_akademik')
                ->distinct()
                ->orderBy('tahun_akademik', 'desc')
                ->pluck('tahun_akademik');

    // 2. Tentukan tahun yang dipilih.
    // Jika user memilih filter, pakai itu. Jika tidak, pakai tahun terbaru.
    $selectedYear = $request->input('year') ?? $years->first();

    // 3. Ambil data Admission sesuai tahun yang dipilih
    $admissions = Admission::with(['prodi', 'faculty']) // Pastikan relasi diload biar cepat
                ->where('tahun_akademik', $selectedYear)
                ->latest()
                ->get(); 
                // Bisa ganti ->paginate(10) kalau datanya banyak banget
        return view('admin.admission.index', compact('admissions', 'years', 'selectedYear'));
    }
    public function destroy($id)
    {
        try {
            $admission = Admission::findOrFail($id);
            $admission->delete();

            return redirect()->route('admin.admissions.index')
                ->with('success', 'Data calon mahasiswa berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data.');
        }
    }
    
}
