@extends('layout.main')

@section('title', 'Penerimaan Mahasiswa Baru')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<div class="relative py-20 md:py-32 lg:py-40 overflow-hidden">
    
    {{-- 1. Background Image --}}
    <div class="absolute inset-0">
        {{-- Gambar Mahasiswa / Kampus --}}
        <img 
            src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop" 
            class="w-full h-full object-cover object-center brightness-50"
            alt="PMB Background"
        >
        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-sky-900/60 to-transparent mix-blend-multiply"></div>
    </div>

    {{-- 2. Hero Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <span class="inline-block py-1 px-3 rounded-full bg-sky-500/20 border border-sky-400/30 backdrop-blur-md text-sky-200 text-[10px] font-black uppercase tracking-[0.2em] mb-6">
            Tahun Akademik {{ date('Y') }}/{{ date('Y')+1 }}
        </span>

        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight drop-shadow-xl">
            Bergabunglah Menjadi <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 to-white">
                Bagian Dari Masa Depan
            </span>
        </h1>

        <p class="text-lg text-slate-200 max-w-2xl mx-auto font-medium leading-relaxed mb-10">
            Pilih jalur masuk yang sesuai dengan potensimu. Kami membuka berbagai kesempatan untuk talenta terbaik bangsa.
        </p>

    </div>
</div>

{{-- ================= CONTENT WRAPPER ================= --}}
<section class="bg-slate-50 relative z-20 -mt-20 rounded-t-[3rem] min-h-screen">
    
    {{-- Decorative Line --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        {{-- Section Header --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-slate-900 mb-4 flex items-center justify-center gap-3">
                <span class="w-12 h-1 bg-sky-500 rounded-full"></span>
                Jalur Penerimaan
                <span class="w-12 h-1 bg-sky-500 rounded-full"></span>
            </h2>
            <p class="text-slate-500">Silakan pilih jalur pendaftaran yang sedang aktif di bawah ini.</p>
        </div>

        {{-- Grid Jalur PMB --}}
        <div id="jalur" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($pmbs as $pmb)
            <div class="group relative bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 flex flex-col h-full">

                {{-- 1. Thumbnail Area --}}
                <div class="h-64 relative overflow-hidden">
                    {{-- Image --}}
                    @if($pmb->image)
                        <img src="{{ asset('storage/'.$pmb->image) }}"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                            <i class="bi bi-mortarboard text-6xl opacity-50"></i>
                        </div>
                    @endif
                    
                    {{-- Overlay Gradient --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-80"></div>

                    {{-- Status Badge (Absolute) --}}
                    <div class="absolute top-5 right-5">
                        <span class="bg-emerald-500 text-white text-[10px] font-black px-3 py-1.5 rounded-xl uppercase tracking-wider shadow-lg flex items-center gap-1.5">
                            <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                            Dibuka
                        </span>
                    </div>

                    {{-- Title (Overlay di Gambar) --}}
                    <div class="absolute bottom-5 left-5 right-5">
                        <h3 class="text-2xl font-black text-white leading-tight shadow-black drop-shadow-md">
                            {{ $pmb->title }}
                        </h3>
                    </div>
                </div>

                {{-- 2. Card Body --}}
                <div class="p-8 flex flex-col flex-1">
                    
                    {{-- Timeline Info --}}
                    <div class="bg-sky-50 rounded-2xl p-4 mb-6 border border-sky-100 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-sky-500 text-white flex items-center justify-center shrink-0 shadow-md">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <div>
                            <p class="text-[10px] text-sky-600 font-bold uppercase tracking-wider mb-0.5">Masa Pendaftaran</p>
                            <p class="text-xs font-bold text-slate-700">
                                {{ \Carbon\Carbon::parse($pmb->start_date)->format('d M') }} 
                                <span class="text-slate-400 mx-1">-</span>
                                {{ \Carbon\Carbon::parse($pmb->end_date)->format('d M Y') }}
                            </p>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-3">
                        {{ Str::limit(strip_tags($pmb->content), 150) }}
                    </div>

                    {{-- CTA Button --}}
                    <div class="mt-auto">
                        <a href="{{ route('pmb.show', $pmb->slug) }}" 
                           class="w-full block py-4 rounded-xl bg-slate-900 text-white text-center text-xs font-bold uppercase tracking-widest hover:bg-sky-600 transition-colors shadow-lg group-hover:shadow-sky-500/30">
                            Lihat Persyaratan
                        </a>
                    </div>

                </div>

            </div>
            @empty
            
            {{-- Empty State --}}
            <div class="col-span-full py-20">
                <div class="max-w-md mx-auto text-center p-10 bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                        <i class="bi bi-calendar-x text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Jalur Dibuka</h3>
                    <p class="text-slate-500 mb-6 text-sm">Saat ini belum ada jalur pendaftaran mahasiswa baru yang aktif. Silakan kembali lagi nanti.</p>
                    <a href="/" class="text-sky-600 font-bold text-sm hover:underline">Kembali ke Beranda</a>
                </div>
            </div>

            @endforelse

        </div>

        {{-- Additional Info / FAQ Teaser --}}
        <div class="mt-24 grid md:grid-cols-2 gap-8 items-center bg-white p-8 md:p-12 rounded-[3rem] shadow-xl border border-slate-100">
            <div>
                <h3 class="text-2xl font-black text-slate-800 mb-4">Bingung Memilih Jalur?</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    Konsultasikan pilihan jurusan dan jalur masukmu dengan tim admisi kami. Kami siap membantu merencanakan masa depanmu.
                </p>
                <div class="flex gap-4">
                    <a href="#footer" class="px-6 py-3 bg-sky-600 text-white rounded-xl font-bold text-sm hover:bg-sky-700 transition shadow-lg shadow-sky-200">
                        <i class="bi bi-whatsapp mr-2"></i> Chat Admisi
                    </a>
                    <a href="#jalur" class="px-6 py-3 bg-slate-100 text-slate-700 rounded-xl font-bold text-sm hover:bg-slate-200 transition">
                        Download Brosur
                    </a>
                </div>
            </div>
            <div class="relative h-64 md:h-full min-h-[250px] rounded-2xl overflow-hidden hidden md:block">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>

    </div>
</section>

@endsection