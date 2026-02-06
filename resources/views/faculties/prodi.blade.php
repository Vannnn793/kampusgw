@extends('layout.main')
@section('title','Program Studi Detail')
@section('content')

{{-- <section class="py-28 bg-slate-950 text-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 data-aos="fade-up"
                class="text-4xl font-extrabold">
                Program Studi
            </h2>
            <p class="text-slate-400 mt-3">
                Pilih program studi sesuai minat dan karier masa depan
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($prodi->faculty->prodis as $prodi)
            <a href="{{ url('/prodi/'.$prodi->id) }}"
               data-aos="zoom-in"
               class="group relative rounded-2xl overflow-hidden
                      bg-white/5 border border-white/10
                      hover:border-sky-400/40
                      hover:shadow-xl hover:shadow-sky-500/20
                      transition duration-300 p-6">

                <h3 class="text-xl font-bold mb-2 group-hover:text-sky-400 transition">
                    {{ $prodi->name }}
                </h3>

                <p class="text-slate-400 text-sm">
                    {{ $prodi->degree }}
                </p>

            </a>
            @endforeach

        </div>

    </div>

</section> --}}
{{-- HERO --}}
<section class="relative h-[65vh] flex items-center justify-center overflow-hidden">

    <img src="{{ asset('storage/'.$prodi->image) }}"
         class="absolute inset-0 w-full h-full object-cover scale-105"
         alt="{{ $prodi->name }}">

    {{-- overlay terang --}}
    <div class="absolute inset-0 bg-white/60"></div>

    <div class="relative text-center max-w-4xl px-6">
        <h1 data-aos="fade-up"
            class="text-5xl font-extrabold text-slate-900">
            {{ $prodi->name }}
        </h1>

        <p data-aos="fade-up" data-aos-delay="100"
           class="mt-4 text-slate-700 text-lg">
            {{ $prodi->goal }}
        </p>
    </div>

</section>

{{-- DESKRIPSI & TUJUAN --}}
<section class="py-28 bg-[#9DC7F4]">

<div class="max-w-5xl mx-auto px-6 space-y-16">

    {{-- DESKRIPSI --}}
    <div data-aos="fade-up"
         class="rounded-2xl bg-white border border-slate-200 p-8 shadow">
        <h2 class="text-2xl font-bold mb-4 text-[#1583D7]">
            Deskripsi
        </h2>
        <p class="text-slate-800 leading-relaxed">
            {{ $prodi->description }}
        </p>
    </div>

    {{-- TUJUAN --}}
    <div data-aos="fade-up"
         class="rounded-2xl bg-white border border-slate-200 p-8 shadow">
        <h2 class="text-2xl font-bold mb-4 text-[#1583D7]">
            Tujuan
        </h2>
        <p class="text-slate-800 leading-relaxed">
            {{ $prodi->goal }}
        </p>
    </div>

</div>

</section>

{{-- KURIKULUM --}}
<section class="py-28 bg-white">

<div class="max-w-7xl mx-auto px-6">

<h2 class="text-3xl font-bold mb-16 text-center text-slate-900">
    Kurikulum Program Studi
</h2>

@php
    $grouped = $prodi->curriculums->groupBy(function ($item) {
        return $item->semester <= 4 ? '1-4' : '5-8';
    });
@endphp

@foreach($grouped as $label => $curriculums)
<div class="mb-20">

    <h3 class="text-2xl font-bold mb-10 text-[#1583D7] text-center">
        Semester {{ $label }}
    </h3>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($curriculums as $curriculum)

        <div data-aos="fade-up"
             class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            {{-- HEADER SEMESTER --}}
            <div class="bg-[#9DC7F4] px-4 py-3 text-center">
                <span class="block text-xs uppercase tracking-widest text-slate-700">
                    Semester
                </span>
                <span class="text-2xl font-extrabold text-slate-900">
                    {{ $curriculum->semester }}
                </span>
            </div>

            {{-- TABLE --}}
            <table class="w-full text-sm text-slate-800">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="p-3 text-left font-semibold">Mata Kuliah</th>
                        <th class="p-3 text-center font-semibold w-16">SKS</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($curriculum->courses as $course)
                    <tr class="border-t hover:bg-slate-50">
                        <td class="p-3">{{ $course->name }}</td>
                        <td class="p-3 text-center">{{ $course->sks }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        @endforeach
    </div>

</div>
@endforeach

</div>
</section>

{{-- TENTANG FAKULTAS --}}
<section class="py-32 bg-[#9DC7F4]">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-white border border-slate-200 rounded-2xl p-10 shadow">

            <h2 class="text-3xl font-bold mb-4 text-slate-900">
                Tentang Fakultas
            </h2>

            <h3 class="text-2xl font-bold mt-10 mb-4 text-[#1583D7]">
                Keunggulan
            </h3>

            <ul class="list-disc pl-6 text-slate-800 space-y-2">
                <li>Kurikulum industri</li>
                <li>Dosen praktisi profesional</li>
                <li>Program magang wajib</li>
                <li>Sertifikasi internasional</li>
            </ul>

            <div class="mt-10">
                <a href="/faculties"
                   class="inline-block px-6 py-3 bg-[#1583D7] text-white rounded-xl font-bold hover:scale-105 transition">
                    ← Kembali ke Faculties
                </a>
            </div>

        </div>

    </div>
</section>

{{-- ================= AOS ================= --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<style>
@keyframes zoomHero {
    0%   { transform: scale(1); }
    50%  { transform: scale(1.08); }
    100% { transform: scale(1); }
}
</style>

<script>
AOS.init({
    duration: 800,
    easing: 'ease-out-cubic',
    once: true
});
</script>
@endsection