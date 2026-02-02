@extends('layout.main')
@section('title','Home')

@section('content')

<style>
/* ===== FORCE ANIMATED GRADIENT (ANTI GAGAL) ===== */
.animated-gradient {
    background: linear-gradient(
  90deg,
    #CFF7DC,   /* hijau mint soft */
    #DCEBFF,   /* biru langit pastel */
    #FFF9E6,   /* krem lembut */
    #D6ECF7,   /* biru aqua muda */
    #E6F9F0 
    );
    background-size: 600% 600%;
    animation: gradientMove 5s linear infinite;
}

@keyframes gradientMove {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 100% 50%;
    }
}
</style>

{{-- ================= ANNOUNCEMENT BAR (HOME ONLY) ================= --}}
<div id="announcement-bar"
     class="relative z-30"
     data-aos="fade-down">

    <div class="animated-gradient">
        <div class="max-w-7xl mx-auto px-6 py-3 text-center relative">

            <p class="text-sm md:text-base font-medium text-slate-800">
                🎓 <span class="font-semibold">
                    Penerimaan Mahasiswa Baru KampusGw 2026 Telah Dibuka!
                </span>
                Simak Jadwal, Syarat, dan Program Studi.
                <a href="/admissions"
                   class="ml-1 font-semibold underline underline-offset-4 hover:text-sky-700 transition">
                    Lihat di Sini!
                </a>
            </p>
        </div>
    </div>
</div>

