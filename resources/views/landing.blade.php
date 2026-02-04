@extends('layout.main')
@section('title','Home')

@section('content')

<style>
/* ===== FORCE ANIMATED GRADIENT (ANTI GAGAL) ===== */
.animated-gradient {
    background: linear-gradient(
  90deg,
    #CFF7DC,   /* hijau mint soft */
    #DCEBFF,   /* biru langit pastel */
    #FFF9E6,   /* krem lembut */
    #D6ECF7,   /* biru aqua muda */
    #E6F9F0 
    );
    background-size: 600% 600%;
    animation: gradientMove 5s linear infinite;
}

@keyframes gradientMove {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 100% 50%;
    }
}
</style>
{{-- ================= ANNOUNCEMENT BAR (HOME ONLY) ================= --}}
<div id="announcement-bar"
     class="relative z-30"
     data-aos="fade-down">

    <div class="animated-gradient">
        <div class="max-w-7xl mx-auto px-6 py-3 text-center relative">

            <p class="text-sm md:text-base font-medium text-slate-800">
                🎓 <span class="font-semibold">
                    Penerimaan Mahasiswa Baru KampusGw 2026 Telah Dibuka!
                </span>
                Simak Jadwal, Syarat, dan Program Studi.
                <a href="/pmb"
                   class="ml-1 font-semibold underline underline-offset-4 hover:text-sky-700 transition">
                    Lihat di Sini!
                </a>
            </p>
        </div>
    </div>
