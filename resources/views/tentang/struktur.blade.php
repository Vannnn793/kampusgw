@extends('layout.main')
@section('title', 'Struktur Organisasi')

@section('content')

{{-- ================= LOGIKA FILTERING & SORTING ================= --}}
@php
    // 1. Jadikan $all dari controller sebagai Collection
    $allData = collect($all ?? []);

    // 2. Filter khusus pimpinan univ (akomodasi spasi & underscore) 
    // lalu urutkan berdasarkan kolom 'order' dari yang terkecil (1, 2, 3, dst)
    $pimpinans = $allData->filter(function ($item) {
        return $item->category === 'pimpinan_univ' || $item->category === 'pimpinan univ';
    })->sortBy('order')->values();

    // 3. Ambil urutan ke-1 (Order paling kecil) sebagai Pucuk Pimpinan (Rektor/Ketua)
    $top = $pimpinans->first();

    // 4. Sisanya (Order ke-2 dst) jadikan Wakil di bawahnya
    $bottom = $pimpinans->skip(1);
@endphp

{{-- ================= HERO SECTION ================= --}}
<div class="relative py-20 md:py-28 bg-slate-900 overflow-hidden">
    {{-- Background Image & Overlay --}}
    <div class="absolute inset-0">
        <img 
            src="{{ $profile && $profile->gambar_kampus ? asset('storage/'.$profile->gambar_kampus) : asset('storage/images/default-campus.jpg') }}" 
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Latar Belakang Kampus" 
        >
        {{-- Overlay Biru Tua (Konsisten dengan Profile) --}}
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
        <span class="text-sky-400 font-bold tracking-widest uppercase text-sm mb-4 block animate-fade-down">
            Leadership & Governance
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white mb-4 animate-fade-up">
            Struktur Organisasi
        </h1>
        <p class="text-slate-300 text-lg max-w-2xl mx-auto animate-fade-up delay-100">
            Mengenal jajaran pimpinan yang berdedikasi memajukan visi dan misi kampus.
        </p>
    </div>
</div>

