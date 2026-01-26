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

                <a href="/faculties"
                   class="px-8 py-4 border border-white/20 rounded-xl
                   hover:bg-white/10 hover:border-sky-400/40 transition duration-300">
                    Jelajahi Kampus
                </a>

            </div>

        </div>

        <!-- HERO IMAGE -->
        <div data-aos="fade-left" class="relative animate-float">

            <div class="absolute inset-0 bg-sky-400/20 blur-3xl rounded-full"></div>

            <img src="https://media.quipper.com/media/W1siZiIsIjIwMjMvMDYvMDYvMTAvMDIvNTcvZWIxNzNjNTktODFjOS00N2Q4LTgxNDEtNDBjNDlhZjY3MDRkLyJdLFsicCIsInRodW1iIiwiMTIwMHhcdTAwM2UiLHt9XSxbInAiLCJjb252ZXJ0IiwiLWNvbG9yc3BhY2Ugc1JHQiAtc3RyaXAiLHsiZm9ybWF0IjoianBnIn1dXQ.jpg"
                 class="relative w-full rounded-2xl shadow-2xl">

        </div>

    </div>
</section>

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
<section class="py-32 bg-gradient-to-br from-[#020617] via-[#0b1120] to-[#020617] relative overflow-hidden">

    <!-- Glow Background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(56,189,248,0.08),transparent_55%)]"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div data-aos="fade-up" class="text-center mb-20">
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

            <div class="flex gap-10 animate-marquee">

                @foreach($partners as $partner)
                <div
                    data-aos="zoom-in"
                    class="group relative min-w-[180px] flex items-center justify-center
                    bg-white/5 backdrop-blur-xl
                    border border-white/10
                    rounded-2xl p-7
                    transition duration-300
                    hover:-translate-y-2
                    hover:border-sky-400/40
                    hover:shadow-[0_20px_40px_rgba(56,189,248,0.15)]">

                    <!-- Logo -->
                    <img
                        src="{{ asset('storage/'.$partner->logo) }}"
                        alt="{{ $partner->name }}"
                        class="max-h-14 object-contain
                        grayscale opacity-80
                        group-hover:grayscale-0
                        group-hover:opacity-100
                        transition duration-300">

                    <!-- TOOLTIP -->
                    <div
                        class="absolute -bottom-9 scale-0 group-hover:scale-100 transition
                        bg-slate-900 text-white text-xs px-3 py-1 rounded-lg shadow-lg whitespace-nowrap">
                        {{ $partner->name }}
                    </div>

                    <!-- Hover Glow -->
                    <div
                        class="absolute inset-0 rounded-2xl opacity-0
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
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($faculties as $faculty)
            <div
                data-aos="zoom-in"
                class="group relative rounded-2xl overflow-hidden
                bg-white/5 border border-white/10
                hover:border-sky-400/40
                hover:shadow-xl hover:shadow-sky-500/20
                transition duration-300">


            <div class="rounded-2xl p-8 bg-white/5 border border-white/10 hover:bg-white/10 hover:scale-105 transition">
                <img src="{{ asset('storage/'.$faculty->image) }}"
                     alt="{{ $faculty->name }}"
                     class="w-full h-56 object-cover">
                <h3 class="text-xl font-bold mb-3">
                    {{ $faculty->name }}
                </h3>
                <p class="text-slate-300 text-sm">
                    {{ $faculty->prodis->first()->name ?? 'Program unggulan berbasis teknologi dan industri.' }}
                </p>
            </div>

            @endforeach

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

        {{-- Buttons --}}
        <div data-aos="fade-up" data-aos-delay="300"
             class="mt-12 flex flex-col sm:flex-row justify-center gap-6">

            {{-- Primary --}}
            <a href="/admissions"
               class="group px-10 py-4 rounded-2xl font-bold
               bg-gradient-to-r from-slate-900 to-slate-800
               text-sky-300
               hover:text-white
               hover:scale-105
               hover:shadow-[0_12px_40px_rgba(0,0,0,0.45)]
               transition duration-300">

                <span class="group-hover:tracking-wider transition">
                    Daftar Sekarang
                </span>

            </a>

            {{-- Secondary --}}
            <a href="/faculties"
               class="group px-10 py-4 rounded-2xl font-bold
               border border-white/50
               text-white
               hover:bg-white
               hover:text-indigo-700
               hover:scale-105
               transition duration-300">

                <span class="group-hover:tracking-wider transition">
                    Lihat Fakultas
                </span>

            </a>

        </div>

    </div>
