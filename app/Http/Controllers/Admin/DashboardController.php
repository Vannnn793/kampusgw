<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Prodi;
use App\Models\Alumni;
use App\Models\Partner;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'facultyCount' => Faculty::count(),
            'prodiCount'   => Prodi::count(),
            'alumniCount'  => Alumni::count(),
            'partnerCount' => Partner::count(),
        ]);
    }
}
