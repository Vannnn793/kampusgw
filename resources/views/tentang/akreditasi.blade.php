@extends('layout.main')
@section('title','Dokumen Akreditasi')

@section('content')

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

{{-- HEADER --}}
<section class="py-24 bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-6" data-aos="fade-up">
        <p class="text-slate-400 text-sm mb-4">
            Beranda / Dokumen / <span class="text-cyan-400">Akreditasi</span>
        </p>
        <h1 class="text-5xl font-extrabold text-cyan-400 mb-6">
            Dokumen Akreditasi
        </h1>
        <p class="text-lg text-slate-300 max-w-3xl leading-relaxed">
            Halaman ini menyajikan informasi resmi mengenai status akreditasi
            institusi dan program studi sebagai bentuk komitmen Politeknik Negeri
            Indramayu terhadap penjaminan mutu, transparansi, dan akuntabilitas
            penyelenggaraan pendidikan tinggi.
        </p>
    </div>
</section>

{{-- INFORMASI --}}
<section class="bg-slate-950 py-20 text-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-slate-900/60 rounded-2xl p-8 text-slate-300 leading-relaxed"
             data-aos="fade-up">
            <p>
                Akreditasi merupakan proses evaluasi dan penilaian kelayakan
                institusi pendidikan tinggi serta program studi oleh lembaga
                akreditasi yang berwenang.
            </p>
            <p class="mt-4">
                Informasi yang ditampilkan meliputi nomor keputusan (SK),
                masa berlaku, peringkat akreditasi, dan status keberlakuan
                sebagai referensi resmi bagi masyarakat.
            </p>
        </div>
    </div>
</section>

{{-- TABEL --}}
<section class="bg-gradient-to-b from-slate-950 to-indigo-950 py-24 text-white">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-cyan-400 mb-12"
            data-aos="fade-up">
            Daftar Sertifikat Akreditasi
        </h2>

        <div class="overflow-x-auto rounded-2xl shadow-xl"
             data-aos="fade-up"
             data-aos-delay="100">
            <table class="w-full border-collapse bg-slate-900/70 backdrop-blur text-sm">
                <thead>
                    <tr class="bg-slate-800 text-cyan-400">
                        <th class="px-4 py-4">No</th>
                        <th class="px-4 py-4 text-left">Institusi / Program Studi</th>
                        <th class="px-4 py-4 text-left">Nomor SK</th>
                        <th class="px-4 py-4">Masa Berlaku</th>
                        <th class="px-4 py-4">Peringkat</th>
                        <th class="px-4 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">

                    @php
                        $data = [
                            [1,'Politeknik Negeri Indramayu','1039/SK/BAN-PT/Akred/PT/XII/2020','2020–2025','Baik','Berlaku'],
                            [2,'D-III Teknik Informatika','017/BAN-PT/Ak-XII/Dpl-III/X/2011','2011–2016','C','Kedaluwarsa'],
                            [3,'D-III Teknik Informatika','1650/BAN-PT/Akred/Dipl-III/VII/2016','2016–2021','C','Kedaluwarsa'],
                            [4,'D-III Teknik Informatika','2980/SK/BAN-PT/Akred/Dipl-III/X/2018','2018–2023','B','Kedaluwarsa'],
                            [5,'D-III Teknik Informatika','164/SK/LAM-INFOKOM/Ak/D3/XII/2023','2023–2028','Baik Sekali','Berlaku'],
                            [6,'D-III Teknik Mesin','013/BAN-PT/Ak-XI/Dpl-III/IX/2011','2011–2016','C','Kedaluwarsa'],
                            [7,'D-III Teknik Mesin','1791/SK/BAN-PT/Akred/Dipl-III/IX/2016','2016–2021','B','Kedaluwarsa'],
                            [8,'D-III Teknik Mesin','13481/SK/BAN-PT/Akred-PMT/Dipl-III/XII/2021','2021–2026','Baik','Berlaku'],
                        ];
                    @endphp

                    @foreach($data as $row)
                    <tr class="border-b border-slate-700 hover:bg-slate-800/50 transition"
                        data-aos="fade-up"
                        data-aos-delay="{{ $row[0] * 30 }}">
                        <td class="px-4 py-3 text-center">{{ $row[0] }}</td>
                        <td class="px-4 py-3">{{ $row[1] }}</td>
                        <td class="px-4 py-3">{{ $row[2] }}</td>
                        <td class="px-4 py-3 text-center">{{ $row[3] }}</td>
                        <td class="px-4 py-3 text-center">{{ $row[4] }}</td>
                        <td class="px-4 py-3 text-center">{{ $row[5] }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        
        <!-- BACK -->
        <div class="text-center mt-28"
             data-aos="fade-up">
            <a href="{{ url('/tentang') }}"
               class="text-cyan-400 hover:underline text-lg">
                ← Kembali ke Tentang Kami
        </div>

    </div>
</section>

{{-- AOS SCRIPT --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: true,
        offset: 120,
    });
</script>
@endsection