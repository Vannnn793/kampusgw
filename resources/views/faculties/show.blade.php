@extends('layout.main')
@section('title','Faculty Detail')

@section('content')

<section class="min-h-[60vh] flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h1 class="text-5xl font-extrabold capitalize">
            {{ str_replace('-', ' ', $slug) }}
        </h1>

        <p class="mt-4 text-slate-300">
            Program unggulan dengan standar industri global.
        </p>

    </div>
</section>


<section class="py-32 bg-slate-950">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-white/5 border border-white/10 rounded-2xl p-10">

            <h2 class="text-3xl font-bold mb-4">
                Tentang Fakultas
            </h2>

            <p class="text-slate-300 leading-relaxed">
                Fakultas {{ str_replace('-', ' ', $slug) }} dirancang untuk
                mencetak lulusan siap industri dengan kurikulum berbasis teknologi,
                inovasi, dan kebutuhan global.
            </p>


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
