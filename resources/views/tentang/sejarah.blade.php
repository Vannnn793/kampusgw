@extends('layout.main')
@section('title','Sejarah Politeknik Negeri Indramayu')

@section('content')

{{-- AOS CSS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

{{-- ================= HERO ================= --}}
<section class="relative h-screen overflow-hidden">
    <img 
        src="https://i.ytimg.com/vi/r3qjFAB5RZY/maxresdefault.jpg"
        class="absolute inset-0 w-full h-full object-cover scale-110"
        alt="Politeknik Negeri Indramayu"
    >

    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-indigo-950/60"></div>

    <div class="relative z-10 h-full flex items-center">
        <div class="max-w-6xl mx-auto px-6">
            <p class="text-cyan-400 uppercase tracking-widest mb-4"
               data-aos="fade-down">
                Sejarah Institusi
            </p>

            <h1 class="text-6xl md:text-7xl font-extrabold text-white leading-tight mb-8"
                data-aos="fade-up">
                Politeknik Negeri<br>
                <span class="text-cyan-400">Indramayu</span>
            </h1>

            <p class="text-xl text-slate-300 max-w-3xl leading-relaxed text-justify"
               data-aos="fade-up" data-aos-delay="200">
                Lahir dari kebijakan nasional dan komitmen daerah dalam
                membangun pendidikan vokasi sebagai fondasi peningkatan
                kualitas sumber daya manusia Indonesia.
            </p>
        </div>
    </div>
</section>

{{-- ================= OPENING ================= --}}
<section class="bg-slate-950 text-white py-40">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <p class="text-2xl text-slate-300 italic leading-relaxed"
           data-aos="zoom-in">
            “Pendidikan vokasi membuka akses, harapan, dan masa depan
            bagi generasi daerah.”
        </p>
    </div>
</section>

{{-- ================= MAIN CONTENT ================= --}}
<section class="bg-gradient-to-b from-slate-950 to-indigo-950 text-white py-40">
    <div class="max-w-5xl mx-auto px-6 space-y-40">

        {{-- Latar Belakang --}}
        <div class="grid md:grid-cols-2 gap-20 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl font-bold text-cyan-400 mb-8">
                    Latar Belakang Pendirian
                </h2>

                <p class="text-slate-300 text-lg leading-relaxed mb-6 text-justify">
                    Politeknik Negeri Indramayu (POLINDRA) didirikan sebagai
                    bagian dari kebijakan Pemerintah Republik Indonesia
                    dalam meningkatkan kuantitas dan kualitas pendidikan
                    vokasi. Kebijakan ini diwujudkan melalui mekanisme
                    kompetisi proposal nasional yang menuntut komitmen
                    kuat antara pemerintah pusat dan pemerintah daerah.
                </p>

                <p class="text-slate-300 text-lg leading-relaxed text-justify">
                    Kesempatan tersebut ditangkap dengan baik oleh
                    Bupati Indramayu, Dr. H. Irianto MS Syafiuddin,
                    yang memiliki perhatian besar terhadap pengembangan
                    pendidikan vokasi sebagai strategi peningkatan
                    kualitas sumber daya manusia di Kabupaten Indramayu.
                </p>
            </div>

            <img 
                src="https://th.bing.com/th/id/OIP.vQ2iMG8T2Xh2QuuwTKLTUwHaE7"
                class="rounded-[2rem] shadow-2xl"
                alt="Awal POLINDRA"
                data-aos="fade-left"
            >
        </div>

        {{-- Task Force --}}
        <div class="grid md:grid-cols-2 gap-20 items-center">
            <img 
                src="https://i.ytimg.com/vi/r3qjFAB5RZY/maxresdefault.jpg"
                class="rounded-[2rem] shadow-2xl"
                alt="Task Force POLINDRA"
                data-aos="fade-right"
            >

            <div data-aos="fade-left">
                <h2 class="text-4xl font-bold text-cyan-400 mb-8">
                    Task Force dan Studi Kelayakan
                </h2>

                <p class="text-slate-300 text-lg leading-relaxed mb-6 text-justify">
                    Dalam rangka mempersiapkan pendirian POLINDRA,
                    dibentuk sebuah Task Force melalui Surat Perintah
                    Tugas Bupati. Tim ini bertanggung jawab dalam
                    penyusunan studi kelayakan, pembangunan komitmen
                    dengan para pemangku kepentingan, serta penyiapan
                    seluruh dokumen proposal pendirian.
                </p>

                <p class="text-slate-300 text-lg leading-relaxed text-justify">
                    Seluruh proses tersebut dibimbing oleh para pakar
                    dari Politeknik Negeri Bandung, khususnya dalam
                    pengkajian pemilihan program studi yang relevan
                    dengan kebutuhan dunia industri dan pembangunan
                    daerah.
                </p>
            </div>
        </div>

        {{-- Legalitas --}}
        <div class="text-center max-w-4xl mx-auto"
             data-aos="fade-up">
            <h2 class="text-4xl font-bold text-cyan-400 mb-10">
                Legalitas dan Penetapan Nasional
            </h2>

            <p class="text-slate-300 text-lg leading-relaxed mb-6 text-justify">
                Dari 54 kabupaten/kota yang mengikuti kompetisi nasional,
                hanya 9 daerah yang dinyatakan lolos. POLINDRA resmi
                memperoleh izin pendirian melalui Keputusan Menteri
                Pendidikan Nasional Republik Indonesia Nomor
                124/D/O/2008 tanggal 8 Juli 2008.
            </p>

            <p class="text-slate-300 text-lg leading-relaxed text-justify">
                Pada tahun 2014, POLINDRA beralih status menjadi
                Perguruan Tinggi Negeri dan diresmikan langsung oleh
                Presiden Republik Indonesia.
            </p>
        </div>

        {{-- Penutup --}}
        <div class="relative text-center py-24"
             data-aos="zoom-in-up">
            <div class="absolute inset-0 bg-cyan-500/10 blur-3xl"></div>
            <p class="relative text-3xl font-semibold text-white leading-relaxed">
                POLINDRA bukan sekadar kampus,<br>
                tetapi <span class="text-cyan-400">jalan perubahan</span>
                bagi masa depan Indramayu.
            </p>
        </div>

        <!-- BACK -->
        <div class="text-center mt-28"
             data-aos="fade-up">
            <a href="{{ url('/tentang') }}"
               class="text-cyan-400 hover:underline text-lg">
                ← Kembali ke Tentang Kami
            </a>
        </div>

    </div>
</section>

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
