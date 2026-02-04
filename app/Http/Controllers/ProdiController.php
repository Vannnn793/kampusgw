<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Prodi;

class ProdiController extends Controller
{
    /**
     * DETAIL PRODI (PUBLIC)
     * URL: /{faculty}/prodis/{prodi}
     */
    public function show(Faculty $faculty, Prodi $prodi)
    {
        // Pastikan prodi milik faculty (security + validasi URL)
        if ($prodi->faculty_id !== $faculty->id) {
            abort(404);
        }

        // Load semua relasi yang dipakai blade
        $prodi->load([
            'faculty',
            'curriculums.courses'
        ]);

        return view('faculties.prodi', compact('faculty', 'prodi'));
    }
}
