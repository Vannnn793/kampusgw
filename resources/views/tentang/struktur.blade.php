@extends('layout.main')
@section('title','Struktur Organisasi')

@section('content')

<style>
    .box {
        background-color: #020617;
        border: 1px solid #1e293b;
    }
</style>

{{-- HEADER --}}
<section class="py-16 bg-slate-950 text-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold text-cyan-400 mb-2">
            Struktur Organisasi
        </h1>
        <p class="text-slate-400 text-base">
            Daftar Nama Penjabat Struktural
        </p>
    </div>
</section>
        {{-- Direktur --}}
        <div class="box rounded-xl p-6 text-center mb-8">
            <p class="text-xl font-semibold text-white mb-1">
                Ir. Rofan Aziz, S.T., M.T., IPM
            </p>
            <p class="text-sm uppercase tracking-wide text-slate-400">
                Direktur
            </p>
        </div>

        {{-- Wakil Direktur --}}
        <div class="grid md:grid-cols-3 gap-4">

            <div class="box rounded-xl p-5 text-center">
                <p class="text-slate-200 font-semibold mb-1">
                    Ir. Badruzzaman, S.ST., M.T.
                </p>
                <p class="text-cyan-400 text-sm">
                    Wakil Direktur Bidang Akademik
                </p>
            </div>

            <div class="box rounded-xl p-5 text-center">
                <p class="text-slate-200 font-semibold mb-1">
                    Ahmad Lubis Ghozali, S.Kom., M.Kom.
                </p>
                <p class="text-cyan-400 text-sm">
                    Wakil Direktur Bidang Perencanaan, Keuangan, dan Umum
                </p>
            </div>

            <div class="box rounded-xl p-5 text-center">
                <p class="text-slate-200 font-semibold mb-1">
                    Ir. Karsid, S.T., M.T.
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

        <h2 class="text-2xl font-semibold text-cyan-400 mb-8 text-center">
            Tabel Pemegang Jabatan
        </h2>

        <div class="overflow-x-auto border border-slate-800 rounded-xl">
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
                            ['Direktur','Rofan Aziz, S.T., M.T'],
                            ['Wakil Direktur Bidang Akademik','Badruzzaman, S.ST., M.T.'],
                            ['Wakil Direktur Bidang Perencanaan, Keuangan, dan Umum','Ahmad Lubis Ghozali, S.Kom., M.Kom.'],
                            ['Wakil Direktur Bidang Kemahasiswaan, Alumni, dan Kerja Sama','Karsid, S.T., M.T.'],
                            ['Ketua Jurusan Teknik','Wardika, S.ST., M.Eng.'],
                            ['Ketua Jurusan Teknik Informatika','Eka Ismantohadi, S.Kom., M.Eng.'],
                            ['Ketua Jurusan Kesehatan','Hj. Winani, S.Kep. Ners., M.Kep.'],
                            ['Kepala Pusat Penelitian dan Pengabdian kepada Masyarakat','Dr. Mohammad Yani, S.T., M.T., M.Sc.'],
                            ['Kepala Penjaminan Mutu dan Pengembangan Pembelajaran','Fauzan Amri, S.Si., M.T.'],
                            ['Kepala UPA Perpustakaan','Rendi, M.Kom.'],
                            ['Kepala UPA TIK','Nur Budi Nugraha, S.Kom., M.T.'],
                            ['Kepala UPA Bahasa','Berlian Kusuma Dewi, S.Kep., Ns., M.S.'],
                            ['Kepala UPA Perawatan dan Perbaikan','Sukroni, S.T., M.T.'],
                            ['Kepala UPA Pengembangan Karir dan Kewirausahaan','Nurohmat, S.KM., M.H.'],
                            ['Kepala UPA Uji Kompetensi','Moh. Ali Fikri, M.Kom.'],
                            ['Kepala UPA Laboratorium Terpadu','Indra Fitriyanto, S.Pd., M.T.'],
                        ];
                    @endphp

                    @foreach($data as $i => $row)
                    <tr class="border-t border-slate-800 hover:bg-slate-900">
                        <td class="px-5 py-3">{{ $i+1 }}</td>
                        <td class="px-5 py-3 font-medium text-white">{{ $row[0] }}</td>
                        <td class="px-5 py-3">{{ $row[1] }}</td>
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
            </a>
        </div>

    </div>
</section>

@endsection
