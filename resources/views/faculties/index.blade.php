@extends('layout.main')
@section('title','Faculties')

@section('content')

{{-- HERO --}}
<section class="relative h-[85vh] overflow-hidden flex items-center justify-center">

    {{-- Background Image --}}
    <img 
        src="{{ asset('storage/images/kampusgw.jpg') }}"
        class="absolute inset-0 w-full h-full object-cover scale-105"
        alt="Kampus GW"
    >

    {{-- Light Overlay --}}
    <div class="absolute inset-0 bg-white/70"></div>

    {{-- Content --}}
    <div class="relative max-w-7xl mx-auto px-6 text-center">

        <h1 data-aos="fade-up"
            class="text-5xl md:text-6xl font-extrabold text-slate-900">
            Fakultas <span class="text-[#1583D7]">Unggulan</span>
        </h1>

        <p data-aos="fade-up" data-aos-delay="100"
           class="mt-6 text-slate-700 max-w-xl mx-auto text-lg">
            Program studi berbasis industri global untuk masa depanmu.
        </p>

    </div>

</section>


{{-- FACULTIES GRID --}}
<section class="py-28 bg-[#9DC7F4]">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 data-aos="fade-up"
                class="text-4xl font-extrabold text-slate-900">
                Pilih Fakultas Favoritmu
            </h2>

            <p data-aos="fade-up" data-aos-delay="100"
               class="text-slate-700 mt-3">
                Siapkan karier global sejak hari pertama
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($faculties as $faculty)
        <a href="{{ route('faculties.show', $faculty->slug) }}"
           data-aos="zoom-in"
           class="group block rounded-2xl overflow-hidden
                  bg-white border border-slate-200
                  hover:shadow-xl hover:-translate-y-1
                  transition duration-300">

            {{-- Image --}}
            <div class="relative h-56 overflow-hidden">
                <img src="{{ asset('storage/'.$faculty->image) }}"
                     alt="{{ $faculty->name }}"
                     class="w-full h-full object-cover
                            group-hover:scale-110 transition duration-500">

                {{-- soft overlay --}}
                <div class="absolute inset-0 bg-white/10"></div>
            </div>

            {{-- Content --}}
            <div class="p-6">
                <h3 class="text-lg font-bold mb-2 text-slate-900">
                    {{ $faculty->name }}
                </h3>

                <p class="text-slate-700 text-sm leading-relaxed">
                    {{ Str::limit($faculty->description ?? 'Program unggulan berbasis teknologi dan industri.', 90) }}
                </p>
            </div>

        </a>
        @endforeach
        </div>

    </div>
</section>

@endsection