<section class="relative min-h-screen flex items-center overflow-hidden
bg-gradient-to-br
from-[#FAFAF9]
via-[#F4F6F8]
to-[#EEF2F5]">

    <div class="relative max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        
        {{-- TEXT --}}
        <div>
            <p class="uppercase tracking-[0.3em] text-sm font-semibold text-[#1E5FA3] mb-4">
                Welcome To KampusGW
            </p>
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight text-[#0F2A44]">
                <span class="block">Kampus Teknologi</span>
                <span class="relative inline-block text-[#1E5FA3]">
                    Pencetak Talenta Global
                </span>
            </h1>

            <p class="mt-6 text-lg font-medium text-[#1F3E63] max-w-xl">
                Kurikulum berbasis industri, dosen praktisi,
                dan ekosistem inovasi yang relevan dengan dunia kerja modern.
            </p>
            

            {{-- BUTTON --}}
            <div class="mt-10 flex gap-4">
                <a href="/admissions"
                   class="px-9 py-4
                   bg-[#1E5FA3]
                   text-white font-bold
                   rounded-xl
                   shadow-xl shadow-white-500/50
                   hover:bg-[#0F3E73]
                   hover:scale-105
                   transition">
                    Daftar Sekarang
                </a>

                <a href="/faculties"
                   class="px-9 py-4
                   bg-white/90
                   text-[#1E5FA3]
                   font-bold
                   border border-[#1E5FA3]
                   rounded-xl
                   hover:bg-[#E6F0FB]
                   hover:scale-105
                   shadow-md
                   transition">
                    Jelajahi Kampus
                </a>
            </div>
        </div>

        {{-- MEDIA --}}
<div class="grid grid-cols-2 grid-rows-2 gap-5 max-w-xl mx-auto">

    <div class="rounded-2xl overflow-hidden shadow-xl h-52">
        <img src="https://kreatorjabar.com/wp-content/uploads/2024/05/IMG-20240501-WA0016-1.jpg"
             class="w-full h-full object-cover">
    </div>

    <div class="rounded-2xl overflow-hidden shadow-xl h-52">
        <img src="https://tse2.mm.bing.net/th/id/OIP.3_NMKr72QeqZchpbD8Z_vAHaHa?cb=defcache2defcache=1&rs=1&pid=ImgDetMain&o=7&rm=3"
             class="w-full h-full object-cover">
    </div>

    {{-- VIDEO --}}
    <a href="https://youtu.be/oKmNMPP11_I?si=l0itKniIDP6w605H"
       target="_blank"
       class="col-span-2 relative rounded-2xl overflow-hidden shadow-2xl group h-56">

        <img src="https://biayakuliahukt.id/wp-content/uploads/2023/02/Jalur-Pendaftaran-Politeknik-Indramayu.jpg"
             class="w-full h-full object-cover">

        <div class="absolute inset-0 bg-[#0F3E73]/40 group-hover:bg-[#0F3E73]/50 transition"></div>

        <div class="absolute inset-0 flex items-center justify-center">
    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center
                shadow-xl group-hover:scale-110 transition duration-300">
        <svg class="w-6 h-6 ml-0.5 text-[#1E5FA3]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M8 5v14l11-7z"/>
        </svg>

    </div>
</div>

    </a>
</div>

    </div>
</section>



{{-- <!-- ANIMATION -->
<style>
@keyframes lineGrow {
    from { width: 0; opacity: 0; }
    to { width: 100%; opacity: 1; }
}
.animate-line {
    animation: lineGrow 1.3s ease-out forwards;
}
</style> --}}
{{-- ================= PARTNERS ================= --}}
<section class="py-24 bg-gradient-to-br from-sky-100 via-sky-200 to-blue-300 overflow-hidden">

    <style>
        @keyframes marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 25s linear infinite;
        }
    </style>

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <span class="uppercase tracking-widest text-sm font-semibold text-blue-700">
                Partnership Network
            </span>

            <h2 class="mt-3 text-4xl md:text-5xl font-extrabold text-slate-900">
                Mitra <span class="text-blue-700">Industri</span>
            </h2>

            <p class="mt-4 text-slate-800 max-w-xl mx-auto">
                Bekerja sama dengan perusahaan nasional & global untuk membangun ekosistem pendidikan berbasis industri.
            </p>
        </div>

        {{-- LOGO PARTNER SLIDER --}}
        @if($partners->count())
        <div class="relative w-full overflow-hidden">

            <div class="flex items-center gap-16 animate-marquee w-max">

                {{-- LOOP 1 --}}
                @foreach($partners as $partner)
                    <img src="{{ asset('storage/'.$partner->logo) }}"
                         alt="{{ $partner->name }}"
                         class="h-14 object-contain">
                @endforeach

                {{-- LOOP 2 biar muter mulus --}}
                @foreach($partners as $partner)
                    <img src="{{ asset('storage/'.$partner->logo) }}"
                         alt="{{ $partner->name }}"
                         class="h-14 object-contain">
                @endforeach

            </div>

        </div>
        @else
        <p class="text-center text-slate-700">Belum ada data partner.</p>
        @endif

    </div>
</section>
{{-- ================= FAKULTAS ================= --}}
<section class="relative py-28 bg-[#1583D7] text-white overflow-hidden">

    {{-- Background Accent (halus, ga norak) --}}
    <div class="absolute -top-40 left-10 w-[32rem] h-[32rem] bg-white/10 blur-3xl rounded-full"></div>
    <div class="absolute top-1/3 right-0 w-[30rem] h-[30rem] bg-[#0E5FA8]/30 blur-3xl rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white">
                Fakultas Unggulan
            </h2>

            <p class="mt-5 max-w-xl mx-auto text-blue-100 font-medium text-lg">
                Dirancang untuk kebutuhan industri masa depan.
            </p>
        </div>

        {{-- GRID (3 FAKULTAS SAJA – 1 BARIS) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">

            @foreach($faculties->take(3) as $faculty)
            <div
                class="group rounded-3xl overflow-hidden
                bg-white
                border border-blue-200
                shadow-xl shadow-blue-900/20
                hover:shadow-blue-900/40
                hover:-translate-y-3
                transition-all duration-500 ease-out">

                {{-- IMAGE --}}
                <div class="relative w-full h-64 overflow-hidden">
                    <img 
                        src="{{ asset('storage/'.$faculty->image) }}" 
                        alt="{{ $faculty->name }}"
                        class="w-full h-full object-cover
                               group-hover:scale-110
                               transition-transform duration-700 ease-out">
                </div>

                {{-- CONTENT --}}
                <div class="p-8">
                    <h3 class="text-2xl font-extrabold mb-3 text-[#0F3D73]">
                        {{ $faculty->name }}
                    </h3>

                    <p class="text-slate-600 text-base leading-relaxed">
                        {{ Str::limit($faculty->description ?? 'Program unggulan berbasis teknologi dan industri.', 110) }}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>





<!-- ================= TENTANG KAMI (LANDING) ================= -->
{{-- <section
    class="py-28 bg-gradient-to-r from-sky-500 to-indigo-600 text-center text-white>

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
</section> --}}


{{-- ================= CTA ================= --}}
<section class="relative py-28 bg-white overflow-hidden">

    <div class="relative max-w-5xl mx-auto px-6 text-center">

        {{-- Title --}}
        <h2 class="text-4xl md:text-5xl font-extrabold leading-tight text-slate-900">
            Masa Depan Tidak Menunggu
        </h2>

        {{-- Subtitle --}}
        <p class="mt-6 text-lg max-w-2xl mx-auto text-slate-600">
            <span class="font-semibold">
                Bergabunglah sekarang
            </span>
            dan bangun karier bersama kampus yang menyiapkanmu
            untuk dunia kerja nyata, bukan sekadar teori.
        </p>

        {{-- BUTTON CTA --}}
        <div class="mt-14 flex justify-center">

            <a href="/admissions"
               class="group inline-flex items-center justify-center
               px-14 py-5 rounded-full font-bold text-lg
               bg-[#1E5FA3] text-white
               hover:bg-[#174C87]
               hover:scale-105
               shadow-md shadow-black/20
               transition-all duration-300">

                <span class="group-hover:tracking-wider transition">
                    Daftar Sekarang
                </span>

                <span class="ml-3 text-xl group-hover:translate-x-1 transition">
                    →
                </span>

            </a>

        </div>

    </div>

</section>


{{-- ================= BERITA ================= --}}
<section id="berita-kampus"
class="relative py-28 bg-gradient-to-br from-sky-100 via-sky-200 to-blue-300 overflow-hidden">

{{-- Glow biru biar hidup --}}
<div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(2,132,199,0.25),transparent_60%)]"></div>

<div class="relative max-w-7xl mx-auto px-6">

<h2 class="text-3xl font-extrabold mb-10 border-l-4 border-blue-600 pl-4 text-slate-900">
    Berita & Update Kampus
</h2>

<div class="grid lg:grid-cols-2 gap-10">

{{-- ================= BERITA UTAMA ================= --}}
@if($posts->count())
<div class="group relative rounded-2xl overflow-hidden shadow-xl hover:shadow-blue-400/40 transition">

    <img src="{{ asset('storage/'.$posts[0]->thumbnail) }}"
         class="w-full h-full object-cover brightness-95 group-hover:scale-105 transition duration-500">

    {{-- Overlay biar teks kebaca --}}
    <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/15 to-transparent"></div>

    <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">

        <span class="inline-block bg-blue-600 text-sm px-3 py-1 rounded-full w-fit mb-3 shadow">
            Berita Utama
        </span>

        <h3 class="text-2xl font-bold drop-shadow-md leading-snug">
            {{ $posts[0]->title }}
        </h3>

        <p class="text-sm opacity-90 mt-1">
            {{ $posts[0]->created_at->format('d M Y') }}
        </p>

        <button
            onclick="openPost('{{ $posts[0]->slug }}')"
            class="mt-4 px-5 py-2 bg-white text-blue-700 font-semibold rounded-lg hover:bg-blue-50 transition">
            Baca Selengkapnya
        </button>

    </div>
</div>
@endif


{{-- ================= LIST BERITA ================= --}}
<div class="flex flex-col gap-4">

@foreach($posts->skip(1) as $post)
<div
class="group flex gap-4 items-center
bg-white/90 backdrop-blur-sm border border-blue-200
p-4 rounded-xl shadow-sm
hover:border-blue-400 hover:shadow-md transition">

<img src="{{ asset('storage/'.$post->thumbnail) }}"
     class="w-24 h-20 object-cover rounded-lg group-hover:scale-105 transition">

<div>
    <p class="text-sm text-slate-600">
        {{ $post->created_at->format('d M Y') }}
    </p>

    <h4 class="font-semibold text-slate-900 leading-snug">
        {{ Str::limit($post->title, 55) }}
    </h4>

    <button
        onclick="openPost('{{ $post->slug }}')"
        class="mt-2 text-blue-700 font-semibold hover:underline">
        Baca →
    </button>
</div>

</div>
@endforeach
</div>
</section>
{{-- ================= DETAIL POST ================= --}}
<section id="post-detail"
class="py-20 bg-gradient-to-br from-sky-100 via-sky-200 to-blue-300 d-none">

<div class="container py-8 px-6 mx-auto bg-white/95 backdrop-blur-sm border border-blue-200 rounded-2xl shadow-xl max-w-4xl text-slate-900">

<img id="detail-thumb"
     class="img-fluid rounded mb-4 w-100"
     style="max-height:420px; object-fit:cover">

<h1 id="detail-title" class="font-bold text-3xl mb-2"></h1>
<p id="detail-date" class="text-slate-600 mb-4"></p>

<article id="detail-content"
         class="text-lg leading-relaxed">
</article>

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