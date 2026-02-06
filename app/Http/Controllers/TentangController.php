<?php
namespace App\Http\Controllers;
use App\Models\Accreditation;
use App\Models\OrganizationStructure;
use App\Models\Profile; 

class TentangController extends Controller
{
    public function akreditasi()
    {
        $accreditations = Accreditation::orderBy('valid_until', 'desc')->get();

        return view('tentang.akreditasi', [
            'accreditations' => $accreditations
        ]);
    }
        public function struktur()
    {
        $top = OrganizationStructure::where('position','pimpinan_univ')
                ->orderBy('order','asc')
                ->first();

        $bottom = OrganizationStructure::where('position','!=','pimpinan_univ')
                ->orderBy('order','asc')
                ->limit(3)
                ->get();

        $all = OrganizationStructure::orderBy('order','asc')->get();

        return view('tentang.struktur', compact('top','bottom','all'));
    }
        public function sejarah()
    {
        $profile = Profile::first(); // ambil data profil kampus

        return view('tentang.sejarah', ['profile' => $profile]);
    }
}
