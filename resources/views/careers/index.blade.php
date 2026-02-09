@extends('layout.main')
@section('title','Jejak Alumni')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    {{-- 1. Background Image --}}
    <div class="absolute inset-0">
        {{-- Gunakan gambar wisuda atau kampus umum --}}
        <img 
            src="{{ asset('storage/images/graduation.jpg') }}" 
            onerror="this.src='{{ asset('storage/images/kampusgw.jpg') }}'"
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Alumni"
        >
        {{-- Overlay Gelap --}}
        <div class="absolute inset-0 bg-slate-900/85"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>

    {{-- 2. Konten Hero --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-sky-300 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
            Alumni Stories
        </div>

        {{-- Judul --}}
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight leading-tight animate-fade-up">
            Jejak Sukses <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-blue-400">Alumni</span>
        </h1>

        {{-- Deskripsi --}}
        <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed animate-fade-up delay-100 font-light">
            Inspirasi nyata dari para lulusan yang telah berkarya dan memberikan dampak di dunia industri global.
        </p>

    </div>
</div>

{{-- ================= CONTENT SECTION (Overlap) ================= --}}
<section class="bg-slate-50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] overflow-hidden min-h-screen">
    
    {{-- Decorative Line --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-16" data-aos="fade-up">
            <div>
                <span class="text-sky-600 font-bold tracking-widest uppercase text-xs mb-2 block">Testimonials</span>
                <h2 class="text-3xl font-black text-slate-900">Apa Kata Mereka?</h2>
            </div>
            
            {{-- Stats Counter (Optional) --}}
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-3xl font-black text-slate-900">{{ $alumni->count() }}+</p>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Alumni Terdaftar</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-sky-100 flex items-center justify-center text-sky-600 text-xl">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
        </div>

        {{-- ALUMNI GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($alumni as $a)
            <div id="{{ $a->nama }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                 class="group relative bg-white rounded-[2rem] p-8 border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-sky-100/50 hover:border-sky-200 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">

                {{-- Quote Icon Background --}}
                <div class="absolute top-6 right-8 text-8xl text-slate-100 font-serif leading-none select-none z-0 group-hover:text-sky-50 transition-colors">
                    &rdquo;
                </div>

                {{-- Pesan & Kesan --}}
                <div class="relative z-10 mb-8 flex-1">
                    @if ($a->pesan_kesan)
                        <p class="text-slate-600 text-lg leading-relaxed italic">
                            "{{ Str::limit($a->pesan_kesan,99999999999) }}"
                        </p>
                    @else
                        <p class="text-slate-400 italic text-sm">Tidak ada pesan kesan.</p>
                    @endif
                </div>

                {{-- Profile Section --}}
                <div class="relative z-10 flex items-center gap-4 pt-6 border-t border-slate-50 mt-auto">
                    
                    {{-- Foto Profile --}}
                    <div class="relative">
                        <img
                            src="{{ $a->foto ? asset('storage/'.$a->foto) : 'https://ui-avatars.com/api/?name='.urlencode($a->nama).'&background=0ea5e9&color=fff' }}"
                            alt="{{ $a->nama }}"
                            class="w-14 h-14 rounded-full object-cover ring-4 ring-slate-50 group-hover:ring-sky-100 transition-all duration-300"
                        >
                        {{-- Verified Badge --}}
                        <div class="absolute -bottom-1 -right-1 bg-blue-500 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full border-2 border-white">
                            <i class="bi bi-check"></i>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div>
                        <h3 class="font-bold text-slate-900 text-base leading-tight group-hover:text-sky-600 transition-colors">
                            {{ $a->nama }}
                        </h3>
                        
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mt-1">
                            {{ $a->jabatan ?? 'Alumni' }} 
                            @if($a->perusahaan) 
                                <span class="text-sky-500">@ {{Str::limit($a->perusahaan, 15)}}</span> 
                            @endif
                        </p>

                        <div class="flex items-center gap-2 mt-1 text-[10px] text-slate-400 font-medium">
                            <span>{{ $a->tahun_lulus ?? 'N/A' }}</span>
                            <span>•</span>
                            <span>{{ $a->prodi->name ?? 'Prodi N/A' }}</span>
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <div class="col-span-full py-20 text-center bg-white rounded-[2rem] border border-dashed border-slate-300">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-50 mb-4 text-slate-400">
                    <i class="bi bi-person-slash text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-700">Belum ada data Alumni</h3>
                <p class="text-slate-500 text-sm mt-2">Data alumni akan muncul di sini setelah ditambahkan.</p>
            </div>
            @endforelse

        </div>

    </div>
</section>

{{-- ================= STYLES ================= --}}
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
</style>

@endsection