@extends('layout.main')
@section('title', 'Fakultas')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    {{-- 1. Background Image --}}
    <div class="absolute inset-0">
        {{-- Gunakan gambar profil kampus jika ada, atau default --}}
        <img 
            src="{{ $profile && $profile->gambar_kampus ? asset('storage/'.$profile->gambar_kampus) : asset('storage/images/default-campus.jpg') }}" 
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Latar Belakang Kampus" 
        >
        {{-- Overlay Biru Tua (Konsisten dengan halaman lain) --}}
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    {{-- 2. Konten Hero --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-500/20 border border-sky-300/30 backdrop-blur-md text-sky-100 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-300 animate-pulse"></span>
            Academic Faculties
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight animate-fade-up">
            Pusat Keunggulan <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">
                Akademik & Riset
            </span>
        </h1>

        <p class="text-lg text-sky-100 max-w-2xl mx-auto font-light animate-fade-up delay-100">
            Temukan wadah untuk mengembangkan potensi, inovasi, dan kepemimpinan masa depan melalui berbagai disiplin ilmu pilihan.
        </p>

    </div>
</div>

{{-- ================= FACULTIES GRID ================= --}}
<section class="bg-sky-50/50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    {{-- Decorative Line --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        {{-- Header Section (Title & Count) --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12" data-aos="fade-up">
            <div>
                <h2 class="text-3xl font-black text-slate-800 mb-2">Pilihan Fakultas</h2>
                <p class="text-slate-500">Jelajahi program studi unggulan kami.</p>
            </div>
            
            <div class="flex items-center gap-2 px-5 py-2 bg-white rounded-full border border-sky-100 shadow-sm text-sm font-bold text-slate-600">
                <i class="bi bi-mortarboard-fill text-sky-500"></i>
                Total: <span class="text-sky-600">{{ $faculties->count() }}</span> Fakultas
            </div>
        </div>

        {{-- Grid Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($faculties as $index => $faculty)
                <a href="{{ route('faculties.show', $faculty->slug) }}" 
                   class="group relative bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-xl shadow-sky-900/5 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 reveal-on-scroll">

                    {{-- 1. Image Area --}}
                    <div class="relative h-64 overflow-hidden">
                        {{-- Image --}}
                        <img 
                            src="{{ asset('storage/'.$faculty->image) }}" 
                            alt="{{ $faculty->name }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        >
                        
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>

                        {{-- Floating Icon (Pojok Kanan Atas) --}}
                        <div class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center text-white group-hover:bg-sky-500 group-hover:border-sky-500 transition-colors duration-300">
                            <i class="bi bi-arrow-up-right text-sm transform group-hover:rotate-45 transition-transform"></i>
                        </div>

                        {{-- Category Badge (Opsional - Pojok Kiri Atas) --}}
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-lg bg-sky-600/90 backdrop-blur text-[10px] font-bold text-white uppercase tracking-wider">
                                Faculty
                            </span>
                        </div>
                    </div>

                    {{-- 2. Content Area --}}
                    <div class="p-8 relative">
                        {{-- Icon Dekoratif di Background --}}
                        <i class="bi bi-columns-gap absolute -right-4 -bottom-4 text-9xl text-slate-50 opacity-50 group-hover:text-sky-50 transition-colors duration-500 rotate-12"></i>

                        {{-- Title --}}
                        <h3 class="text-2xl font-black text-slate-800 mb-3 group-hover:text-sky-600 transition-colors line-clamp-2 relative z-10">
                            {{ $faculty->name }}
                        </h3>

                        {{-- Description --}}
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3 relative z-10 group-hover:text-slate-600 transition-colors">
                            {{ Str::limit(strip_tags($faculty->description), 120, '...') }}
                        </p>

                        {{-- Footer Action --}}
                        <div class="flex items-center gap-2 text-sm font-bold text-sky-600 relative z-10">
                            <span>Lihat Detail</span>
                            <i class="bi bi-arrow-right transform group-hover:translate-x-2 transition-transform duration-300"></i>
                        </div>
                    </div>

                    {{-- Bottom Highlight Line --}}
                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-sky-400 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </a>
            @empty
                {{-- EMPTY STATE --}}
                <div class="col-span-full py-20 text-center">
                    <div class="w-24 h-24 bg-sky-50 rounded-full flex items-center justify-center mx-auto mb-6 text-sky-300 border border-sky-100">
                        <i class="bi bi-bank text-5xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Fakultas</h3>
                    <p class="text-slate-500">Data fakultas belum ditambahkan oleh admin.</p>
                </div>
            @endforelse

        </div>

    </div>
</section>

{{-- ================= STYLES & SCRIPT ================= --}}
<style>
    /* Hero Animations */
    .animate-slow-zoom { animation: slowZoom 20s infinite alternate; }
    @keyframes slowZoom { 0% { transform: scale(1); } 100% { transform: scale(1.1); } }
    
    .animate-fade-up { animation: fadeUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
    .animate-fade-down { animation: fadeDown 0.8s ease-out forwards; opacity: 0; transform: translateY(-20px); }
    .delay-100 { animation-delay: 0.1s; }
    
    @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeDown { to { opacity: 1; transform: translateY(0); } }

    /* Scroll Reveal */
    .reveal-on-scroll { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1); }
    .reveal-on-scroll.is-visible { opacity: 1; transform: translateY(0); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Add slight delay based on index for cascade effect
                    setTimeout(() => {
                        entry.target.classList.add('is-visible');
                    }, index * 100); 
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal-on-scroll').forEach((el) => {
            observer.observe(el);
        });
    });
</script>

@endsection