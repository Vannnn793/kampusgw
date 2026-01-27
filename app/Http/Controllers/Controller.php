<?php

namespace App\Http\Controllers;
use App\Models\Faculty;

abstract class Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculties.index', compact('faculties'));
    }

    
}
