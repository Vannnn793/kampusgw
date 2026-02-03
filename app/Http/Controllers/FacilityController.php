<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Faculty;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::with('faculty')->get();

        return view('tentang.fasilitas', compact('facilities'));
    }

    public function byFaculty($slug)
    {
        $faculty = Faculty::where('slug', $slug)->firstOrFail();

        $facilities = Facility::with('faculty')
            ->where('faculty_id', $faculty->id)
            ->get();

        return view('tentang.fasilitas', compact('facilities', 'faculty'));
    }
}
