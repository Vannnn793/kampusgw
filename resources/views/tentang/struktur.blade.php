@extends('layout.main')
@section('title','Struktur Organisasi')

@section('content')

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
    .box {
        background-color: #020617;
        border: 1px solid #1e293b;
        transition: all 0.35s ease;
    }

    .box:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 10px 30px rgba(56,189,248,.15);
        border-color: #38bdf8;
    }
</style>

{{-- HEADER --}}
<section class="py-16 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-6 text-center"
         data-aos="fade-down">
        <h1 class="text-4xl font-bold text-cyan-400 mb-2">
            Struktur Organisasi
        </h1>
        <p class="text-slate-400 text-base">
            Daftar Nama Penjabat Struktural
        </p>
    </div>
</section>

<section class="bg-slate-950 py-10 text-white">
    <div class="max-w-6xl mx-auto px-6">

        {{-- Direktur --}}
        <div class="box rounded-xl p-6 text-center mb-8"
             data-aos="zoom-in">
            <p class="text-xl font-semibold text-white mb-1">
                Nurul Fadillah, Sd, Smp, Smk
            </p>
            <p class="text-cyan-400 text-sm">
                Direktur
            </p>
        </div>

        {{-- Wakil Direktur --}}
        <div class="grid md:grid-cols-3 gap-4">

            <div class="box rounded-xl p-5 text-center"
                 data-aos="fade-up"
                 data-aos-delay="100">
                <p class="text-slate-200 font-semibold mb-1">
                    Dimas Arfan, Sd, Smp, Smk
                </p>
                <p class="text-cyan-400 text-sm">
                    Wakil Direktur Bidang Akademik
                </p>
            </div>

            <div class="box rounded-xl p-5 text-center"
                 data-aos="fade-up"
                 data-aos-delay="200">
                <p class="text-slate-200 font-semibold mb-1">
                    Naufal Nadina, Sd, Smp, Smk
                </p>
                <p class="text-cyan-400 text-sm">
                    Wakil Direktur Bidang Perencanaan, Keuangan, dan Umum
                </p>
            </div>

            <div class="box rounded-xl p-5 text-center"
                 data-aos="fade-up"
                 data-aos-delay="300">
                <p class="text-slate-200 font-semibold mb-1">
                    Iwi, Sd, Smp, Smk
                </p>
                <p class="text-cyan-400 text-sm">
                    Wakil Direktur Bidang Kemahasiswaan, Alumni, dan Kerja Sama
                </p>
            </div>

        </div>

    </div>
</section>

{{-- TABEL --}}
<section class="bg-slate-950 py-14 text-white">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-2xl font-semibold text-cyan-400 mb-8 text-center"
            data-aos="fade-up">
            Tabel Pemegang Jabatan
        </h2>

        <div class="overflow-x-auto border border-slate-800 rounded-xl"
             data-aos="fade-up"
             data-aos-delay="100">
            <table class="w-full border-collapse">
                <thead class="bg-slate-900 text-cyan-400">
                    <tr>
                        <th class="px-5 py-3">No</th>
                        <th class="px-5 py-3">Jabatan</th>
                        <th class="px-5 py-3">Nama</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">

                    @php
                        $data = [
                            ['Direktur','Nurul Fadillah, Sd, Smp, Smk'],
                            ['Wakil Direktur Akademik','Dimas Arfan, Sd, Smp, Smk'],
                            ['Wakil Direktur Perencanaan','Naufal Nadina, Sd, Smp, Smk'],
                            ['Wakil Direktur Kemahasiswaan','Iwi, Sd, Smp, Smk'],
                            ['Kepala Akademik','Armanda Dala Raja, Sd, Smp, Smk'],
                            ['Kepala Administrasi','Roihan Naufal, Sd, Smp, Smk'],
                            ['Kepala Operasional','Abdul Fathir, Sd, Smp, Smk'],
                        ];
                    @endphp

                    @foreach($data as $i => $row)
                    <tr class="border-t border-slate-800 hover:bg-slate-900 transition"
                        data-aos="fade-up"
                        data-aos-delay="{{ $i * 60 }}">
                        <td class="px-5 py-3">{{ $i+1 }}</td>
                        <td class="px-5 py-3 font-medium text-white">{{ $row[0] }}</td>
                        <td class="px-5 py-3">{{ $row[1] }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- AOS SCRIPT --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 900,
        easing: 'ease-out-cubic',
        once: true,
        offset: 120,
    });
</script>

@endsection
