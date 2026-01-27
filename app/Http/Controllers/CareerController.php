<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $alumni = Alumni::latest()->get();
        return view('careers.index', compact('alumni'));
    }
}
