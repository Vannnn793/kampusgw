@extends('layout.main')

@section('title', 'Sambutan Rektor')

@section('content')

{{-- ================= STYLE ANIMATION ================= --}}
<style>
.fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.9s ease;
}

.fade-right {
    opacity: 0;
    transform: translateX(60px);
    transition: all 1s ease;
}

.zoom-in {
    opacity: 0;
    transform: scale(0.8);
    transition: all 0.9s ease;
}

.show {
    opacity: 1 !important;
    transform: translate(0) scale(1) !important;
}
</style>

{{-- ================= PAGE ================= --}}
<section class="min-h-screen bg-gradient-to-br from-[#1583D7] to-[#0f5ea8] flex items-center">
<div class="max-w-7xl mx-auto px-5 py-20 w-full">
{{-- ================= LOGO ================= --}}
@if($rektor?->logo_path)
<div class="flex justify-center mb-14 animate zoom-in">
    <a href="/" class="flex items-center gap-3 group bg-white rounded-full px-10 py-5 shadow-xl">
        
        {{-- LOGO --}}
        <img 
            src="{{ asset('storage/' . $rektor->logo_path) }}"
            alt="Logo Kampus"
            class="h-16 md:h-20 w-auto object-contain 
                   group-hover:scale-105 transition-transform duration-300"
        >

        {{-- TEKS --}}
        <div class="flex flex-col">
            <span class="text-xl md:text-2xl font-black text-sky-600 tracking-tight leading-none uppercase">
                {{ $profile->campus_name ?? 'KampusGW' }}
            </span>
            <span class="text-[10px] font-bold text-slate-400 tracking-[0.18em] uppercase mt-1">
                University Profile
            </span>
        </div>

    </a>
</div>
@endif


{{-- ================= CONTENT ================= --}}
<div class="grid md:grid-cols-2 gap-16 items-center">

{{-- ================= KIRI : TEXT ================= --}}
<div class="text-white animate fade-up">

    <h1 class="text-4xl md:text-5xl xl:text-6xl font-extrabold mb-6 tracking-wide">
        Sambutan Rektor KampusGw
    </h1>

    <h2 class="text-2xl md:text-3xl xl:text-4xl font-semibold mb-12 text-white/90">
        {{ $rektor->nama_rektor }}
    </h2>

    {{-- TEXT SAMBUTAN --}}
    <div class="prose prose-2xl md:prose-3xl prose-invert max-w-none leading-relaxed">
        {!! $rektor->sambutan_rektor !!}
    </div>

    <div class="mt-14 text-xl md:text-2xl font-semibold">
        {{ $rektor->nama_rektor }}
        <div class="text-white/70 font-normal text-lg md:text-xl">
            Rektor
        </div>
    </div>

</div>


{{-- ================= KANAN : FOTO ================= --}}
<div class="flex justify-center md:justify-end overflow-visible animate fade-right">

    <div class="relative 
                w-80 h-[520px]
                md:w-[420px] md:h-[620px]
                xl:w-[480px] xl:h-[700px]
                translate-x-6
                overflow-hidden
                rounded-t-2xl
                rounded-b-[140px]
                shadow-2xl
                bg-white">

        <img 
            src="{{ asset('storage/' . $rektor->foto_rektor) }}"
            alt="{{ $rektor->nama_rektor }}"
            class="w-full h-full object-cover object-top"
        >

    </div>

</div>

</div>
</section>

{{-- ================= SCRIPT ANIMATION ================= --}}
<script>
document.addEventListener("DOMContentLoaded", () => {

    const elements = document.querySelectorAll('.animate');

    elements.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add('show');
        }, index * 250);
    });

});
</script>

@endsection
