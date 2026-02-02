@extends('layout.main')
@section('title','Dokumen Akreditasi')

@section('content')

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

{{-- ================= HEADER BACKGROUND (TIDAK DIUBAH) ================= --}}
<section
    class="relative h-[420px] md:h-[520px] lg:h-[600px] flex items-center justify-center text-white bg-cover bg-center"
    style="background-image: url('https://masuk-ptn.com/images/product/939b9e85f2289a2cc34a9f4d7bff7413e25f645a.jpg');">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/60"></div>

    {{-- Title --}}
    <div class="relative z-10 text-center px-4">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-cyan-400">
            Dokumen Akreditasi
        </h1>

        <p class="mt-4 text-slate-200 max-w-xl mx-auto">
            Informasi resmi status akreditasi program studi kampus
        </p>
    </div>

</section>
{{-- ================= TABEL AKREDITASI ================= --}}
<section class="bg-[#F8FAFC] py-20 text-slate-800">

    <div class="max-w-7xl mx-auto px-6">

        <div class="overflow-x-auto rounded-2xl shadow-lg"
             data-aos="fade-up">

            <table class="w-full text-sm rounded-2xl overflow-hidden">

                {{-- HEADER --}}
                <thead>
                    <tr class="bg-[#151B54] text-white text-base">
                        <th class="px-6 py-4 text-center w-16">No.</th>
                        <th class="px-6 py-4 text-left">Program Studi</th>
                        <th class="px-6 py-4 text-left">Nomor Sertifikat</th>
                        <th class="px-6 py-4 text-center">Masa Berlaku</th>
                        <th class="px-6 py-4 text-center">Peringkat</th>
                        <th class="px-6 py-4 text-center">Status</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody class="text-[#0f2a44]">

                @forelse($accreditations as $row)
                    <tr class="{{ $loop->odd ? 'bg-sky-50' : 'bg-sky-100' }}
                               hover:bg-sky-200 transition">

                        <td class="px-6 py-4 text-center font-semibold">
                            {{ $loop->iteration }}.
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            {{ $row->program_name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $row->certificate_number }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ \Carbon\Carbon::parse($row->valid_until)->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4 text-center font-bold text-[#151B54]">
                            {{ $row->level }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if(\Carbon\Carbon::parse($row->valid_until)->isPast())
                                <span class="px-3 py-1 rounded-full text-xs
                                             bg-red-100 text-red-700 font-semibold">
                                    Kedaluwarsa
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs
                                             bg-green-100 text-green-700 font-semibold">
                                    Berlaku
                                </span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr class="bg-sky-50">
                        <td colspan="6" class="text-center py-12 italic text-slate-500">
                            Data akreditasi belum tersedia
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</section>


{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({
    duration: 800,
    once: true,
});
</script>

@endsection
