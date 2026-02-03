<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function show($slug)
    {
        $faculty = Faculty::where('slug', $slug)->firstOrFail();

        return view('faculties.show', compact('faculty'));
    }
}
