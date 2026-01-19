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
            <img src="https://media.quipper.com/media/W1siZiIsIjIwMjMvMDYvMDYvMTAvMDIvNTcvZWIxNzNjNTktODFjOS00N2Q4LTgxNDEtNDBjNDlhZjY3MDRkLyJdLFsicCIsInRodW1iIiwiMTIwMHhcdTAwM2UiLHt9XSxbInAiLCJjb252ZXJ0IiwiLWNvbG9yc3BhY2Ugc1JHQiAtc3RyaXAiLHsiZm9ybWF0IjoianBnIn1dXQ.jpg?sha=699ea6a0d345ba90"
                 class="w-full animate-float">
        </div>

    </div>
</section>

{{-- Faculties Section --}}
<section class="py-32 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold">
                Fakultas Unggulan
            </h2>
            <p class="mt-4 text-slate-400">
                Dirancang untuk karier masa depan, bukan masa lalu.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

            {{-- Card --}}
            <div data-aos="zoom-in"
                 class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-500/20 to-indigo-500/20 p-8 hover:scale-105 transition">

                <div class="absolute inset-0 bg-sky-500/10 opacity-0 group-hover:opacity-100 transition"></div>

                <h3 class="text-xl font-bold mb-3">Informatika</h3>
                <p class="text-slate-300 text-sm">
                    AI, Cyber Security, Software Engineering
                </p>
            </div>

            <div data-aos="zoom-in" data-aos-delay="100"
                 class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-500/20 to-indigo-500/20 p-8 hover:scale-105 transition">

                <div class="absolute inset-0 bg-purple-500/10 opacity-0 group-hover:opacity-100 transition"></div>

                <h3 class="text-xl font-bold mb-3">Sistem Informasi</h3>
                <p class="text-slate-300 text-sm">
                    Business Tech, ERP, Data Analytics
                </p>
            </div>

            <div data-aos="zoom-in" data-aos-delay="200"
                 class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500/20 to-cyan-500/20 p-8 hover:scale-105 transition">

                <div class="absolute inset-0 bg-emerald-500/10 opacity-0 group-hover:opacity-100 transition"></div>

                <h3 class="text-xl font-bold mb-3">Data Science</h3>
                <p class="text-slate-300 text-sm">
                    Big Data, Machine Learning, AI Research
                </p>
            </div>

            <div data-aos="zoom-in" data-aos-delay="300"
                 class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-pink-500/20 to-rose-500/20 p-8 hover:scale-105 transition">

                <div class="absolute inset-0 bg-pink-500/10 opacity-0 group-hover:opacity-100 transition"></div>

                <h3 class="text-xl font-bold mb-3">Bisnis Digital</h3>
                <p class="text-slate-300 text-sm">
                    Startup, E-Commerce, Digital Marketing
                </p>
            </div>

        </div>
    </div>
</section>


@endsection
