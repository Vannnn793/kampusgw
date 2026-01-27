@extends('layout.main')
@section('title','Home')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative min-h-screen flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950 overflow-hidden">

    <!-- Glow Effect -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(56,189,248,0.12),transparent_60%)]"></div>

    <div class="relative max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <!-- TEXT CONTENT -->
        <div data-aos="fade-right">

            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight">

                <span class="block animate-fade-up">
                    Kampus Teknologi
                </span>

                {{-- Animated Line Highlight --}}
                <span class="relative inline-block text-sky-400 animate-fade-up delay-150 line-animate overflow-visible">
                    Pencetak Talenta Global
                </span>

            </h1>

            <p class="mt-6 text-lg text-slate-300 max-w-xl animate-fade-up delay-300">
                Kurikulum berbasis industri, dosen praktisi,
                dan ekosistem inovasi yang relevan dengan dunia kerja modern.
            </p>

            <!-- BUTTONS -->
            <div class="mt-10 flex gap-4 animate-fade-up delay-500">

                <a href="/admissions"
                   class="px-8 py-4 bg-sky-400 text-slate-900 rounded-xl font-bold
                   hover:scale-105 hover:shadow-[0_10px_30px_rgba(56,189,248,0.4)]
                   transition duration-300">
                    Daftar Sekarang
                </a>

                <a href="/tentang"
                   class="px-8 py-4 border border-white/20 rounded-xl
                   hover:bg-white/10 hover:border-sky-400/40 transition duration-300">
                    Jelajahi Kampus
                </a>

            </div>

        </div>

       <!-- HERO IMAGE -->
        <div data-aos="fade-left" class="relative animate-float flex justify-center">

            <div class="absolute inset-0 bg-sky-400/20 blur-3xl rounded-full"></div>

            <img 
                src="{{ asset('storage/images/kampusgw.jpg') }}"
                class="relative w-[300px] sm:w-[380px] md:w-[400px] rounded-2xl shadow-2xl object-cover"
                alt="Campus Image"
    >
        </div>

    </div>
</section>

<!-- ================= TENTANG KAMI (LANDING) ================= -->
<section
    class="relative min-h-screen flex items-center
           bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950 text-white overflow-hidden">

    <!-- BACKGROUND IMAGE OVERLAY -->
    <div class="absolute inset-0 opacity-15">
        <img src="{{ asset('images/kampusgw.jpg') }}"
             class="w-full h-full object-cover">
    </div>

    <!-- GLOW EFFECT -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-cyan-500/20 blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500/20 blur-3xl rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-6 w-full">

        <!-- HEADER -->
        <div class="text-center mb-20">

            <span
                class="inline-block mb-4 px-5 py-2 text-sm rounded-full
                       bg-cyan-500/10 border border-cyan-400/30
                       text-cyan-400 backdrop-blur">

                Tentang KampusGW
            </span>

            <h2
                class="relative inline-block text-4xl md:text-6xl font-black
                       bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400
                       bg-clip-text text-transparent">

                Profil Kampus

                <span
                    class="absolute left-0 -bottom-3 w-full h-[4px]
                           bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400
                           rounded-full animate-line"></span>
            </h2>

            <p class="mt-8 text-lg text-slate-300 max-w-3xl mx-auto leading-relaxed">
                Institusi pendidikan modern yang berfokus pada teknologi, inovasi,
                dan pengembangan sumber daya unggul untuk masa depan.
            </p>

        </div>

        <!-- GRID MENU -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- SEJARAH -->
            <a href="{{ url('/tentang/sejarah') }}"
               class="group relative overflow-hidden rounded-2xl p-8
                      bg-white/5 border border-white/10
                      hover:border-cyan-400/40
                      hover:-translate-y-2
                      transition-all duration-300">

                <div class="text-4xl mb-4">📜</div>

                <h3 class="text-xl font-bold mb-2 text-cyan-400">
                    Sejarah Kampus
                </h3>

                <p class="text-sm text-slate-400">
                    Perjalanan dan perkembangan KampusGW dari awal berdiri.
                </p>

                <span class="absolute inset-0 bg-gradient-to-tr from-cyan-500/10 to-transparent opacity-0 group-hover:opacity-100 transition"></span>

            </a>

            <!-- VISI MISI -->
            <a href="{{ url('/tentang/visi-misi') }}"
               class="group relative overflow-hidden rounded-2xl p-8
                      bg-white/5 border border-white/10
                      hover:border-indigo-400/40
                      hover:-translate-y-2
                      transition-all duration-300">

                <div class="text-4xl mb-4">🎯</div>

                <h3 class="text-xl font-bold mb-2 text-indigo-400">
                    Visi • Misi • Tujuan
                </h3>

                <p class="text-sm text-slate-400">
                    Arah, nilai dan tujuan pengembangan institusi.
                </p>

                <span class="absolute inset-0 bg-gradient-to-tr from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition"></span>

            </a>

            <!-- STRUKTUR -->
            <a href="{{ url('/tentang/struktur') }}"
               class="group relative overflow-hidden rounded-2xl p-8
                      bg-white/5 border border-white/10
                      hover:border-cyan-400/40
                      hover:-translate-y-2
                      transition-all duration-300">

                <div class="text-4xl mb-4">🏛️</div>

                <h3 class="text-xl font-bold mb-2 text-cyan-400">
                    Struktur Organisasi
                </h3>

                <p class="text-sm text-slate-400">
                    Susunan pimpinan dan unit kerja KampusGW.
                </p>

                <span class="absolute inset-0 bg-gradient-to-tr from-cyan-500/10 to-transparent opacity-0 group-hover:opacity-100 transition"></span>

            </a>

            <!-- AKREDITASI -->
            <a href="{{ url('/tentang/akreditasi') }}"
               class="group relative overflow-hidden rounded-2xl p-8
                      bg-white/5 border border-white/10
                      hover:border-emerald-400/40
                      hover:-translate-y-2
                      transition-all duration-300">

                <div class="text-4xl mb-4">🏆</div>

                <h3 class="text-xl font-bold mb-2 text-emerald-400">
                    Akreditasi
                </h3>

                <p class="text-sm text-slate-400">
                    Status penjaminan mutu dan sertifikasi resmi.
                </p>

                <span class="absolute inset-0 bg-gradient-to-tr from-emerald-500/10 to-transparent opacity-0 group-hover:opacity-100 transition"></span>

            </a>

        </div>

    </div>
