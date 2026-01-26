@extends('layout.main')
@section('title','Faculties')

@section('content')

 {{-- HERO --}}
<section class="relative h-[85vh] overflow-hidden flex items-center justify-center">
{{-- Background Image --}}
<img 
    src="{{ asset('storage/images/kampusgw.jpg') }}"
    class="absolute inset-0 w-full h-full object-cover scale-80"
    alt="Kampus GW"
>

    {{-- Dark Overlay --}}
    <div class="absolute inset-0 bg-black/65"></div>

    {{-- Gradient Accent --}}
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/40 via-transparent to-sky-900/40"></div>

    {{-- Content --}}
    <div class="relative max-w-7xl mx-auto px-6 text-center">

        <h1 data-aos="fade-up"
            class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-xl">
            Fakultas <span class="text-sky-400">Unggulan</span>
        </h1>

        <p data-aos="fade-up" data-aos-delay="100"
           class="mt-6 text-slate-100 max-w-xl mx-auto">
            Program studi berbasis industri global untuk masa depanmu.
        </p>

    </div>

</section>


{{-- FACULTIES GRID --}}
<section class="py-28 bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-900 text-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 data-aos="fade-up"
                class="text-4xl font-extrabold">
                Pilih Fakultas Favoritmu
            </h2>

            <p data-aos="fade-up" data-aos-delay="100"
               class="text-slate-400 mt-3">
                Siapkan karier global sejak hari pertama
            </p>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($faculties as $faculty)

            <div data-aos="zoom-in"
                class="group relative rounded-2xl overflow-hidden
                bg-white/5 border border-white/10
                hover:border-sky-400/40
                hover:shadow-xl hover:shadow-sky-500/20
                transition duration-300">

                {{-- Image --}}
                <div class="relative h-56 overflow-hidden">

                    <img src="{{ asset('storage/'.$faculty->image) }}"
                         alt="{{ $faculty->name }}"
                         class="w-full h-full object-cover
                         group-hover:scale-110 transition duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t
                        from-black/70 via-black/30 to-transparent"></div>

                </div>

                {{-- Content --}}
                <div class="p-6">

                    <h3 class="text-lg font-bold mb-2">
                        {{ $faculty->name }}
                    </h3>

                    <p class="text-slate-300 text-sm leading-relaxed">
                        {{ Str::limit($faculty->description ?? 'Program unggulan berbasis teknologi dan industri.', 90) }}
                    </p>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection
