@extends('layout.main')
@section('title', 'Sambutan Rektor')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    {{-- 1. Background Image --}}
    <div class="absolute inset-0">
        {{-- Gunakan foto kampus, bukan foto rektor di sini, supaya foto rektor eksklusif di bawah --}}
        <img 
            src="{{ $profile && $profile->gambar_kampus ? asset('storage/'.$profile->gambar_kampus) : asset('storage/images/default-campus.jpg') }}" 
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Latar Belakang Kampus" 
        >
        {{-- Overlay Biru Tua --}}
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    {{-- 2. Konten Hero --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-500/20 border border-sky-300/30 backdrop-blur-md text-sky-100 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-300 animate-pulse"></span>
            Official Message
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight animate-fade-up">
            Sambutan Rektor <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">
                {{ $profile->campus_name ?? 'Kampus Kami' }}
            </span>
        </h1>

        <p class="text-lg text-sky-100 max-w-2xl mx-auto font-light animate-fade-up delay-100">
            Mewujudkan visi pendidikan yang berkemajuan, berintegritas, dan mendunia.
        </p>
    </div>
</div>

{{-- ================= CONTENT WRAPPER ================= --}}
<section class="bg-sky-50/50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    {{-- Garis Dekorasi --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        <div class="grid lg:grid-cols-12 gap-12 items-start">

            {{-- ================= KOLOM KIRI (FOTO & BIO) ================= --}}
            <div class="lg:col-span-4" data-aos="fade-right">
                <div class="sticky top-32">
                    
                    {{-- Kartu Foto Rektor --}}
                    <div class="relative group">
                        {{-- Background Decoration --}}
                        <div class="absolute -inset-1 bg-gradient-to-br from-sky-400 to-blue-600 rounded-[2rem] blur opacity-30 group-hover:opacity-50 transition duration-1000"></div>
                        
                        <div class="relative bg-white rounded-[2rem] p-3 shadow-2xl shadow-sky-900/10 border border-white">
                            <div class="rounded-[1.5rem] overflow-hidden aspect-[3/4] relative bg-slate-100">
                                @if($rektor && $rektor->foto_rektor)
                                    <img 
                                        src="{{ asset('storage/' . $rektor->foto_rektor) }}" 
                                        alt="{{ $rektor->nama_rektor }}"
                                        class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-700"
                                    >
                                @else
                                    <div class="flex items-center justify-center h-full text-slate-300">
                                        <i class="bi bi-person-fill text-6xl"></i>
                                    </div>
                                @endif
                                
                                {{-- Overlay Nama di Foto (Mobile Only/Style) --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-60"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Nama & Jabatan (Di Bawah Foto) --}}
                    <div class="text-center mt-8">
                        <h2 class="text-2xl font-black text-slate-800 mb-1">
                            {{ $rektor->nama_rektor ?? 'Nama Rektor' }}
                        </h2>
                        <p class="text-sky-600 font-bold uppercase tracking-widest text-sm mb-4">
                            Rektor {{ $profile->campus_name ?? 'Universitas' }}
                        </p>
                        
                        {{-- Social / Contact Icon (Opsional) --}}
                        <div class="flex justify-center gap-3">
                            <span class="w-16 h-1 bg-gradient-to-r from-sky-400 to-blue-500 rounded-full"></span>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ================= KOLOM KANAN (ISI SAMBUTAN) ================= --}}
            <div class="lg:col-span-8" data-aos="fade-up">
                
                <div class="bg-white rounded-[2.5rem] p-8 md:p-12 border border-sky-100 shadow-xl shadow-sky-100/50 relative overflow-hidden">
                    
                    {{-- Watermark Logo (Background) --}}
                    @if($rektor && $rektor->logo_path)
                    <img src="{{ asset('storage/' . $rektor->logo_path) }}" 
                         class="absolute -top-10 -right-10 w-64 opacity-[0.03] grayscale pointer-events-none" 
                         alt="Watermark">
                    @endif

                    {{-- Header Surat --}}
                    <div class="flex items-center gap-4 mb-10 pb-10 border-b border-slate-100">
                        <div class="w-14 h-14 rounded-2xl bg-sky-50 flex items-center justify-center text-sky-600 text-3xl">
                            <i class="bi bi-quote"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Assalamualaikum Wr. Wb.</h3>
                            <p class="text-slate-500 text-sm">Salam sejahtera bagi kita semua.</p>
                        </div>
                    </div>

                    {{-- Isi Sambutan --}}
                    <div class="prose prose-lg prose-slate max-w-none 
                                prose-p:leading-relaxed prose-p:text-slate-600 
                                prose-headings:font-bold prose-headings:text-slate-800
                                prose-strong:text-sky-700
                                prose-a:text-sky-600 prose-a:no-underline hover:prose-a:underline">
                        
                        @if($rektor && $rektor->sambutan_rektor)
                            {!! $rektor->sambutan_rektor !!}
                        @else
                            <p class="italic text-slate-400">Belum ada teks sambutan.</p>
                        @endif

                    </div>

                    {{-- Footer / Tanda Tangan --}}
                    <div class="mt-16 pt-10 border-t border-slate-100 flex flex-col items-end text-right">
                        {{-- Tanggal Otomatis (Opsional) --}}
                        <p class="text-slate-400 text-sm mb-6">{{ date('F Y') }}</p>
                        
                        @if($rektor && $rektor->logo_path)
                            {{-- Logo Kampus Kecil --}}
                            <img src="{{ asset('storage/' . $rektor->logo_path) }}" class="h-16 w-auto mb-4 opacity-80" alt="Logo">
                        @endif

                        <h4 class="font-bold text-slate-800 text-lg">{{ $rektor->nama_rektor ?? 'Nama Rektor' }}</h4>
                        <p class="text-slate-500 text-sm">Rektor</p>
                    </div>

                </div>

            </div>

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