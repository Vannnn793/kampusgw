@extends('layout.main')
@section('title','Sejarah Politeknik Negeri Indramayu')

@section('content')

{{-- AOS CSS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

{{-- ================= HERO ================= --}}
<section class="relative h-screen overflow-hidden">
    <img 
        src="{{ asset('storage/images/kampusgw.jpg') }}"
        class="absolute inset-0 w-full h-full object-cover scale-110"
        alt="KampusGw.com"
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
                Kampus<br>
                <span class="text-cyan-400">Gw</span>
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
                    Pendirian KampusGW dilatarbelakangi oleh meningkatnya kebutuhan akan 
                    sumber daya manusia yang memiliki keahlian profesional serta pemahaman teknologi yang kuat.
                    Dunia industri menuntut lulusan yang tidak hanya unggul secara akademik, 
                    tetapi juga mampu menerapkan ilmu secara nyata dalam lingkungan kerja.
                </p>

                <p class="text-slate-300 text-lg leading-relaxed text-justify">
                    Sebagai respons terhadap tantangan tersebut, KampusGW mengembangkan 
                    konsep pendidikan yang menekankan keseimbangan antara teori, praktik,
                     inovasi, dan karakter. Institusi ini hadir sebagai jembatan antara dunia
                      pendidikan dan dunia industri melalui kolaborasi, penelitian terapan, 
                      serta program pengembangan kompetensi mahasiswa.
                </p>
            </div>

            <img 
               src="{{ asset('storage/images/gerbang.png') }}"
                class="rounded-[2rem] shadow-2xl"
                alt="Awal KampusGw"
                data-aos="fade-left"
            >
        </div>

        {{-- Task Force --}}
        <div class="grid md:grid-cols-2 gap-20 items-center">
            <img 
                src="{{ asset('storage/images/samping.png') }}"
                class="rounded-[2rem] shadow-2xl"
                alt="Task Force KAMPUS GW"
                data-aos="fade-right"
            >

            <div data-aos="fade-left">
                <h2 class="text-4xl font-bold text-cyan-400 mb-8">
                    Task Force dan Studi Kelayakan
                </h2>

                <p class="text-slate-300 text-lg leading-relaxed mb-6 text-justify">
                    Dalam perjalanannya, KampusGW terus mengalami perkembangan signifikan
                    baik dari sisi akademik maupun kelembagaan. Berbagai program studi dibuka
                    dengan fokus pada bidang teknologi informasi, data science, bisnis digital,
                    serta rekayasa sistem. Kurikulum disusun secara adaptif agar selaras dengan 
                    kebutuhan industri nasional dan global.
                </p>

                <p class="text-slate-300 text-lg leading-relaxed text-justify">
                    Didukung oleh tenaga pengajar profesional, fasilitas pembelajaran
                    modern, serta kemitraan strategis dengan berbagai sektor industri,
                    KampusGW berkembang menjadi institusi pendidikan tinggi yang dinamis,
                    inovatif, dan berorientasi masa depan.
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
                KampusGW berdiri secara resmi sebagai institusi pendidikan tinggi
                yang beroperasi sesuai ketentuan peraturan pendidikan nasional.
                Seluruh penyelenggaraan akademik dilaksanakan berdasarkan standar
                mutu pendidikan tinggi serta sistem penjaminan mutu internal yang berkelanjutan.
            </p>

            <p class="text-slate-300 text-lg leading-relaxed text-justify">
                Kepercayaan masyarakat dan pengakuan dari dunia industri terhadap
                kualitas lulusan menjadi bukti konsistensi KampusGW dalam menjaga
                mutu pendidikan. Institusi ini terus berkomitmen meningkatkan kualitas
                layanan akademik, penelitian, dan pengabdian kepada masyarakat.
            </p>
        </div>

        {{-- Penutup --}}
        <div class="relative text-center py-24"
             data-aos="zoom-in-up">
            <div class="absolute inset-0 bg-cyan-500/10 blur-3xl"></div>
            <p class="relative text-3xl font-semibold text-white leading-relaxed">
                KampusGw bukan sekadar kampus,<br>
                tetapi <span class="text-cyan-400">jalan perubahan</span>
                bagi masa depan Anak Bangsa.
            </p>
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
