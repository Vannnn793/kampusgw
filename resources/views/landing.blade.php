@extends('layout.main')
@section('title','Home')

@section('content')

<section class="min-h-screen flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <div data-aos="fade-right">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                Belajar Hari Ini.<br>
                <span class="text-sky-400">Memimpin Dunia Besok.</span>
            </h1>

            <p class="mt-6 text-lg text-slate-300">
                Kampus berbasis teknologi, inovasi, dan industri global.
            </p>

            <div class="mt-8 flex gap-4">
                <a href="/admissions"
                   class="px-6 py-3 bg-sky-400 text-slate-900 rounded-xl font-bold hover:scale-105 transition">
                    Daftar Sekarang
                </a>

                <a href="/faculties"
                   class="px-6 py-3 border border-white/20 rounded-xl hover:bg-white/10 transition">
                    Explore Campus
                </a>
            </div>
        </div>

        <div data-aos="fade-left">
            <img src="https://cdn3d.iconscout.com/3d/premium/thumb/university-campus-6362197-5302807.png"
                 class="w-full animate-float">
        </div>

    </div>
</section>

@endsection