{{-- ================= ORG CHART VISUALIZATION ================= --}}
<section class="bg-sky-50/50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] overflow-hidden min-h-screen">

    {{-- Garis Dekorasi --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 md:px-6">

        {{-- CONTAINER BAGAN --}}
        <div class="relative flex flex-col items-center">
            <br>
            <br>
            {{-- 1. LEVEL 1: REKTOR (TOP) --}}
            @if($top)
            <div class="relative z-10 mb-12 animate-zoom-in">
                {{-- Card Rektor --}}
                <div class="group relative bg-white p-4 rounded-[2rem] shadow-xl shadow-sky-900/10 border-2 border-sky-100 w-72 md:w-80 text-center hover:-translate-y-2 transition-all duration-500">
                    
                    {{-- Foto --}}
                    <div class="aspect-[3/4] rounded-[1.5rem] overflow-hidden mb-5 relative bg-slate-100 flex items-center justify-center">
                        @if($top->photo)
                            <img src="{{ asset('storage/'.$top->photo) }}" 
                                 class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                                 alt="{{ $top->name }}">
                        @else
                            <i class="bi bi-person-fill text-7xl text-slate-300"></i>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    {{-- Info --}}
                    <h3 class="text-xl font-bold text-slate-800 leading-tight mb-1">{{ $top->name }}</h3>
                    <p class="text-sky-600 font-semibold text-sm uppercase tracking-wide">
                        {{ str_replace('_',' ',$top->position) }}
                    </p>
                </div>

                {{-- Garis Konektor Vertikal (Bawah Rektor) --}}
                @if($bottom->count() > 0)
                <div class="absolute left-1/2 -translate-x-1/2 -bottom-12 w-1 h-12 bg-sky-200"></div>
                @endif
            </div>
            @endif

            {{-- 2. LEVEL 2: WAKIL REKTOR (GRID) --}}
            @if($bottom->count() > 0)
            <div class="w-full relative animate-fade-up delay-200">
                
                {{-- Garis Horizontal Utama (Penghubung semua Wakil) --}}
                @if($bottom->count() > 1)
                <div class="absolute top-0 left-[10%] right-[10%] md:left-[20%] md:right-[20%] lg:left-[25%] lg:right-[25%] h-1 bg-sky-200 -translate-y-px hidden md:block"></div>
                @endif

                <div class="flex flex-wrap justify-center gap-10 md:gap-8 pt-10 md:pt-10 relative">
                    
                    @foreach($bottom as $row)
                    <div class="relative flex flex-col items-center group w-full max-w-[260px]">
                        
                        {{-- Garis Vertikal Konektor (Atas Card) - Mobile Hidden --}}
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-1 h-10 bg-sky-200 hidden md:block"></div>
                        {{-- Titik Konektor --}}
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-3 h-3 bg-sky-500 rounded-full border-2 border-white hidden md:block"></div>

                        {{-- Card Wakil --}}
                        <div class="bg-white p-3 rounded-3xl shadow-lg border border-slate-100 w-full text-center hover:shadow-sky-100 transition-all duration-300">
                            
                            {{-- Foto Kecil (Circle/Rounded) --}}
                            <div class="aspect-square rounded-2xl overflow-hidden mb-4 mx-auto w-full relative bg-slate-50 flex items-center justify-center">
                                @if($row->photo)
                                    <img src="{{ asset('storage/'.$row->photo) }}" 
                                         class="w-full h-full object-cover object-top group-hover:scale-105 transition-all duration-500"
                                         alt="{{ $row->name }}">
                                @else
                                    <i class="bi bi-person-fill text-5xl text-slate-300"></i>
                                @endif
                            </div>

                            <h4 class="text-lg font-bold text-slate-800 leading-snug mb-1">{{ $row->name }}</h4>
                            <p class="text-slate-500 text-xs font-bold uppercase">
                                {{ str_replace('_',' ',$row->position) }}
                            </p>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>
            @endif

        </div>

    </div>
</section>

{{-- ================= TABLE LIST PEJABAT ================= --}}
<section class="bg-white py-20 border-t border-slate-100">
    <div class="max-w-6xl mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4" data-aos="fade-up">
            <div>
                <h2 class="text-3xl font-black text-slate-800 mb-2">Daftar Lengkap</h2>
                <p class="text-slate-500">Seluruh pemegang jabatan struktural & fungsional.</p>
            </div>
        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-200 shadow-sm" data-aos="fade-up" data-aos-delay="100">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider border-b border-slate-200">
                        <th class="p-5 font-bold w-16 text-center">#</th>
                        <th class="p-5 font-bold">Nama Pejabat</th>
                        <th class="p-5 font-bold">Jabatan</th>
                        <th class="p-5 font-bold hidden md:table-cell">Kategori</th>
                        <th class="p-5 font-bold text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($allData as $row)
                    <tr class="hover:bg-sky-50/50 transition-colors group">
                        <td class="p-5 text-center text-slate-400 font-medium group-hover:text-sky-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="p-5">
                            <div class="flex items-center gap-3">
                                {{-- Avatar Kecil --}}
                                <div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden shrink-0 border border-slate-200 flex items-center justify-center">
                                    @if($row->photo)
                                        <img src="{{ asset('storage/'.$row->photo) }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="bi bi-person-fill text-slate-400"></i>
                                    @endif
                                </div>
                                <span class="font-bold text-slate-700 group-hover:text-sky-700 transition-colors">
                                    {{ $row->name }}
                                </span>
                            </div>
                        </td>
                        <td class="p-5">
                            <span class="inline-block bg-slate-100 text-slate-600 text-xs px-2 py-1 rounded font-semibold group-hover:bg-sky-100 group-hover:text-sky-700">
                                {{ strtoupper(str_replace('_',' ',$row->position)) }}
                            </span>
                        </td>
                        <td class="p-5 text-sm text-slate-500 hidden md:table-cell capitalize">
                            {{ str_replace('_', ' ', $row->category) }}
                        </td>
                        <td class="p-5 text-right">
                            <span class="w-2 h-2 rounded-full bg-green-500 inline-block" title="Aktif"></span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-slate-400">Belum ada data struktur organisasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination Hint (Static) --}}
        <div class="mt-4 text-center text-xs text-slate-400">
            Menampilkan {{ $allData->count() }} data pejabat.
        </div>

    </div>
</section>

{{-- ================= CUSTOM STYLES & ANIMATION ================= --}}
<style>
    /* Custom Animations */
    .animate-fade-up { animation: fadeUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
    .animate-fade-down { animation: fadeDown 0.8s ease-out forwards; opacity: 0; transform: translateY(-20px); }
    .animate-zoom-in { animation: zoomIn 0.8s ease-out forwards; opacity: 0; transform: scale(0.9); }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }

    @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeDown { to { opacity: 1; transform: translateY(0); } }
    @keyframes zoomIn { to { opacity: 1; transform: scale(1); } }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translate(0) scale(1)';
                }
            });
        });
    });
</script>

@endsection