<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function akreditasi()
    {
        $accreditations = Accreditation::orderBy('valid_until', 'desc')->get();

        return view('tentang.akreditasi', compact('accreditations'));
    }
}
