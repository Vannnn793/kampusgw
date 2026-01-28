@extends('layout.main')
@section('title','Visi, Misi & Tujuan')

@section('content')

{{-- AOS CSS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

{{-- ================= HERO ================= --}}
<section class="relative h-[85vh] overflow-hidden">

    <!-- Background Image -->
    <img 
        src="{{ asset('storage/images/kampusgw.jpg') }}"
        class="absolute inset-0 w-full h-full object-cover scale-110"
        alt="Visi Misi KampusGw"
    >

    <!-- Overlay -->
    <div class="absolute inset-0
                bg-gradient-to-b
                from-slate-950/95
                via-indigo-950/85
                to-slate-950"></div>

    <!-- Content -->
    <div class="relative z-10 h-full flex items-center">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Title -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl
                       font-extrabold font-[Poppins]
                       text-white leading-tight
                       mb-8"
                data-aos="fade-up">

                Visi, Misi & Tujuan<br>

            <span class="block mt-4
             pb-2
             text-4xl md:text-5xl
             font-semibold
             tracking-wide
             leading-[1.25]
             bg-gradient-to-r
             from-cyan-400 via-sky-400 to-indigo-400
             bg-clip-text text-transparent">
             KampusGw
            </span>

            </h1>

            <!-- Description -->
            <p class="text-base md:text-lg lg:text-xl
                      text-slate-300
                      font-[Inter]
                      max-w-3xl leading-relaxed"
               data-aos="fade-up"
               data-aos-delay="200">
                Menjadi perguruan tinggi vokasi unggulan yang berorientasi
                pada pengembangan teknologi, industri, dan inovasi berkelanjutan
                guna mencetak lulusan profesional yang berdaya saing global.
            </p>

        </div>
    </div>

</section>

{{-- ================= VISI ================= --}}
<section class="relative bg-slate-950 py-40 text-white overflow-hidden">

    <!-- Glow Background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.15),transparent_60%)]"></div>

    <div class="relative max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-5xl md:text-6xl font-extrabold
                   bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400
                   bg-clip-text text-transparent mb-12"
            data-aos="zoom-in">
            Visi
        </h2>

        <p class="text-2xl md:text-3xl font-semibold leading-relaxed mb-8"
           data-aos="fade-up">
            Politeknik Terdepan Tingkat Nasional Berdaya Saing Global
        </p>

        <p class="text-lg italic text-slate-300"
           data-aos="fade-up" data-aos-delay="200">
            “National Leading and Globally Competitive Polytechnic”
        </p>

    </div>
</section>


{{-- ================= MISI ================= --}}
<section class="bg-gradient-to-b from-slate-950 to-indigo-950 py-40 text-white">

    <div class="max-w-5xl mx-auto px-6">

        <h2 class="text-5xl font-extrabold text-center
                   bg-gradient-to-r from-cyan-400 to-sky-400
                   bg-clip-text text-transparent mb-24"
            data-aos="fade-up">
            Misi
        </h2>

        <div class="space-y-16">

            @foreach([
                'Meningkatkan mutu, akses, dan relevansi pendidikan politeknik melalui penyelenggaraan pendidikan vokasi yang adaptif terhadap perkembangan ilmu pengetahuan, teknologi, serta kebutuhan dunia kerja dan industri.',
                'Menyelenggarakan penelitian terapan yang berorientasi pada pemecahan persoalan nyata di bidang industri dan masyarakat, serta mendorong inovasi yang memberikan nilai tambah bagi pembangunan nasional.',
                'Melaksanakan pengabdian kepada masyarakat secara berkelanjutan sebagai wujud kontribusi nyata institusi pendidikan dalam meningkatkan kesejahteraan dan kualitas hidup masyarakat.'
            ] as $i => $misi)

            <div class="flex gap-8 items-start"
                 data-aos="fade-up"
                 data-aos-delay="{{ $i * 150 }}">

                <div class="flex-shrink-0">
                    <span class="w-14 h-14 flex items-center justify-center
                                 rounded-full bg-cyan-400 text-slate-900
                                 font-extrabold text-xl">
                        {{ $i + 1 }}
                    </span>
                </div>

                <p class="text-lg text-slate-300 leading-relaxed">
                    {{ $misi }}
                </p>

            </div>

            @endforeach

        </div>

    </div>
</section>


{{-- ================= TUJUAN ================= --}}
<section class="relative bg-slate-950 py-40 text-white">

    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-5xl font-extrabold text-center leading-tight
           bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400
           bg-clip-text text-transparent mb-28">
             Tujuan
        </h2>


        <div class="grid md:grid-cols-2 gap-16">

            @foreach([
                'Menghasilkan lulusan yang berkualitas, mandiri, dan memiliki daya juang tinggi, serta mampu bersaing di tingkat nasional maupun global.',
                'Menghasilkan produk akademik, inovasi, dan hasil penelitian terapan yang memberikan manfaat nyata bagi masyarakat luas.',
                'Memberikan kontribusi nyata terhadap peningkatan kesejahteraan masyarakat melalui kegiatan pengabdian kepada masyarakat.',
                'Menjalankan dan memperkuat program kemitraan dengan industri dan dunia usaha.'
            ] as $i => $tujuan)

            <div class="group p-12 rounded-3xl
                        bg-slate-900/70 backdrop-blur
                        border border-white/10
                        hover:border-cyan-400/40
                        hover:scale-[1.02]
                        transition duration-300"
                 data-aos="fade-up"
                 data-aos-delay="{{ $i * 150 }}">

                <span class="block text-6xl font-extrabold
                             text-cyan-400/30 group-hover:text-cyan-400
                             transition mb-6">
                    {{ sprintf('%02d', $i + 1) }}
                </span>

                <p class="text-lg text-slate-300 leading-relaxed">
                    {{ $tujuan }}
                </p>

            </div>

            @endforeach

{{-- ================= AOS SCRIPT ================= --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1200,
        easing: 'ease-out-cubic',
        once: true,
        offset: 120,
    });
</script>
@endsection
