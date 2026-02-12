@extends('layout.main')
@section('title', 'Fasilitas Kampus')

@section('content')

{{-- ================= HERO SECTION (BLUE THEME) ================= --}}
<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    {{-- 1. Background Image --}}
    <div class="absolute inset-0">
        <img 
            src="{{ $profile && $profile->gambar_kampus ? asset('storage/'.$profile->gambar_kampus) : asset('storage/images/default-campus.jpg') }}" 
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Latar Belakang Kampus" 
        >
        {{-- Overlay Biru Tua (Konsisten) --}}
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    {{-- 2. Konten Hero --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-500/20 border border-sky-300/30 backdrop-blur-md text-sky-100 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-300 animate-pulse"></span>
            Campus Infrastructure
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight animate-fade-up">
            Fasilitas & Sarana <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">
                Penunjang Akademik
            </span>
        </h1>

        <p class="text-lg text-sky-100 max-w-2xl mx-auto font-light animate-fade-up delay-100">
            Lingkungan belajar modern yang dirancang untuk memicu kreativitas, kolaborasi, dan kenyamanan seluruh civitas akademika.
        </p>
    </div>
</div>

{{-- ================= LIST FASILITAS (ZIG-ZAG LAYOUT) ================= --}}
<section class="bg-sky-50/50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    {{-- Decorative Line --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        <div class="flex flex-col gap-20 lg:gap-32">
            
            @forelse($facilities as $index => $facility)
                {{-- 
                    LOGIKA ZIG-ZAG:
                    Jika Index Ganjil ($index % 2 == 1), tambahkan class 'lg:flex-row-reverse'.
                    Ini akan membalik posisi gambar dan teks khusus di layar besar (lg).
                --}}
                <div id="{{ $facility->name }}" class="flex flex-col lg:flex-row {{ $index % 2 == 1 ? 'lg:flex-row-reverse' : '' }} items-center gap-12 lg:gap-20 reveal-on-scroll">
                    
                    {{-- 1. BAGIAN GAMBAR --}}
                    <div class="w-full lg:w-1/2 relative group">
                        
                        {{-- Background Accent (Kotak Dekorasi di belakang gambar) --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-sky-400 to-blue-600 rounded-[2.5rem] rotate-3 opacity-20 group-hover:rotate-6 transition-transform duration-500 scale-95"></div>
                        
                        {{-- Image Container --}}
                        <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl shadow-sky-900/10 border-4 border-white aspect-[4/3]">
                            <img 
                                src="{{ asset('storage/' . $facility->image) }}" 
                                alt="{{ $facility->name }}" 
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out"
                            >
                            
                            {{-- Overlay Gradient (Supaya badge terbaca) --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent opacity-60"></div>

                            {{-- Badge Kategori (Pojok Kiri Atas) --}}
                            <div class="absolute top-6 left-6">
                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/90 backdrop-blur-md text-sky-700 text-xs font-bold shadow-lg">
                                    <i class="bi bi-building-fill"></i>
                                    {{ $facility->faculty->name ?? 'Fasilitas Umum' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- 2. BAGIAN TEKS --}}
                    <div class="w-full lg:w-1/2">
                        
                        {{-- Icon Header --}}
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-sky-100 flex items-center justify-center text-sky-600 text-xl group-hover:bg-sky-600 group-hover:text-white transition-colors duration-300">
                                {{-- Icon dinamis berdasarkan urutan, biar variatif --}}
                                @if($index % 3 == 0) <i class="bi bi-laptop"></i>
                                @elseif($index % 3 == 1) <i class="bi bi-book"></i>
                                @else <i class="bi bi-activity"></i>
                                @endif
                            </div>
                            <span class="text-sky-600 font-bold tracking-widest text-xs uppercase">Premium Facility</span>
                        </div>

                        {{-- Judul --}}
                        <h2 class="text-3xl md:text-4xl font-black text-slate-800 mb-6 leading-tight">
                            {{ $facility->name }}
                        </h2>

                        {{-- Deskripsi --}}
                        <p class="text-slate-600 text-lg leading-relaxed mb-8">
                            {{ $facility->description }}
                        </p>

                        {{-- Micro Features (Grid Icon Kecil) --}}
                        {{-- Pastikan data $facility dipassing dari Controller --}}
                        {{-- Contoh Controller: $facility = Facility::with('taglines')->find($id); --}}

                        <div class="mt-8">
                            <h4 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <i class="bi bi-stars text-sky-500"></i> Fasilitas Unggulan
                            </h4>

                            {{-- Cek kalo ada taglines --}}
                            @if($facility->taglines->count() > 0)
                                
                                <div class="swiper taglineSwiper w-full px-1 py-2">
                                    <div class="swiper-wrapper">
                                        
                                        {{-- LOOPING DARI DATABASE RELASI --}}
                                        @foreach($facility->taglines as $tagline)
                                            <div class="swiper-slide !w-auto">
                                                <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200 shadow-sm text-slate-600 text-sm font-semibold whitespace-nowrap">
                                                    {{-- Panggil kolom 'icon' dari tabel taglines --}}
                                                    <i class="{{ $tagline->icon }} text-sky-500"></i>
                                                    
                                                    {{-- Panggil kolom 'name' dari tabel taglines --}}
                                                    <span>{{ $tagline->name }}</span>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            @else
                                <p class="text-xs text-slate-400 italic">Detail fasilitas belum ditambahkan.</p>
                            @endif
                        </div>

                        {{-- Script Swiper (Wajib ada) --}}
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
                        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

                        <script>
                            new Swiper(".taglineSwiper", {
                                slidesPerView: "auto",
                                spaceBetween: 10,
                                freeMode: true,
                            });
                        </script>

                    </div>
                </div>

                {{-- Divider (Kecuali item terakhir) --}}
                @if(!$loop->last)
                    <div class="w-full h-px bg-slate-200/50 mx-auto max-w-xs lg:hidden"></div>
                @endif

            @empty
                {{-- EMPTY STATE --}}
                <div class="col-span-full py-20 text-center">
                    <div class="inline-block p-10 rounded-[3rem] bg-white border border-slate-100 shadow-xl shadow-sky-100/50">
                        <div class="w-24 h-24 bg-sky-50 rounded-full flex items-center justify-center mx-auto mb-6 text-sky-300">
                            <i class="bi bi-images text-5xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Fasilitas</h3>
                        <p class="text-slate-500 mb-8 max-w-md mx-auto">
                            Data fasilitas belum ditambahkan oleh admin. Silakan kembali lagi nanti.
                        </p>
                        <a href="/" class="inline-flex items-center gap-2 px-6 py-3 bg-sky-600 text-white font-bold rounded-xl hover:bg-sky-700 transition-all shadow-lg shadow-sky-600/30">
                            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</section>

{{-- ================= STYLES & SCRIPT ================= --}}
<style>
    .animate-slow-zoom {
        animation: slowZoom 20s infinite alternate;
    }
    @keyframes slowZoom {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }
    
    .animate-fade-up { animation: fadeUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
    .animate-fade-down { animation: fadeDown 0.8s ease-out forwards; opacity: 0; transform: translateY(-20px); }
    .delay-100 { animation-delay: 0.1s; }
    
    @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeDown { to { opacity: 1; transform: translateY(0); } }

    /* Scroll Reveal Animation */
    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1);
    }
    .reveal-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // Stop observing once visible (optional)
                    // observer.unobserve(entry.target); 
                }
            });
        }, { threshold: 0.15 });

        document.querySelectorAll('.reveal-on-scroll').forEach((el) => {
            observer.observe(el);
        });
    });
</script>

@endsection