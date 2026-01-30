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

        <h2 class="text-3xl font-bold text-cyan-400 mb-12" data-aos="fade-up">
            Daftar Sertifikat Akreditasi
        </h2>

        <div class="overflow-x-auto rounded-2xl shadow-xl"
             data-aos="fade-up"
             data-aos-delay="100">

            <table class="w-full border-collapse bg-slate-900/70 backdrop-blur text-sm">
                <thead>
                    <tr class="bg-slate-800 text-cyan-400">
                        <th class="px-4 py-4">No</th>
                        <th class="px-4 py-4 text-left">Program Studi</th>
                        <th class="px-4 py-4 text-left">Nomor Sertifikat</th>
                        <th class="px-4 py-4">Masa Berlaku</th>
                        <th class="px-4 py-4">Peringkat</th>
                        <th class="px-4 py-4">Status</th>
                    </tr>
                </thead>

                <tbody class="text-slate-300">

                @forelse($accreditations ?? [] as $index => $row)

                <tr class="border-b border-slate-700 hover:bg-slate-800/50 transition"
                    data-aos="fade-up"
                    data-aos-delay="{{ ($index + 1) * 30 }}">

                    {{-- NO --}}
                    <td class="px-4 py-3 text-center">
                        {{ $index + 1 }}
                    </td>

                    {{-- PROGRAM --}}
                    <td class="px-4 py-3">
                        {{ $row->program_name }}
                    </td>

                    {{-- SERTIFIKAT --}}
                    <td class="px-4 py-3">
                        {{ $row->certificate_number }}
                    </td>

                    {{-- MASA BERLAKU --}}
                    <td class="px-4 py-3 text-center">
                        {{ $row->valid_until }}
                    </td>

                    {{-- PERINGKAT --}}
                    <td class="px-4 py-3 text-center">
                        {{ $row->level }}
                    </td>

                    {{-- STATUS --}}
                    <td class="px-4 py-3 text-center">
                        @if(strtotime($row->valid_until) < time())
                            <span class="px-3 py-1 rounded-full text-xs bg-red-600/20 text-red-400">
                                Kedaluwarsa
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs bg-green-600/20 text-green-400">
                                Berlaku
                            </span>
                        @endif
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center py-10 text-slate-400">
                        Data akreditasi belum tersedia
                    </td>
                </tr>

                @endforelse

                </tbody>
            </table>

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
