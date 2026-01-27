@extends('layout.main')
@section('title','Faculty Detail')

@section('content')

{{-- <section class="min-h-[60vh] flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
    <div class="max-w-7xl mx-auto px-6 text-center">

        {{-- <h1 class="text-5xl font-extrabold capitalize">
            {{ str_replace('-', ' ', $slug) }}
        </h1> --}}

        {{-- <p class="mt-4 text-slate-300">
            Program unggulan dengan standar industri global.
        </p> --}}

    {{-- </div>
</section> --}}

{{-- HERO FACULTY --}}
<section class="relative h-[70vh] overflow-hidden flex items-center justify-center">

    <img src="{{ asset('storage/'.$faculty->image) }}"
         class="absolute inset-0 w-full h-full object-cover scale-105"
         alt="{{ $faculty->name }}">

    <div class="absolute inset-0 bg-black/65"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/40 via-transparent to-sky-900/40"></div>

    <div class="relative max-w-5xl mx-auto px-6 text-center text-white">
        <h1 data-aos="fade-up"
            class="text-5xl md:text-6xl font-extrabold drop-shadow-xl">
            Fakultas {{ $faculty->name }}
        </h1>

        <p data-aos="fade-up" data-aos-delay="100"
           class="mt-6 text-slate-200 max-w-2xl mx-auto">
            {{ $faculty->description }}
        </p>
    </div>

</section>

<section class="py-28 bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-900 text-white">

    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12">

        <div data-aos="fade-right"
             class="rounded-2xl bg-white/5 border border-white/10 p-8">
            <h2 class="text-2xl font-bold mb-4 text-sky-400">Visi</h2>
            <p class="text-slate-300 leading-relaxed">
                {{ $faculty->vision }}
            </p>
        </div>

        <div data-aos="fade-left"
             class="rounded-2xl bg-white/5 border border-white/10 p-8">
            <h2 class="text-2xl font-bold mb-4 text-sky-400">Misi</h2>
            <p class="text-slate-300 leading-relaxed whitespace-pre-line">
                {{ $faculty->mission }}
            </p>
        </div>

    </div>

</section>

<section class="py-28 bg-slate-950 text-white">

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold mb-12 text-center">
            Program Studi di Fakultas {{ $faculty->name }}
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            @foreach ($faculty->prodis as $prodi)
            <a href="{{ route('faculties.prodis.show', ['faculty' => $faculty->id, 'prodi' => $prodi->id]) }}"
               data-aos="fade-up"
               class="block rounded-2xl bg-white/5 border border-white/10 p-6 hover:bg-white/10 transition">

                <h3 class="text-xl font-semibold mb-2">
                    {{ $prodi->name }}
                </h3>

                <p class="text-slate-300">
                    {{ Str::limit($prodi->description, 100, '...') }}
                </p>
            </a>
            @endforeach

        </div>

    </div>

</section>

@endsection