</section>

<!-- ANIMATION -->
<style>
@keyframes lineGrow {
    from { width: 0; opacity: 0; }
    to { width: 100%; opacity: 1; }
}
.animate-line {
    animation: lineGrow 1.3s ease-out forwards;
}
</style>

{{-- ================= BERITA ================= --}}
<section id="berita-kampus"
class="py-28 bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">

<div class="max-w-7xl mx-auto px-6">

<h2 class="text-3xl font-extrabold mb-10 border-l-4 border-sky-500 pl-4 animate-fade-in-up">
    Berita & Update Kampus
</h2>

<div class="grid lg:grid-cols-2 gap-10">

{{-- BERITA UTAMA --}}
@if($posts->count())
<div class="group relative rounded-2xl overflow-hidden shadow-xl hover:shadow-sky-500/20 transition">

    {{-- IMAGE --}}
    <img src="{{ asset('storage/'.$posts[0]->thumbnail) }}"
         class="w-full h-full object-cover brightness-75
                group-hover:scale-110 transition duration-500">

    {{-- OVERLAY (TIDAK BLOK KLIK) --}}
    <div
        class="absolute inset-0 bg-gradient-to-t
        from-black/70 via-black/30 to-transparent
        pointer-events-none z-0">
    </div>

    {{-- CONTENT --}}
    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white z-10">

        <span class="inline-block bg-sky-500 text-sm px-3 py-1 rounded-full w-fit mb-3">
            Berita Utama
        </span>

        <h3 class="text-2xl font-bold">
            {{ $posts[0]->title }}
        </h3>

        <p class="text-sm opacity-80 mt-1">
            {{ $posts[0]->created_at->format('d M Y') }}
        </p>

        <button
            onclick="openPost('{{ $posts[0]->slug }}')"
            class="btn btn-primary mt-4 px-5 py-2 bg-sky-400 text-slate-900 font-semibold rounded-lg hover:scale-105 hover:shadow-[0_8px_20px_rgba(56,189,248,0.4)] transition">
            Baca Selengkapnya
        </button>


    </div>
</div>
@endif

{{-- LIST BERITA --}}
<div class="flex flex-col gap-4">

@foreach($posts->skip(1) as $post)
<div
class="group flex gap-4 items-center
bg-white/5 backdrop-blur-md
border border-white/10
p-4 rounded-xl
hover:border-sky-400/40 hover:shadow-lg hover:shadow-sky-500/20 transition
relative z-10">

<img src="{{ asset('storage/'.$post->thumbnail) }}"
     class="w-24 h-20 object-cover rounded-lg group-hover:scale-110 transition">

<div>
    <p class="text-sm text-slate-400">
        {{ $post->created_at->format('d M Y') }}
    </p>

    <h4 class="font-semibold text-white leading-snug">
        {{ Str::limit($post->title, 55) }}
    </h4>

    <button
        onclick="openPost('{{ $post->slug }}')"
        class="mt-2 text-sky-400 font-semibold hover:underline">
        Baca →
    </button>

