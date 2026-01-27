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

<section class="relative h-[65vh] flex items-center justify-center overflow-hidden">
    
    <img src="{{ asset('storage/'.$prodi->image) }}"
         class="absolute inset-0 w-full h-full object-cover scale-105"
         alt="{{ $prodi->name }}">

    <div class="absolute inset-0 bg-gradient-to-br from-indigo-950 via-slate-950 to-sky-950"></div>

    <div class="relative text-center text-white max-w-4xl px-6">
        <h1 data-aos="fade-up"
            class="text-5xl font-extrabold">
            {{ $prodi->name }}
        </h1>

        <p data-aos="fade-up" data-aos-delay="100"
           class="mt-4 text-slate-300">
            {{ $prodi->goal }}
        </p>
    </div>

</section>

<section class="py-28 bg-slate-950 text-white">

<div class="max-w-5xl mx-auto px-6 space-y-16">

    {{-- DESKRIPSI --}}
    <div data-aos="fade-up"
         class="rounded-2xl bg-white/5 border border-white/10 p-8">
        <h2 class="text-2xl font-bold mb-4 text-sky-400">Deskripsi</h2>
        <p class="text-slate-300">{{ $prodi->description }}</p>
    </div>

    {{-- TUJUAN --}}
    <div data-aos="fade-up"
         class="rounded-2xl bg-white/5 border border-white/10 p-8">
        <h2 class="text-2xl font-bold mb-4 text-sky-400">Tujuan</h2>
        <p class="text-slate-300">{{ $prodi->goal }}</p>
    </div>

</div>

</section>

<section class="py-28 bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-900 text-white">

<div class="max-w-6xl mx-auto px-6">

<h2 class="text-3xl font-bold mb-12 text-center">
  Kurikulum Program Studi
</h2>

@foreach($prodi->curriculums as $curriculum)
<div data-aos="fade-up" class="mb-12">

    <h3 class="text-xl font-semibold mb-4 text-sky-400">
    Semester {{ $curriculum->semester }}
    </h3>

    <div class="overflow-hidden rounded-xl border border-white/10">
        <table class="w-full text-sm">
            <thead class="bg-white/5">
                <tr>
                    <th class="p-4 text-left">Mata Kuliah</th>
                    <th class="p-4 text-left">SKS</th>
                </tr>
            </thead>
            <tbody>
            @foreach($curriculum->courses as $course)
                <tr class="border-t border-white/10 hover:bg-white/5">
                    <td class="p-4">{{ $course->name }}</td>
                    <td class="p-4">{{ $course->sks }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    </div>
    @endforeach

</div>
</section>


<section class="py-32 bg-slate-950">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-white/5 border border-white/10 rounded-2xl p-10">

            <h2 class="text-3xl font-bold mb-4">
                Tentang Fakultas
            </h2>

            {{-- <p class="text-slate-300 leading-relaxed">
                Fakultas {{ str_replace('-', ' ', $slug) }} dirancang untuk
                mencetak lulusan siap industri dengan kurikulum berbasis teknologi,
                inovasi, dan kebutuhan global.
            </p> --}}


            <h3 class="text-2xl font-bold mt-10 mb-4">
                Keunggulan
            </h3>

            <ul class="list-disc pl-6 text-slate-300 space-y-2">
                <li>Kurikulum industri</li>
                <li>Dosen praktisi profesional</li>
                <li>Program magang wajib</li>
                <li>Sertifikasi internasional</li>
            </ul>


            <div class="mt-10">
                <a href="/faculties"
                   class="inline-block px-6 py-3 bg-sky-400 text-slate-900 rounded-xl font-bold hover:scale-105 transition">
                    ← Kembali ke Faculties
                </a>
            </div>

        </div>

    </div>
</section>

@endsection