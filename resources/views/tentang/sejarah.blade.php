@extends('layout.main')
@section('title','Profil Kampus')

@section('content')

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

{{-- ================= HERO (BG FOTO TIDAK DIUBAH) ================= --}}
<section class="relative h-screen overflow-hidden bg-neutral-100">
    <img
        src="{{ $profile && $profile->logo_path
            ? asset('storage/'.$profile->logo_path)
            : asset('storage/images/kampusgw.jpg') }}"
        class="absolute inset-0 w-full h-full object-cover"
        alt="Kampus"
        data-aos="zoom-out"
        data-aos-duration="1500">

    <div class="absolute inset-0 bg-[#151B54]/70"></div>

    <div class="relative z-10 h-full flex items-center">
        <div class="max-w-6xl mx-auto px-6">
            <p class="text-sky-200 uppercase tracking-widest mb-4"
               data-aos="fade-down">
                Sejarah Institusi
            </p>

            <h1 class="text-6xl md:text-7xl font-extrabold text-white leading-tight mb-8"
                data-aos="fade-up"
                data-aos-delay="150">
                Politeknik<br>
                <span class="text-sky-300">Negeri Indramayu</span>
            </h1>

            <p class="text-xl text-sky-100 max-w-3xl leading-relaxed text-justify italic"
               data-aos="fade-up"
               data-aos-delay="300">
                {{ $profile
                    ? \Illuminate\Support\Str::limit(strip_tags($profile->sejarah_kampus), 220)
                    : 'Sejarah kampus belum diisi.' }}
            </p>
        </div>
    </div>
</section>

{{-- ===================== --}}
{{-- SECTION SEJARAH KAMPUS --}}
{{-- ===================== --}}
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        {{-- JUDUL --}}
        <div class="flex justify-center mb-20"
             data-aos="zoom-in">
            <h2 class="bg-[#151B54] text-white
                       px-16 py-6
                       rounded-2xl
                       text-4xl md:text-5xl
                       font-serif tracking-wide
                       shadow-2xl">
                Sejarah Kampus
            </h2>
        </div>

        {{-- KONTEN SEJARAH --}}
        <div class="relative bg-slate-50
                    rounded-3xl
                    p-12 md:p-16
                    shadow-lg"
             data-aos="fade-up"
             data-aos-duration="1200">

            {{-- GARIS AKSEN KIRI --}}
            <div class="absolute left-0 top-10 bottom-10
                        w-1.5 bg-[#151B54]/90 rounded-full"
                 data-aos="fade-right"
                 data-aos-delay="200"></div>

            {{-- ICON ATAS --}}
            <div class="absolute -top-7 left-12
                        bg-[#151B54]
                        text-white
                        w-14 h-14
                        flex items-center justify-center
                        rounded-full
                        shadow-xl
                        text-2xl"
                 data-aos="zoom-in"
                 data-aos-delay="300">
                📜
            </div>

            {{-- ISI DARI DATABASE --}}
            <div class="prose max-w-none
                        prose-p:text-slate-700
                        prose-p:leading-relaxed
                        prose-p:mb-6
                        prose-strong:text-slate-900
                        prose-em:text-slate-600"
                 data-aos="fade-up"
                 data-aos-delay="400">
                {!! $profile->sejarah_kampus !!}
            </div>
        </div>
    </div>
</section>

{{-- ================= VIDEO PROFIL (TIDAK DIUBAH) ================= --}}
@php
    $youtubeId = null;
    if ($profile && $profile->link_video_profil) {
        if (str_contains($profile->link_video_profil, 'youtu.be/')) {
            $youtubeId = last(explode('/', $profile->link_video_profil));
        } elseif (str_contains($profile->link_video_profil, 'watch?v=')) {
            parse_str(parse_url($profile->link_video_profil, PHP_URL_QUERY), $yt);
            $youtubeId = $yt['v'] ?? null;
        } elseif (str_contains($profile->link_video_profil, 'embed/')) {
            $youtubeId = last(explode('embed/', $profile->link_video_profil));
        }
    }
@endphp

@if($youtubeId)
<section class="bg-slate-100 py-28">
    <div class="max-w-5xl mx-auto px-6"
         data-aos="zoom-in-up"
         data-aos-duration="1200">
        <iframe
            src="https://www.youtube.com/embed/{{ $youtubeId }}"
            class="w-full aspect-video rounded-3xl shadow-2xl border"
            allowfullscreen>
        </iframe>
    </div>
</section>
@endif

{{-- ================= VISI & MISI ================= --}}
@if($profile && ($profile->visi || $profile->misi))
<section class="bg-slate-100 py-32">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-4xl font-bold text-slate-900 mb-20 text-center"
            data-aos="fade-up">
            Visi & Misi
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
                    {!! $profile->misi !!}
                </div>
            </div>

            {{-- VISI --}}
            <div class="bg-[#E0B100] rounded-3xl p-12 shadow-xl"
                 data-aos="fade-left"
                 data-aos-delay="150">
                <h3 class="text-3xl font-bold text-slate-900 mb-8 text-center">
                    Visi
                </h3>

                <div class="prose max-w-none italic text-center
                            prose-p:text-slate-900
                            prose-p:text-xl
                            prose-p:leading-relaxed">
                    {!! $profile->visi !!}
                </div>
            </div>

        </div>
    </div>
</section>
@endif

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
        easing: 'ease-out-cubic'
    });
</script>

@endsection