</div>

</div>
@endforeach

</div>

</div>
</div>
</section>

<section id="post-detail"
         class="py-20 bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950 d-none">
    <div class="container py-8 px-6 mx-auto bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl shadow-lg max-w-4xl text-white">

        {{-- <button onclick="closePost()"
                class="btn btn-sm btn-outline-secondary mb-4">
            ← Kembali ke Berita
        </button> --}}

        <img id="detail-thumb"
             class="img-fluid rounded mb-4 w-100"
             style="max-height:420px; object-fit:cover">

        <h1 id="detail-title" class="fw-bold mb-2"></h1>
        <p id="detail-date" class="text-muted mb-4"></p>

        <article id="detail-content"
                 class="fs-5 lh-lg">
        </article>

    </div>
</section>


{{-- Partners Section --}}
<section class="py-28 bg-gradient-to-br from-[#020617] via-[#0b1120] to-[#020617] relative overflow-hidden">

    <!-- Glow Background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(56,189,248,0.08),transparent_55%)]"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div data-aos="fade-up" class="text-center mb-16">
            <span class="uppercase tracking-widest text-sm font-semibold text-sky-400">
                Partnership Network
            </span>

            <h2 class="mt-3 text-4xl md:text-5xl font-extrabold text-white">
                Mitra <span class="text-sky-400">Industri</span>
            </h2>

            <p class="mt-4 text-slate-400 max-w-xl mx-auto">
                Bekerja sama dengan perusahaan nasional & global untuk membangun ekosistem pendidikan berbasis industri.
            </p>
        </div>

        <!-- AUTO SLIDE CONTAINER -->
        <div class="relative overflow-hidden">

            <div class="flex gap-8 animate-marquee">

                @foreach($partners as $partner)
                <div
                    data-aos="zoom-in"
                    class="group relative min-w-[140px] h-[90px]
                    flex items-center justify-center
                    bg-white/5 backdrop-blur-xl
                    border border-white/10
                    rounded-xl
                    transition duration-300
                    hover:-translate-y-1
                    hover:border-sky-400/40
                    hover:shadow-[0_12px_24px_rgba(56,189,248,0.15)]">

                    <!-- Logo -->
                    <img
                        src="{{ asset('storage/'.$partner->logo) }}"
                        alt="{{ $partner->name }}"
                        class="w-[85%] h-[85%] object-contain
                        grayscale opacity-80
                        group-hover:grayscale-0
                        group-hover:opacity-100
                        transition duration-300">

                    <!-- TOOLTIP -->
                    <div
                        class="absolute -bottom-8 scale-0 group-hover:scale-100 transition
                        bg-slate-900 text-white text-xs px-3 py-1 rounded-lg shadow-lg whitespace-nowrap">
                        {{ $partner->name }}
                    </div>

                    <!-- Hover Glow -->
                    <div
                        class="absolute inset-0 rounded-xl opacity-0
                        group-hover:opacity-100 transition
                        bg-gradient-to-br from-sky-400/10 to-transparent">
                    </div>

                </div>
                @endforeach

            </div>

        </div>

    </div>

</section>

