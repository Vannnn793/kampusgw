<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Prodi;
use App\Models\Alumni;
use App\Models\Partner;
use App\Models\Post;;
use App\Models\Category;
use App\Models\OrganizationStructure as Structure;

class DashboardController extends Controller
{
    public function index()
    {
         $posts = Post::with('category')->latest()->get();
        $categories = Category::all();
        return view('admin.dashboard', [
            'facultyCount' => Faculty::count(),
            'prodiCount'   => Prodi::count(),
            'alumniCount'  => Alumni::count(),
            'partnerCount' => Partner::count(),
            'posts'        => $posts,
            'categories'   => $categories,
            'structures'   => Structure::all(),
            'facilities'   => \App\Models\Facility::all(),
            'accreditations' => \App\Models\Accreditation::all(),
        ]);
    }
}
