<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $alumni = Alumni::latest()->get();
        $profile = \App\Models\Profile::first();

        return view('careers.index', compact('alumni', 'profile'));
    }
}