{{-- ================= FAKULTAS ================= --}}
<section class="py-28 bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-900 text-white relative overflow-hidden">

    {{-- Background Accent --}}
    <div class="absolute -top-40 left-10 w-[30rem] h-[30rem] bg-indigo-500/15 blur-3xl rounded-full"></div>
    <div class="absolute top-1/3 right-0 w-[28rem] h-[28rem] bg-cyan-500/10 blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 left-1/3 w-[25rem] h-[25rem] bg-purple-500/10 blur-3xl rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400 bg-clip-text text-transparent animate-gradient">
                Fakultas Unggulan
            </h2>

            <p class="mt-4 text-slate-300 max-w-xl mx-auto">
                Dirancang untuk kebutuhan industri masa depan.
            </p>
        </div>

        {{-- Fakultas Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($faculties as $faculty)

            <div
                data-aos="zoom-in"
                class="group relative rounded-2xl overflow-hidden
                bg-white/5 border border-white/10
                hover:border-sky-400/40
                hover:shadow-xl hover:shadow-sky-500/20
                transition duration-300">


{{-- <<<<<<< Updated upstream --}}
            <div class="rounded-2xl p-8 bg-white/5 border border-white/10 hover:bg-white/10 hover:scale-105 transition">
                {{-- <img src="{{ asset('storage/'.$faculty->image) }}"
                     alt="{{ $faculty->name }}"
                     class="w-full h-56 object-cover">
                <h3 class="text-xl font-bold mb-3">
                    {{ $faculty->name }}
                </h3>
                <p class="text-slate-300 text-sm">
                    {{ $faculty->prodis->first()->name ?? 'Program unggulan berbasis teknologi dan industri.' }}
                </p>
======= --}}
                    <img
                        src="{{ asset('storage/'.$faculty->image) }}"
                        alt="{{ $faculty->name }}"
                        class="w-full h-full object-cover
                        group-hover:scale-110 transition duration-500">

                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t
                        from-black/70 via-black/30 to-transparent">
                    </div>

                </div>

                {{-- Content --}}
                <div class="relative p-6 flex flex-col h-full">

                    <h3 class="text-lg font-bold mb-2">
                        {{ $faculty->name }}
                    </h3>

                    <p class="text-slate-300 text-sm leading-relaxed flex-grow">
                        {{ Str::limit($faculty->description ?? 'Program unggulan berbasis teknologi dan industri.', 80) }}
                    </p>

                </div>

>>>>>>> Stashed changes
            </div>

            @endforeach

        </div>

        {{-- BUTTON LIHAT SEMUA FAKULTAS --}}
        <div class="mt-16 flex justify-center" data-aos="fade-up">

            <a href="/faculties"
                class="group relative inline-flex items-center justify-center
                px-12 py-4 rounded-full font-semibold
                text-white tracking-wide
                bg-gradient-to-r from-cyan-500 to-indigo-500
                shadow-lg shadow-indigo-500/30
                hover:shadow-indigo-500/60
                hover:scale-105
                transition-all duration-300">

                <span class="group-hover:tracking-wider transition">
                    Lihat Semua Fakultas
                </span>

                <span class="ml-3 text-lg group-hover:translate-x-1 transition">
                    →
                </span>

                {{-- Glow Layer --}}
                <span class="absolute inset-0 rounded-full blur-xl opacity-30
                      bg-gradient-to-r from-cyan-500 to-indigo-500
                      -z-10"></span>

            </a>

        </div>

    </div>

</section>

{{-- ================= CTA ================= --}}
<section class="relative py-28 bg-gradient-to-br from-sky-500 via-indigo-500 to-purple-600 overflow-hidden">

    {{-- Glow Effect --}}
    <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[700px] h-[700px]
                bg-white/20 blur-3xl rounded-full animate-pulse"></div>

    <div class="relative max-w-5xl mx-auto px-6 text-center">

        {{-- Title --}}
        <h2 data-aos="zoom-in"
            class="text-4xl md:text-5xl font-extrabold leading-tight
            bg-gradient-to-r from-white via-sky-200 to-indigo-200
            bg-clip-text text-transparent">

            Masa Depan Tidak Menunggu

        </h2>

        {{-- Subtitle --}}
        <p data-aos="fade-up" data-aos-delay="150"
           class="mt-6 text-lg max-w-2xl mx-auto
           text-white/90">

            <span class="text-sky-200 font-semibold">
                Bergabunglah sekarang
            </span>
            dan bangun karier bersama kampus yang menyiapkanmu
            untuk dunia kerja nyata, bukan sekadar teori.

        </p>

        {{-- BUTTON CTA --}}
        <div data-aos="fade-up" data-aos-delay="300"
             class="mt-14 flex justify-center">

            <a href="/admissions"
               class="group relative inline-flex items-center justify-center
               px-14 py-5 rounded-full font-bold text-lg
               bg-gradient-to-r from-slate-900 to-slate-800
               text-sky-300
               hover:text-white
               hover:scale-110
               hover:shadow-[0_18px_45px_rgba(0,0,0,0.5)]
               transition-all duration-300">

                <span class="group-hover:tracking-wider transition">
                    Daftar Sekarang
                </span>

                <span class="ml-3 text-xl group-hover:translate-x-1 transition">
                    →
                </span>

                {{-- Glow Layer --}}
                <span class="absolute inset-0 rounded-full blur-xl opacity-30
                      bg-gradient-to-r from-sky-400 to-indigo-500
                      -z-10"></span>

            </a>

        </div>

    </div>

</section>

<script>
function openPost(slug) {
    fetch(`/posts/${slug}`)
        .then(res => res.json())
        .then(post => {

            document.getElementById('detail-thumb').src =
                `/storage/${post.thumbnail}`;

            document.getElementById('detail-title').innerText =
                post.title;

            document.getElementById('detail-date').innerText =
                new Date(post.created_at).toLocaleDateString('id-ID');

            document.getElementById('detail-content').innerHTML =
                post.content;

            const section = document.getElementById('post-detail');
            section.classList.remove('d-none');

            section.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
}

function closePost() {
    document.getElementById('post-detail').classList.add('d-none');

    document.querySelector('#berita-kampus')
        ?.scrollIntoView({ behavior: 'smooth' });
}
</script>

@endsection
