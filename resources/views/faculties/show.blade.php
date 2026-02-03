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

    {{-- Overlay putih transparan --}}
    <div class="absolute inset-0 bg-white/50"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-white/20"></div>

    {{-- Teks hero --}}
    <div class="relative max-w-5xl mx-auto px-6 text-center">
        <h1 data-aos="fade-up"
            class="text-5xl md:text-6xl font-extrabold text-slate-900 drop-shadow-lg">
            Fakultas {{ $faculty->name }}
        </h1>

        <p data-aos="fade-up" data-aos-delay="100"
           class="mt-6 text-slate-900 text-lg drop-shadow-sm max-w-2xl mx-auto">
            {{ $faculty->description }}
        </p>
    </div>

</section>

{{-- ================= VISI & MISI ================= --}}
@if($faculty && ($faculty->vision || $faculty->mission))
<section class="bg-slate-100 py-32">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-4xl font-bold text-slate-900 mb-20 text-center"
            data-aos="fade-up">
            Misi & Visi
        </h2>

        <div class="grid md:grid-cols-2 gap-14">

            {{-- MISI --}}
            <div class="bg-[#151B54]
                        rounded-3xl p-10
                        shadow-lg hover:shadow-xl transition"
                 data-aos="fade-right"
                 data-aos-delay="150">

                <h3 class="text-2xl font-bold text-white mb-6 text-center">
                    Misi
                </h3>

                <div class="prose max-w-none italic
                            text-slate-100
                            [&_*]:!text-slate-100
                            [&_a]:!text-sky-300
                            [&_strong]:!text-white
                            [&_em]:!text-slate-200
                            [&_li]:text-lg
                            [&_p]:text-lg
                            text-center">
                    {!! nl2br(e($faculty->mission)) !!}
                </div>
            </div>

            {{-- VISI --}}
            <div class="bg-[#E0B100]
                        rounded-3xl p-12
                        shadow-xl"
                 data-aos="fade-left"
                 data-aos-delay="150">

                <h3 class="text-3xl font-bold text-slate-900 mb-8 text-center">
                    Visi
                </h3>

                <div class="prose max-w-none italic text-center
                            prose-p:text-slate-900
                            prose-p:text-xl
                            prose-p:leading-relaxed">
                    {!! nl2br(e($faculty->vision)) !!}
                </div>
            </div>

        </div>
    </div>
</section>
@endif


{{-- Program Studi --}}
<section class="py-28 bg-white text-slate-800">

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold mb-12 text-center text-slate-900">
            Program Studi di Fakultas {{ $faculty->name }}
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            @foreach ($faculty->prodis as $prodi)
            <a href="{{ route('faculties.prodis.show', ['faculty' => $faculty->id, 'prodi' => $prodi->id]) }}"
               data-aos="fade-up"
               class="block rounded-2xl bg-[#CDE2F9] border border-slate-200 p-6 hover:bg-[#B9D4F2] transition">

                <h3 class="text-xl font-semibold mb-2 text-slate-900">
                    {{ $prodi->name }}
                </h3>

                <p class="text-slate-800">
                    {{ Str::limit($prodi->description, 100, '...') }}
                </p>
            </a>
            @endforeach

        </div>

    </div>

</section>

@endsection
