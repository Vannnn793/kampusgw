@extends('layout.main')
@section('title','Penerimaan Mahasiswa Baru')

@section('content')

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Judul Utama --}}
        <h2 class="text-3xl font-extrabold text-center text-black mb-12">
            Jalur Penerimaan Mahasiswa Baru
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            @forelse($pmbs as $pmb)
            <div class="rounded-xl overflow-hidden shadow-md bg-white hover:shadow-xl transition flex flex-col">

                {{-- FOTO (full card tinggi) --}}
                <div class="h-80 overflow-hidden bg-slate-200">
                    @if($pmb->image)
                        <img src="{{ asset('storage/'.$pmb->image) }}"
                             class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                            Tidak ada gambar
                        </div>
                    @endif
                </div>

                {{-- HEADER KARTU --}}
                <div class="p-5" style="background-color: #1583D7; color: white;">
                    <h3 class="font-bold text-lg leading-snug">
                        {{ $pmb->title }}
                    </h3>

                    <p class="text-sm opacity-90 mt-1">
                        {{ \Carbon\Carbon::parse($pmb->start_date)->format('d M Y') }}
                        –
                        {{ \Carbon\Carbon::parse($pmb->end_date)->format('d M Y') }}
                    </p>
                </div>

                {{-- BODY KARTU --}}
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                        {{ Str::limit(strip_tags($pmb->content), 120) }}
                    </p>

                    <a href="{{ route('pmb.show', $pmb->slug) }}"
                       class="font-semibold text-blue-700 hover:text-blue-900 mt-auto">
                        Lihat Detail →
                    </a>
                </div>

            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500">
                Belum ada jalur PMB aktif
            </div>
            @endforelse

        </div>

    </div>
</section>

@endsection
