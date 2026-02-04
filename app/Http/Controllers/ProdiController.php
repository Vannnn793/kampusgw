<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function show(Faculty $faculty, Prodi $prodi)
    {
        // validasi relasi
        if ($prodi->faculty_id !== $faculty->id) {
            abort(404);
        }

        return view('faculties.prodi', compact('faculty', 'prodi'));
    }
}
