<?php

namespace App\Http\Controllers;

use App\Models\Post; // Pastikan Model Post di-import
use Illuminate\Http\Request;
use App\Models\Faculty;

class lancingController extends Controller
{
    public function index()
    {
        // 1. Ambil data HANYA yang is_slider = 1
        // 2. Gunakan nama variabel '$sliders' agar cocok dengan kode di bawah
        $sliders = Post::where('is_slider', 1)
                        ->latest('published_at') // Urutkan dari yang terbaru
                        ->take(5) // Batasi 5 slide
                        ->get();
        $pmbInfos = \App\Models\PmbInfo::where('is_active', 1)->first(); // Mengambil satu info PMB yang aktif
        $profile = \App\Models\Profile::first();
        $testimoni = \App\Models\Alumni::latest()->take(3)->get();
        $badges = \App\Models\Badge::where('is_active', 1)->get();
        $prodis = \App\Models\Prodi::all();
        $downloads = \App\Models\Download::latest()->take(5)->get();
        $accreditationData = \App\Models\Accreditation::where('program_name', 'Kampus')->first();
    
        // Kalau datanya ada, ambil level-nya. Kalau GAK ADA, tampilin 'Unggul' atau '-'
        $accreditationLevel = $accreditationData ? $accreditationData->level : 'Unggul';
        
        $totalAlumni = \App\Models\Alumni::count();
    
        // Hitung yang sudah punya nama perusahaan (dianggap sudah kerja)
        $bekerjaCount = \App\Models\Alumni::whereNotNull('perusahaan')
                                        ->where('perusahaan', '!=', '')
                                        ->count();

        // Rumus Hiring Rate
        $hiringRate = $totalAlumni > 0 ? round(($bekerjaCount / $totalAlumni) * 100) : 0;

        $taglines = \App\Models\Tagline::all();

        // PENTING: Perhatikan bagian compact('sliders')
        // Ini artinya kita kirim data ke view dengan nama "$sliders"
        return view('landing',[
        'faculties'  => Faculty::all(),
        'partners'   => \App\Models\Partner::all(),
        'categories' => \App\Models\Category::all(),
        'posts'      => Post::latest()->take(6)->get(),
        'sliders'    => $sliders,
        'pmbInfos'   => $pmbInfos,
        'profile'    => $profile,
        'testimoni'  => $testimoni,
        'badges' => $badges,
        'prodis' => $prodis,
        'downloads' => $downloads,
        'accreditationLevel' => $accreditationLevel,
        'hiringRate' => $hiringRate,
        'totalAlumni' => $totalAlumni,
        'taglines' => $taglines,
        
        ]); 
    }
}