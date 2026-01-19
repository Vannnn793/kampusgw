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

{{-- Statistics Section --}}
<section class="py-32 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold">
                Dampak Nyata, Bukan Janji Kosong
            </h2>
            <p class="mt-4 text-slate-400">
                Data berbicara lebih keras daripada brosur.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 text-center">

            <div data-aos="fade-up"
                 class="p-10 rounded-2xl bg-white/5 border border-white/10 hover:scale-105 transition">
                <h3 class="text-5xl font-extrabold text-sky-400">92%</h3>
                <p class="mt-3 text-slate-300">
                    Lulusan bekerja < 6 bulan
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="100"
                 class="p-10 rounded-2xl bg-white/5 border border-white/10 hover:scale-105 transition">
                <h3 class="text-5xl font-extrabold text-indigo-400">120+</h3>
                <p class="mt-3 text-slate-300">
                    Mitra Industri Global
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="200"
                 class="p-10 rounded-2xl bg-white/5 border border-white/10 hover:scale-105 transition">
                <h3 class="text-5xl font-extrabold text-emerald-400">35</h3>
                <p class="mt-3 text-slate-300">
                    Startup Mahasiswa Aktif
                </p>
            </div>

            <div data-aos="fade-up" data-aos-delay="300"
                 class="p-10 rounded-2xl bg-white/5 border border-white/10 hover:scale-105 transition">
                <h3 class="text-5xl font-extrabold text-pink-400">15K+</h3>
                <p class="mt-3 text-slate-300">
                    Alumni di Seluruh Dunia
                </p>
            </div>

        </div>
    </div>
</section>

{{-- Testimonials Section --}}
<section class="py-32 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold">
                Mereka Sudah Melangkah Lebih Dulu
            </h2>
            <p class="mt-4 text-slate-400">
                Sekarang giliran kamu.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">

            <div data-aos="fade-up"
                 class="p-8 rounded-2xl bg-white/5 border border-white/10">
                <p class="text-slate-300 italic">
                    “Sebelum lulus saya sudah kerja sebagai Software Engineer
                    di startup Singapura. Kurikulumnya benar-benar relevan industri.”
                </p>

                <div class="flex items-center gap-4 mt-6">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg"
                         class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-semibold">Rizky Pratama</h4>
                        <p class="text-sm text-slate-400">
                            Software Engineer, Singapore
                        </p>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100"
                 class="p-8 rounded-2xl bg-white/5 border border-white/10">
                <p class="text-slate-300 italic">
                    “Saya membangun startup edutech sejak semester 5.
                    Kampus benar-benar support mahasiswa jadi founder.”
                </p>

                <div class="flex items-center gap-4 mt-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg"
                         class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-semibold">Alya Putri</h4>
                        <p class="text-sm text-slate-400">
                            Founder EduTech Startup
                        </p>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="200"
                 class="p-8 rounded-2xl bg-white/5 border border-white/10">
                <p class="text-slate-300 italic">
                    “Program magang industrinya bikin saya langsung
                    direkrut sebelum wisuda.”
                </p>

                <div class="flex items-center gap-4 mt-6">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg"
                         class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-semibold">Dimas Saputra</h4>
                        <p class="text-sm text-slate-400">
                            Data Analyst, Tokopedia
                        </p>
                    </div>
                </div>
            </div>

        </div>
</section>

        {{-- Final Call To Action --}}
<section class="py-32 bg-gradient-to-br from-indigo-600 via-sky-500 to-cyan-400 text-slate-900">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h2 class="text-4xl md:text-5xl font-extrabold">
            Masa Depan Tidak Menunggu.
        </h2>

        <p class="mt-6 text-lg max-w-2xl mx-auto">
            Bergabunglah dengan generasi pemimpin teknologi berikutnya.
            Bangun karier globalmu mulai hari ini.
        </p>

        <div class="mt-10 flex justify-center gap-6">
            <a href="/admissions"
               class="px-10 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:scale-105 transition shadow-xl">
                Daftar Sekarang
            </a>

            <a href="/faculties"
               class="px-10 py-4 border-2 border-slate-900 rounded-2xl font-bold hover:bg-slate-900 hover:text-white transition">
                Lihat Program Studi
            </a>
        </div>

    </div>
</section>


@endsection