</section>

<!-- ================= TENTANG KAMI ================= -->
<section id="tentang"
    class="py-28 bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950 text-white">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-16">

            <span class="inline-block mb-4 px-4 py-1 text-xs rounded-full bg-cyan-500/10 text-cyan-400">
                Tentang KampusGW
            </span>

            <!-- PREMIUM HEADING -->
            <h2
                class="relative inline-block text-4xl md:text-5xl font-black tracking-wide
                       bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400
                       bg-clip-text text-transparent
                       drop-shadow-[0_0_20px_rgba(56,189,248,0.35)]">

                Profil Kampus

                <!-- Animated Underline -->
                <span
                    class="absolute left-0 -bottom-2 w-full h-[3px]
                           bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400
                           rounded-full animate-line"></span>

            </h2>

            <p class="mt-5 text-slate-400">
                Informasi institusi yang disajikan secara profesional dan modern.
            </p>

        </div>

        <!-- GRID CARD -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- SEJARAH -->
            <div
                class="rounded-2xl p-8 bg-white/5 border border-white/10
                       hover:bg-white/10 hover:scale-105
                       transition duration-300">

                <h3 class="text-xl font-bold mb-3 text-cyan-400">
                    Sejarah
                </h3>

                <div class="text-slate-300 text-sm leading-relaxed">
                    {{-- ADMIN INPUT SEJARAH --}}
                </div>

            </div>

            <!-- VISI MISI TUJUAN -->
            <div
                class="rounded-2xl p-8 bg-white/5 border border-white/10
                       hover:bg-white/10 hover:scale-105
                       transition duration-300">

                <h3 class="text-xl font-bold mb-3 text-indigo-400">
                    Visi • Misi • Tujuan
                </h3>

                <div class="text-slate-300 text-sm leading-relaxed space-y-3">
                    {{-- ADMIN INPUT VISI --}}
                    {{-- ADMIN INPUT MISI --}}
                    {{-- ADMIN INPUT TUJUAN --}}
                </div>

            </div>

            <!-- STRUKTUR -->
            <div
                class="rounded-2xl p-8 bg-white/5 border border-white/10
                       hover:bg-white/10 hover:scale-105
                       transition duration-300">

                <h3 class="text-xl font-bold mb-3 text-cyan-400">
                    Struktur Organisasi
                </h3>

                <div class="text-slate-300 text-sm leading-relaxed">
                    {{-- ADMIN INPUT STRUKTUR --}}
                </div>

            </div>

            <!-- AKREDITASI -->
            <div
                class="rounded-2xl p-8 bg-white/5 border border-white/10
                       hover:bg-white/10 hover:scale-105
                       transition duration-300">

                <h3 class="text-xl font-bold mb-3 text-emerald-400">
                    Akreditasi
                </h3>

                <div class="text-slate-300 text-sm leading-relaxed">
                    {{-- ADMIN INPUT AKREDITASI --}}
                </div>

            </div>

        </div>

    </div>
</section>

<!-- ================= ANIMATION STYLE ================= -->
<style>
@keyframes lineGrow {
    from {
        width: 0;
        opacity: 0;
    }
    to {
        width: 100%;
        opacity: 1;
    }
}

.animate-line {
    animation: lineGrow 1.2s ease-out forwards;
}
</style>

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