</div>
{{-- ================= HERO SECTION ================= --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-[#FAFAF9] via-[#F4F6F8] to-[#EEF2F5]">

    <div class="relative max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        
        {{-- BAGIAN KIRI: TEXT --}}
        <div>
            <p class="uppercase tracking-[0.3em] text-sm font-semibold text-[#1E5FA3] mb-4">
                Welcome To KampusGW
            </p>
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight text-[#0F2A44]">
                <span class="block">Kampus Teknologi</span>
                <span class="relative inline-block text-[#1E5FA3]">
                    Pencetak Talenta Global
                </span>
            </h1>
            <p class="mt-6 text-lg font-medium text-[#1F3E63] max-w-xl">
                Kurikulum berbasis industri, dosen praktisi,
                dan ekosistem inovasi yang relevan dengan dunia kerja modern.
            </p>
            <div class="mt-10 flex gap-4">
                <a href="#" class="px-9 py-4 bg-[#1E5FA3] text-white font-bold rounded-xl shadow-xl hover:bg-[#0F3E73] hover:scale-105 transition">
                    Daftar Sekarang
                </a>
                <a href="#" class="px-9 py-4 bg-white text-[#1E5FA3] font-bold border border-[#1E5FA3] rounded-xl hover:bg-[#E6F0FB] hover:scale-105 shadow-md transition">
                    Jelajahi Kampus
                </a>
            </div>
        </div>

 {{-- Container Utama: max-w-6xl (Biar lebar), mx-auto (Tengah), px-4 (Jarak pinggir di HP) --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-6xl mx-auto px-4 my-10">

    {{-- =======================
         1. SLIDER GAMBAR (KIRI)
         ======================= --}}
    <div class="rounded-2xl overflow-hidden shadow-xl h-64 md:h-80 relative bg-gray-100 group">
        @if(isset($sliders) && $sliders->count() > 0)
            <div x-data="{ 
                    activeSlide: 0, 
                    total: {{ $sliders->count() }},
                    autoplay() {
                        if (this.total > 1) {
                            setInterval(() => {
                                this.activeSlide = (this.activeSlide + 1) % this.total;
                            }, 4000);
                        }
                    }
                }" 
                x-init="autoplay()"
                class="relative w-full h-full">
                
                @foreach($sliders as $index => $slider)
                    <div x-show="activeSlide === {{ $index }}"
                        class="absolute inset-0 w-full h-full"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 scale-105"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95">
                        
                        <img src="{{ asset('storage/' . $slider->thumbnail) }}" 
                             alt="Slider" 
                             class="w-full h-full object-cover">
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent pointer-events-none"></div>
                    </div>
                @endforeach

                {{-- Dots --}}
                @if($sliders->count() > 1)
                    <div class="absolute bottom-4 right-4 flex space-x-2 z-10">
                        @foreach($sliders as $index => $slider)
                            <button @click="activeSlide = {{ $index }}" 
                                    :class="activeSlide === {{ $index }} ? 'bg-white w-6' : 'bg-white/50 w-2'"
                                    class="h-2 rounded-full transition-all duration-300 shadow-sm">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-200">
                <span class="text-sm">Slider Belum Ada</span>
            </div>
        @endif
    </div>

    {{-- =======================
         2. INFO PMB (KANAN)
         ======================= --}}
    <div class="rounded-2xl overflow-hidden shadow-xl h-64 md:h-80 relative bg-gray-100 group">
        @if (isset($pmbInfos) && $pmbInfos->count() > 0)
            <div x-data="{ 
                    activeInfo: 0, 
                    totalInfo: {{ $pmbInfos->count() }},
                    autoplayInfo() {
                        if (this.totalInfo > 1) {
                            setInterval(() => {
                                this.activeInfo = (this.activeInfo + 1) % this.totalInfo;
                            }, 5000);
                        }
                    }
                }" 
                x-init="autoplayInfo()"
                class="relative w-full h-full">
                
                @foreach($pmbInfos as $index => $info)
                    <div x-show="activeInfo === {{ $index }}"
                        class="absolute inset-0 w-full h-full"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">
                        
                        <img src="{{ asset('storage/' . $info->image) }}" 
                             alt="PMB Info" 
                             class="w-full h-full object-cover">
                    </div>
                @endforeach
                
                @if($pmbInfos->count() > 1)
                    <div class="absolute bottom-4 right-4 flex space-x-2 z-10">
                        @foreach($pmbInfos as $index => $info)
                            <button @click="activeInfo = {{ $index }}" 
                                    :class="activeInfo === {{ $index }} ? 'bg-[#1E5FA3] w-6' : 'bg-white/50 w-2'"
                                    class="h-2 rounded-full transition-all duration-300 shadow-sm">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-200">
                <span class="text-sm">Info PMB Belum Ada</span>
            </div> 
        @endif
    </div>

    {{-- =======================
         3. VIDEO YOUTUBE (BAWAH - FULL WIDTH)
         ======================= --}}
    @php
        $video_id = '';
        $url = $profile->link_video_profil ?? '';
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            $video_id = $match[1];
        }
    @endphp

    <div class="col-span-1 md:col-span-2 relative rounded-2xl overflow-hidden shadow-2xl h-64 md:h-96 bg-black group">
        @if($video_id)
            {{-- Wrapper Iframe --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <iframe 
                    class="absolute top-1/2 left-1/2 w-[120%] h-[120%] -translate-x-1/2 -translate-y-1/2 object-cover"
                    src="https://www.youtube.com/embed/{{ $video_id }}?autoplay=1&mute=1&loop=1&playlist={{ $video_id }}&controls=0&showinfo=0&rel=0&disablekb=1&modestbranding=1" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>

            {{-- Link Overlay & Tombol Play --}}
            <a href="{{ $profile->link_video_profil }}" target="_blank" class="absolute inset-0 z-10 bg-black/20 hover:bg-black/10 transition flex items-center justify-center">
               <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition duration-300 border border-white/30">
                    <svg class="w-8 h-8 ml-1 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </div>
            </a>
        @else
            {{-- Fallback jika Link Video Error/Kosong --}}
            <img src="https://biayakuliahukt.id/wp-content/uploads/2023/02/Jalur-Pendaftaran-Politeknik-Indramayu.jpg" 
                 class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="bg-black/60 text-white px-4 py-2 rounded-lg backdrop-blur-sm font-semibold">
                    Video Profil Belum Diatur
                </span>
            </div>
        @endif
    </div>

</div>
    </div>
</section>
{{-- ================= PARTNERS ================= --}}
<section class="py-20 bg-sky-50 overflow-hidden">

    {{-- CSS CUSTOM: Animasi & Pause --}}
    <style>
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 35s linear infinite;
        }
        /* Fitur: Slider berhenti saat mouse diarahkan (supaya user bisa lihat logo) */
        .group:hover .animate-marquee {
            animation-play-state: paused;
        }
    </style>

    <div class="max-w-7xl mx-auto px-6 relative">

        {{-- HEADLINE --}}
        <div class="text-center mb-12">
            <span class="inline-block py-1 px-3 rounded-full bg-white border border-sky-100 text-sky-600 text-xs font-bold tracking-wider uppercase mb-3 shadow-sm">
                Our Ecosystem
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                Mitra & <span class="text-sky-600">Kolaborasi</span>
            </h2>
            <p class="mt-4 text-slate-600 max-w-xl mx-auto text-base">
                Sinergi bersama industri terkemuka untuk mencetak talenta digital yang siap kerja.
            </p>
        </div>

        {{-- PARTNER SLIDER WRAPPER --}}
        @if($partners->count())
            <div class="relative w-full group">
                
                {{-- FADE OVERLAY (KIRI & KANAN) --}}
                {{-- Trik ini bikin logo muncul/hilang secara halus, warnanya disamakan dengan bg-sky-50 --}}
                <div class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-sky-50 to-transparent z-10 pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-sky-50 to-transparent z-10 pointer-events-none"></div>

           {{--  --}}
                <div class="flex overflow-hidden py-4">
                    <div class="flex items-center gap-12 md:gap-20 animate-marquee w-max">

                        {{-- LOOPING 2x (Supaya tidak putus saat scroll) --}}
                        @for ($i = 0; $i < 2; $i++) 
                            @foreach($partners as $partner)
                                {{-- ITEM LOGO --}}
                                <div class="relative w-32 h-16 flex items-center justify-center group/logo transition-all duration-300 hover:scale-110">
                                    {{-- 
                                        TIPS DESAIN MAHAL:
                                        - grayscale: Bikin logo jadi hitam putih (biar rapi/seragam)
                                        - hover:grayscale-0: Pas disorot mouse, warnanya muncul (interaktif)
                                        - mix-blend-multiply: Bikin background putih di logo "hilang" menyatu dengan background biru
                                    --}}
                                    <img src="{{ asset('storage/'.$partner->logo) }}"
                                         alt="{{ $partner->name }}"
                                         class="max-w-full max-h-full object-contain 
                                                 
                                                hover:grayscale-0 hover:opacity-100 mix-blend-multiply">
                                </div>
                            @endforeach
                        @endfor

                    </div>
                </div>
            </div>
        @else
            {{-- STATE KOSONG --}}
            <div class="flex flex-col items-center justify-center py-10 text-center border-2 border-dashed border-sky-200 rounded-xl bg-white/50">
                <svg class="w-10 h-10 text-sky-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                <p class="text-sky-800 font-medium">Belum ada partner.</p>
            </div>
        @endif

    </div>
</section>
{{-- ================= SEJARAH & STATISTIK KAMPUS ================= --}}
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
            
            {{-- =======================
                 BAGIAN KIRI: GAMBAR & STATS MELAYANG
                 ======================= --}}
            <div class="relative hidden lg:block group">
                
                {{-- GAMBAR UTAMA (dari kolom gambar_kampus) --}}
                <div class="rounded-[2rem] overflow-hidden shadow-2xl border-8 border-white h-[600px] w-[450px] relative z-0">
                    @if($profile && $profile->gambar_kampus)
                        <img src="{{ asset('storage/' . $profile->gambar_kampus) }}" 
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                             alt="Gedung Kampus">
                    @else
                        {{-- Fallback jika gambar belum diupload --}}
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                            No Image
                        </div>
                    @endif
                </div>

                {{-- KARTU MELAYANG 1: Total Prodi --}}
                <div class="absolute top-12 -right-12 bg-white p-4 rounded-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] flex items-center gap-4 w-64 border border-gray-100 z-10 animate-fade-in-up">
                    <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center shrink-0 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#0F2A44] text-lg">{{ $profile->total_prodi ?? '0' }}</h4>
                        <p class="text-xs text-gray-500">Program Studi Pilihan</p>
                    </div>
                </div>

                {{-- KARTU MELAYANG 2: Total Dosen --}}
                <div class="absolute top-48 -right-6 bg-white p-4 rounded-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] flex items-center gap-4 w-64 border border-gray-100 z-10 animate-fade-in-up delay-100">
                    <div class="w-12 h-12 rounded-full bg-yellow-50 flex items-center justify-center shrink-0 text-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#0F2A44] text-lg">{{ $profile->total_dosen ?? '0' }}</h4>
                        <p class="text-xs text-gray-500">Dosen Profesional</p>
                    </div>
                </div>

                {{-- KARTU MELAYANG 3: Total Alumni --}}
                <div class="absolute bottom-20 -right-12 bg-white p-4 rounded-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] flex items-center gap-4 w-64 border border-gray-100 z-10 animate-fade-in-up delay-200">
                    <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center shrink-0 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#0F2A44] text-lg">{{ $profile->total_alumni ?? '0' }}</h4>
                        <p class="text-xs text-gray-500">Alumni Sukses</p>
                    </div>
                </div>

            </div>

            {{-- =======================
                 BAGIAN KANAN: TEXT CONTENT (SEJARAH)
                 ======================= --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-[#1E5FA3] font-bold text-sm tracking-widest uppercase bg-blue-50 px-3 py-1 rounded-full">
                        Tentang Kampus
                    </span>
                </div>

                <h2 class="text-3xl lg:text-5xl font-extrabold text-[#0F2A44] leading-tight mb-6">
                    Mengenal Lebih Dekat
                </h2>

                {{-- MENGAMBIL DATA DARI KOLOM: sejarah_kampus --}}
                <div class="text-gray-600 text-lg leading-relaxed mb-8 text-justify">
                    {{-- Menggunakan Str::limit biar tidak kepanjangan di halaman depan --}}
                    {!! Str::limit($profile->sejarah_kampus ?? 'Sejarah kampus belum diisi di database.', 450) !!}
                </div>

                {{-- List Poin diambil dari Visi/Misi (Opsional) atau static text --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                     <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-sm font-semibold text-gray-700">Berbasis Industri</span>
                     </div>
                     <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-sm font-semibold text-gray-700">Inovasi Teknologi</span>
                     </div>
                </div>

                <a href="/tentang/sejarah" class="inline-flex items-center gap-2 px-8 py-3 bg-[#1E5FA3] text-white font-bold rounded-full shadow-lg hover:bg-[#0F3E73] hover:gap-3 transition-all duration-300">
                    Kenali lebih dekat
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>

        {{-- =======================
             BAGIAN BAWAH: STATISTIK FULL (Dari Database)
             ======================= --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 border-t border-gray-100 pt-12">
            
            {{-- STAT 1: TAHUN BEROPERASI --}}
            <div class="text-center group p-4 rounded-xl hover:bg-blue-50 transition duration-300">
                <h3 class="text-4xl font-extrabold text-[#0F2A44] mb-1 group-hover:text-[#1E5FA3]">
                    {{ $profile->tahun_beroperasi ?? '-' }}
                </h3>
                <p class="text-gray-500 font-medium text-sm">Tahun Beroperasi</p>
            </div>

            {{-- STAT 2: TOTAL PRODI --}}
            <div class="text-center group p-4 rounded-xl hover:bg-blue-50 transition duration-300">
                <h3 class="text-4xl font-extrabold text-[#0F2A44] mb-1 group-hover:text-[#1E5FA3]">
                    {{ $profile->total_prodi ?? '-' }}
                </h3>
                <p class="text-gray-500 font-medium text-sm">Program Studi</p>
            </div>

            {{-- STAT 3: TOTAL ALUMNI --}}
            <div class="text-center group p-4 rounded-xl hover:bg-blue-50 transition duration-300">
                <h3 class="text-4xl font-extrabold text-[#0F2A44] mb-1 group-hover:text-[#1E5FA3]">
                    {{ $profile->total_alumni ?? '-' }}
                </h3>
                <p class="text-gray-500 font-medium text-sm">Alumni Tersebar</p>
            </div>

            {{-- STAT 4: TOTAL DOSEN --}}
            <div class="text-center group p-4 rounded-xl hover:bg-blue-50 transition duration-300">
                <h3 class="text-4xl font-extrabold text-[#0F2A44] mb-1 group-hover:text-[#1E5FA3]">
                    {{ $profile->total_dosen ?? '-' }}
                </h3>
                <p class="text-gray-500 font-medium text-sm">Staf Pengajar</p>
            </div>

        </div>

    </div>
</section>
{{-- ================= FAKULTAS SECTION ================= --}}
<section class="relative py-24 bg-[#1583D7] overflow-hidden">

    {{-- Background Ornaments (Tetap dipertahankan, ini bagus) --}}
    <div class="absolute -top-40 left-10 w-[32rem] h-[32rem] bg-white/10 blur-3xl rounded-full pointer-events-none"></div>
    <div class="absolute top-1/3 right-0 w-[30rem] h-[30rem] bg-[#0E5FA8]/30 blur-3xl rounded-full pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- Header Section --}}
        <div class="text-center mb-16">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-800/30 text-blue-100 border border-blue-400/30 text-xs font-bold tracking-wider uppercase mb-4 backdrop-blur-sm">
                Academic Excellence
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight">
                Fakultas & <span class="text-blue-200">Program Studi</span>
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-blue-50/90 text-lg leading-relaxed">
                Temukan passion-mu di salah satu fakultas unggulan kami yang dirancang dengan kurikulum berbasis industri.
            </p>
        </div>

        {{-- GRID CARD --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">

            @foreach($faculties->take(3) as $faculty)
            {{-- Tambahkan <a> tag pembungkus agar seluruh kartu bisa diklik --}}
            <a href="{{ route('faculties.show', $faculty->slug ?? '#') }}" class="group relative flex flex-col bg-white rounded-[2rem] overflow-hidden shadow-2xl shadow-blue-900/20 hover:shadow-blue-900/40 transition-all duration-500 hover:-translate-y-2 h-full">
                
                {{-- Image Area --}}
                <div class="relative w-full h-60 overflow-hidden">
                    {{-- Overlay Gradient (Supaya teks putih kebaca kalo ada di atas gambar) --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <img src="{{ asset('storage/'.$faculty->image) }}" 
                         alt="{{ $faculty->name }}"
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                    
                    {{-- Optional: Badge Kategori --}}
                    <div class="absolute top-4 left-4 z-20">
                        <span class="bg-white/90 backdrop-blur text-[#1583D7] text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                            Fakultas Unggulan
                        </span>
                    </div>
                </div>

                {{-- Content Area --}}
                <div class="p-8 flex flex-col flex-grow relative">
                    {{-- Judul --}}
                    <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-[#1583D7] transition-colors">
                        {{ $faculty->name }}
                    </h3>

                    {{-- Deskripsi --}}
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                        {{ $faculty->description ?? 'Fakultas ini menyediakan berbagai program studi yang relevan dengan kebutuhan industri digital saat ini.' }}
                    </p>

                    {{-- Footer Kartu (Spacer & Button) --}}
                    <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-slate-400 text-sm font-medium">Lihat Detail</span>
                        
                        {{-- Icon Panah Bulat --}}
                        <div class="w-10 h-10 rounded-full bg-slate-50 text-[#1583D7] flex items-center justify-center group-hover:bg-[#1583D7] group-hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5 transform group-hover:rotate-45 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

        </div>

        {{-- BUTTON "LIHAT SEMUA" (Penting untuk Navigasi) --}}
        <div class="mt-16 text-center">
            <a href="{{ route('faculties.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full bg-white text-[#1583D7] font-bold text-sm tracking-wide shadow-lg hover:bg-blue-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                Jelajahi Semua Fakultas
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

    </div>
</section>

{{-- ===================== TESTIMONI ALUMNI ===================== --}}
<section class="py-24 bg-slate-50 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-30 pointer-events-none">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-sky-200 blur-3xl"></div>
        <div class="absolute top-1/2 -left-24 w-72 h-72 rounded-full bg-blue-100 blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-sky-600 font-bold tracking-wide uppercase text-sm mb-3">Kata Alumni</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Jejak Sukses Para Lulusan</h3>
            <p class="text-slate-600 text-lg">
                Dengar langsung pengalaman mereka meniti karir setelah lulus dari kampus kami.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($testimoni as $alumni)
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-100 flex flex-col h-full">
                    
                    <div class="mb-6">
                        <svg class="w-10 h-10 text-sky-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21L14.017 18C14.017 16.896 14.389 15.954 15.133 15.176C15.877 14.398 16.921 14.009 18.265 14.009H18.963C19.125 14.009 19.206 13.928 19.206 13.766V9.673C19.206 9.511 19.125 9.43 18.963 9.43H18.176C17.065 9.43 16.142 9.057 15.407 8.311C14.672 7.565 14.305 6.642 14.305 5.541V5.136C14.305 4.974 14.386 4.893 14.548 4.893H18.932C19.094 4.893 19.175 4.974 19.175 5.136V5.509C19.175 6.942 19.555 8.162 20.315 9.169C21.075 10.176 21.99 11.058 23.06 11.815C23.125 11.864 23.157 11.921 23.157 11.985V20.757C23.157 20.919 23.076 21 22.914 21H14.017ZM6.015 21L6.015 18C6.015 16.896 6.387 15.954 7.131 15.176C7.875 14.398 8.919 14.009 10.263 14.009H10.961C11.123 14.009 11.204 13.928 11.204 13.766V9.673C11.204 9.511 11.123 9.43 10.961 9.43H10.174C9.063 9.43 8.14 9.057 7.405 8.311C6.67 7.565 6.303 6.642 6.303 5.541V5.136C6.303 4.974 6.384 4.893 6.546 4.893H10.93C11.092 4.893 11.173 4.974 11.173 5.136V5.509C11.173 6.942 11.553 8.162 12.313 9.169C13.073 10.176 13.988 11.058 15.058 11.815C15.123 11.864 15.155 11.921 15.155 11.985V20.757C15.155 20.919 15.074 21 14.912 21H6.015Z"/>
                        </svg>
                    </div>

                    <p class="text-slate-600 mb-6 flex-grow italic leading-relaxed">
                        "{{ Str::limit($alumni->pesan_kesan, 150) }}"
                    </p>

                    <div class="flex items-center pt-6 border-t border-slate-100 mt-auto">
                        <div class="flex-shrink-0 mr-4">
                            @if($alumni->foto)
                                <img class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm" 
                                     src="{{ asset('storage/' . $alumni->foto) }}" 
                                     alt="{{ $alumni->nama }}">
                            @else
                                <div class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center text-slate-500">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h4 class="text-slate-900 font-bold text-sm">{{ $alumni->nama }}</h4>
                            <div class="text-xs text-sky-600 font-semibold uppercase tracking-wide">
                                {{ $alumni->jabatan ?? 'Alumni' }}
                            </div>
                            <div class="text-xs text-slate-500">
                                {{ $alumni->perusahaan ?? 'Lulusan ' . $alumni->tahun_lulus }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-10">
                    <p class="text-slate-400">Belum ada testimoni alumni yang ditampilkan.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="/alumni" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-sky-600 hover:bg-sky-700 transition-colors shadow-lg shadow-sky-200">
                Lihat Semua Cerita Alumni
                <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ================= BERITA ================= --}}
<section id="berita-kampus" class="relative py-24 bg-slate-50 overflow-hidden">

    {{-- Background Accent (Pattern Halus) --}}
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#1E5FA3 1px, transparent 1px); background-size: 24px 24px;"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- HEADER SECTION --}}
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <span class="text-blue-600 font-bold tracking-wider uppercase text-xs mb-2 block">Update Terkini</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                    Kabar <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-sky-500">Kampus</span>
                </h2>
            </div>
            
            {{-- Tombol Lihat Semua --}}
            <a href="/berita" class="group flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-blue-600 transition-colors">
                Lihat Arsip Berita
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid lg:grid-cols-5 gap-8 lg:gap-12">

            {{-- ================= KOLOM KIRI (BERITA UTAMA - 3 KOLOM) ================= --}}
            @if($posts->count())
            <div class="lg:col-span-3">
                <div class="group relative h-full min-h-[400px] rounded-3xl overflow-hidden shadow-2xl shadow-blue-900/10 hover:shadow-blue-900/20 transition-all duration-500">
                    
                    <img src="{{ asset('storage/'.$posts[0]->thumbnail) }}" 
                         alt="{{ $posts[0]->title }}"
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                    {{-- Gradient Overlay yang lebih smooth --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90"></div>

                    <div class="absolute bottom-0 left-0 p-6 md:p-8 w-full">
                        <span class="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full mb-3 shadow-lg shadow-blue-600/40">
                            Headline
                        </span>
                        <span class="inline-block px-2 py-1 bg-slate-800 text-xs font-semibold rounded-full text-blue-300 mb-2">
                            {{ $posts[0]->category->name ?? 'Berita' }}
                        </span>

                        <h3 class="text-2xl md:text-3xl font-bold text-white leading-tight mb-3 drop-shadow-sm">
                            <a href="#" class="hover:underline decoration-blue-400 decoration-2 underline-offset-4"
                               onclick="openModal('{{ $posts[0]->title }}', '{{ $posts[0]->content }}', '{{ asset('storage/'.$posts[0]->thumbnail) }}', '{{ $posts[0]->created_at->format('d M Y') }}')">
                                {{ $posts[0]->title }}
                            </a>
                        </h3>

                        <div class="flex items-center text-slate-300 text-sm gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $posts[0]->created_at->format('d M Y') }}
                            </span>
                            <button onclick="openModal('{{ $posts[0]->title }}', '{{ $posts[0]->content }}', '{{ asset('storage/'.$posts[0]->thumbnail) }}', '{{ $posts[0]->created_at->format('d M Y') }}')" 
                                    class="text-white font-semibold hover:text-blue-300 transition ml-auto flex items-center gap-1">
                                Baca Selengkapnya <span class="text-lg">→</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- ================= KOLOM KANAN (LIST TERBARU - 2 KOLOM) ================= --}}
            <div class="lg:col-span-2 flex flex-col gap-5">
                
                {{-- Kita batasi cuma 4 berita samping biar rapi --}}
                @foreach($posts->skip(1)->take(4) as $post)
                <div class="group flex gap-4 items-start p-3 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-lg hover:border-blue-100 transition-all duration-300 cursor-pointer"
                     onclick="openModal('{{ $post->title }}', '{{ $post->content }}', '{{ asset('storage/'.$post->thumbnail) }}', '{{ $post->created_at->format('d M Y') }}')">
                    
                    {{-- Thumbnail Kecil --}}
                    <div class="shrink-0 w-24 h-24 rounded-xl overflow-hidden relative">
                        <img src="{{ asset('storage/'.$post->thumbnail) }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>

                    {{-- Konten --}}
                    <div class="flex-1 min-w-0 py-1"> <span class="text-xs font-semibold text-blue-600 mb-1 block">
                            {{ $post->title ?? 'Berita' }}
                        </span>
                        
                        <h4 class="text-slate-800 font-bold leading-snug mb-2 group-hover:text-blue-700 transition-colors line-clamp-2">
                            {{ $post->description ?? Str::limit(strip_tags($post->content), 60) }}
                        </h4>

                        <p class="text-xs text-slate-400 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- ================= MODAL DETAIL BERITA (POPUP) ================= --}}
    {{-- Hidden by default, muncul pake JS --}}
    <div id="newsModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        
        {{-- Backdrop Gelap --}}
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                
                {{-- Modal Panel --}}
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-3xl scale-95 opacity-0" id="modalPanel">
                    
                    {{-- Tombol Close --}}
                    <button onclick="closeModal()" class="absolute top-4 right-4 z-20 p-2 bg-black/20 hover:bg-black/40 rounded-full text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>

                    {{-- Gambar Besar --}}
                    <div class="relative h-64 sm:h-80 w-full overflow-hidden">
                        <img id="modalImg" src="" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6">
                            <p id="modalDate" class="text-blue-200 text-sm font-medium mb-2"></p>
                            <h3 id="modalTitle" class="text-2xl sm:text-3xl font-bold text-white leading-tight"></h3>
                        </div>
                    </div>

                    {{-- Isi Berita --}}
                    <div class="p-6 sm:p-10 bg-white">
                        <div id="modalContent" class="prose prose-blue max-w-none text-slate-600 leading-relaxed">
                            {{-- Content injeksi lewat JS --}}
                        </div>
                        
                        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
                            <button onclick="closeModal()" class="px-6 py-2 bg-slate-100 text-slate-700 font-bold rounded-lg hover:bg-slate-200 transition">
                                Tutup
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

{{-- ================= KENALI KAMI LEBIH DALAM ================= --}}
<section class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-slate-800">Kenali Kami Lebih Dalam</h2>
            <p class="text-slate-500">Transparansi dan integritas institusi.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- ITEM 1: SEJARAH --}}
            <a href="/tentang/sejarah" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100">
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-4 text-2xl group-hover:scale-110 transition">
                    🏫
                </div>
                <h3 class="font-bold text-slate-800 mb-2 group-hover:text-[#1E5FA3] transition">Profile Kampus</h3>
                <p class="text-xs text-slate-500">Perjalanan dedikasi kami mencetak generasi unggul.</p>
            </a>

            {{-- ITEM 2: VISI MISI --}}
            {{-- <a href="/tentang/visi-misi" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100">
                <div class="w-12 h-12 bg-indigo-50 rounded-lg flex items-center justify-center mb-4 text-2xl group-hover:scale-110 transition">
                    🎯
                </div>
                <h3 class="font-bold text-slate-800 mb-2 group-hover:text-indigo-600 transition">Visi & Misi</h3>
                <p class="text-xs text-slate-500">Komitmen dan arah tujuan pendidikan kami.</p>
            </a> --}}

            {{-- ITEM 3: STRUKTUR --}}
            <a href="/tentang/struktur" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100">
                <div class="w-12 h-12 bg-orange-50 rounded-lg flex items-center justify-center mb-4 text-2xl group-hover:scale-110 transition">
                    🏛️
                </div>
                <h3 class="font-bold text-slate-800 mb-2 group-hover:text-orange-600 transition">Struktur</h3>
                <p class="text-xs text-slate-500">Jajaran pimpinan dan manajemen profesional.</p>
            </a>

            {{-- ITEM 4: AKREDITASI --}}
            <a href="/tentang/akreditasi" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100">
                <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center mb-4 text-2xl group-hover:scale-110 transition">
                    🏆
                </div>
                <h3 class="font-bold text-slate-800 mb-2 group-hover:text-emerald-600 transition">Akreditasi</h3>
                <p class="text-xs text-slate-500">Penjaminan mutu resmi dan diakui negara.</p>
            </a>

        </div>
    </div>
</section>

{{-- ================= CTA ================= --}}
<section class="relative py-28 bg-white overflow-hidden">

    <div class="relative max-w-5xl mx-auto px-6 text-center">

        {{-- Title --}}
        <h2 class="text-4xl md:text-5xl font-extrabold leading-tight text-slate-900">
            Masa Depan Tidak Menunggu
        </h2>

        {{-- Subtitle --}}
        <p class="mt-6 text-lg max-w-2xl mx-auto text-slate-600">
            <span class="font-semibold">
                Bergabunglah sekarang
            </span>
            dan bangun karier bersama kampus yang menyiapkanmu
            untuk dunia kerja nyata, bukan sekadar teori.
        </p>

        {{-- BUTTON CTA --}}
        <div class="mt-14 flex justify-center">

            <a href="/admissions"
               class="group inline-flex items-center justify-center
               px-14 py-5 rounded-full font-bold text-lg
               bg-[#1E5FA3] text-white
               hover:bg-[#174C87]
               hover:scale-105
               shadow-md shadow-black/20
               transition-all duration-300">

                <span class="group-hover:tracking-wider transition">
                    Daftar Sekarang
                </span>

                <span class="ml-3 text-xl group-hover:translate-x-1 transition">
                    →
                </span>

            </a>

        </div>

    </div>

</section>

{{-- ================= JAVASCRIPT SIMPLE ================= --}}
<script>
    const modal = document.getElementById('newsModal');
    const backdrop = document.getElementById('modalBackdrop');
    const panel = document.getElementById('modalPanel');

    // Fungsi Buka Modal & Isi Data
    function openModal(title, content, image, date) {
        // Isi data ke elemen modal
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalContent').innerHTML = content; // Pakai innerHTML biar tag HTML di post kebaca
        document.getElementById('modalImg').src = image;
        document.getElementById('modalDate').innerText = date;

        // Tampilkan Modal dengan Animasi
        modal.classList.remove('hidden');
        
        // Sedikit delay biar transisi CSS jalan
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('scale-95', 'opacity-0');
            panel.classList.add('scale-100', 'opacity-100');
        }, 50);
        
        // Disable scroll body biar gak gerak belakangnya
        document.body.style.overflow = 'hidden';
    }

    // Fungsi Tutup Modal
    function closeModal() {
        backdrop.classList.add('opacity-0');
        panel.classList.remove('scale-100', 'opacity-100');
        panel.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Enable scroll lagi
        }, 300); // Sesuaikan sama durasi transition CSS
    }

    // Tutup kalau klik di luar panel (backdrop)
    window.onclick = function(event) {
        if (event.target == document.querySelector('#newsModal > div > div')) {
            closeModal();
        }
    }
</script>
@endsection