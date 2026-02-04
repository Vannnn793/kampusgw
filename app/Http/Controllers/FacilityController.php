<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Faculty;
use App\Models\Profile;
class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::with('faculty')->get();
        $profile = Profile::first();

        return view('tentang.fasilitas', compact('facilities', 'profile'));
    }

    public function byFaculty($slug)
    {
        $faculty = Faculty::where('slug', $slug)->firstOrFail();

        $facilities = Facility::with('faculty')
            ->where('faculty_id', $faculty->id)
            ->get();
        $profile = Profile::first();

        return view('tentang.fasilitas', compact('facilities', 'faculty', 'profile'));
    }
    public function campus()
    {
        $facilities = Facility::whereNull('faculty_id')->get();
        $profile = Profile::first();

        return view('tentang.fasilitas', compact('facilities','profile'));
    }
}
