<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        $profile = \App\Models\Profile::first();

        return view('faculties.index', ['faculties' => $faculties, 'profile' => $profile]);
    }
    public function show($slug)
    {
        $faculty = Faculty::where('slug', $slug)->firstOrFail();
        $profile = \App\Models\Profile::first();
        $faculty = Faculty::where('slug', $slug)->with('facilities')->first();

        return view('faculties.show',['faculty' => $faculty, 'profile' => $profile , 'facilities' => $faculty->facilities]);
    }
}
