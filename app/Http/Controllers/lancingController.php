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
        $pmbInfos = \App\Models\PmbInfo::where('is_active', 1)->get();
        $profile = \App\Models\Profile::first();

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
        ]); 
    }
}