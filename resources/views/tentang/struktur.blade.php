@extends('layout.main')
@section('title','Struktur Organisasi')

@section('content')

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* ================= BACKGROUND ================= */
.section-bg {
    background-color: #f8fafc; /* broken white */
}

/* ================= CARD ================= */
.box {
    background-color: #e0f2fe; /* SKY BLUE */
    border: 1px solid #bae6fd;
    transition: .3s ease;
}
.box:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(21,27,84,.25);
    border-color: #38bdf8;
}

/* ================= TABLE ================= */
.table-border {
    border: 2px solid #151B54; /* NAVY */
}
</style>

{{-- ================= HEADER ================= --}}
<section class="py-16 section-bg">
<div class="max-w-5xl mx-auto px-6 text-center"
     data-aos="fade-down">
    <h1 class="text-4xl font-bold text-[#151B54]">
        Struktur Organisasi
    </h1>
    <p class="text-slate-600 mt-2">
        Daftar Pejabat Struktural
    </p>
</div>
</section>

{{-- ================= GRID STRUKTUR ================= --}}
<section class="section-bg py-14">

<div class="max-w-7xl mx-auto px-6">

{{-- ===== TOP ===== --}}
@if($top)
<div class="box rounded-2xl overflow-hidden max-w-lg mx-auto mb-14"
     data-aos="zoom-in">

    <img src="{{ asset('storage/'.$top->photo) }}"
         class="w-full h-64 object-cover">

    <div class="p-6 text-center">
        <h3 class="text-xl font-semibold text-slate-800">
            {{ $top->name }}
        </h3>

        <p class="text-[#151B54] text-sm mt-1 font-medium">
            {{ strtoupper(str_replace('_',' ',$top->position)) }}
        </p>
    </div>
</div>
@endif

{{-- ===== BOTTOM GRID ===== --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

@foreach($bottom as $row)
<div class="box rounded-2xl overflow-hidden"
     data-aos="fade-up">

    <img src="{{ asset('storage/'.$row->photo) }}"
         class="w-full h-52 object-cover">

    <div class="p-5 text-center">
        <p class="font-semibold text-slate-800">
            {{ $row->name }}
        </p>

        <p class="text-[#151B54] text-sm mt-1 font-medium">
            {{ strtoupper(str_replace('_',' ',$row->position)) }}
        </p>
    </div>
</div>
@endforeach

</div>
</div>
</section>

{{-- ================= TABEL ================= --}}
<section class="section-bg py-16">

<div class="max-w-7xl mx-auto px-6">

<h2 class="text-2xl font-semibold text-[#151B54] mb-8 text-center"
    data-aos="fade-up">
    Daftar Pemegang Jabatan
</h2>

<div class="overflow-x-auto rounded-2xl shadow-lg"
     data-aos="fade-up">

<table class="w-full text-sm rounded-2xl overflow-hidden">

    {{-- HEADER --}}
    <thead>
        <tr class="bg-[#151B54] text-white text-base">
            <th class="px-6 py-4 text-center w-20">No.</th>
            <th class="px-6 py-4 text-left">Jabatan</th>
            <th class="px-6 py-4 text-left">Nama</th>
            <th class="px-6 py-4 text-left">Kategori</th>
        </tr>
    </thead>

    {{-- BODY --}}
    <tbody class="text-[#0f2a44]">

    @foreach($all as $row)
        <tr class="{{ $loop->odd ? 'bg-sky-50' : 'bg-sky-100' }}
                   hover:bg-sky-200 transition">

            <td class="px-6 py-4 text-center font-semibold">
                {{ $loop->iteration }}.
            </td>

            <td class="px-6 py-4 font-semibold">
                {{ strtoupper(str_replace('_',' ',$row->position)) }}
            </td>

            <td class="px-6 py-4">
                {{ $row->name }}
            </td>

            <td class="px-6 py-4">
                {{ $row->category }}
            </td>
        </tr>
    @endforeach

    </tbody>

</table>

</div>
</div>
</section>


{{-- ================= AOS ================= --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({
    duration: 900,
    easing: 'ease-out-cubic',
    once: true
});
</script>

@endsection
