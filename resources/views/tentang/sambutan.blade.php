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
<div class="max-w-7xl mx-auto px-6 py-20 w-full">

{{-- ================= LOGO ================= --}}
@if($rektor?->logo_path)
<div class="flex justify-center mb-20 animate zoom-in">
    <div class="bg-white rounded-full px-12 py-6 shadow-2xl">
        <img 
            src="{{ asset('storage/' . $rektor->logo_path) }}"
            alt="Logo Kampus"
            class="h-20 md:h-24 object-contain"
        >
    </div>
</div>
@endif

{{-- ================= CONTENT ================= --}}
<div class="grid md:grid-cols-2 gap-16 items-center">

{{-- ================= KIRI : TEXT ================= --}}
<div class="text-white animate fade-up">

    <h1 class="text-3xl md:text-4xl font-extrabold mb-4 tracking-wide">
        Sambutan Rektor KampusGw
    </h1>

    <h2 class="text-xl md:text-2xl font-semibold mb-10 text-white/90">
        {{ $rektor->nama_rektor }}
    </h2>

        {{-- TEXT SAMBUTAN (FIXED HTML RENDER) --}}
    <div class="prose prose-xl md:prose-2xl prose-invert max-w-none leading-relaxed">
        {!! $rektor->sambutan_rektor !!}
    </div>

    <div class="mt-12 font-semibold">
        {{ $rektor->nama_rektor }}
        <div class="text-white/70 font-normal">
            Rektor
        </div>
    </div>

</div>

{{-- ================= KANAN : FOTO ================= --}}
<div class="flex justify-center md:justify-end overflow-visible animate fade-right">

<div class="relative w-72 h-[420px] md:w-96 md:h-[560px] translate-x-6">

    {{-- FRAME PUTIH --}}
    <div class="absolute inset-0 border-[14px] border-white rounded-3xl translate-x-6 translate-y-6"></div>

    {{-- FOTO --}}
    <img 
        src="{{ asset('storage/' . $rektor->foto_rektor) }}"
        alt="{{ $rektor->nama_rektor }}"
        class="relative z-10 w-full h-full object-cover rounded-3xl shadow-2xl"
    >

</div>
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
