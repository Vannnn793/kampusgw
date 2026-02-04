@extends('layout.main')
@section('title', $pmb->title)

@section('content')

<section class="py-24 bg-slate-50">
    <div class="max-w-4xl mx-auto px-6">

        {{-- Card --}}
        <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">

            {{-- Judul --}}
            <h1 class="text-4xl font-extrabold mb-4 leading-tight text-gray-900">
                {{ $pmb->title }}
            </h1>

            {{-- Tanggal Pendaftaran --}}
            <p class="text-gray-600 mb-8">
                Pendaftaran: 
                <span class="font-medium text-gray-800">
                    {{ \Carbon\Carbon::parse($pmb->start_date)->format('d M Y') }}
                    – 
                    {{ \Carbon\Carbon::parse($pmb->end_date)->format('d M Y') }}
                </span>
            </p>

            {{-- Gambar PMB --}}
            @if($pmb->image)
                <img src="{{ asset('storage/'.$pmb->image) }}"
                     class="rounded-lg shadow mb-10 w-full object-contain max-h-[300px] mx-auto">
            @endif

            {{-- Konten PMB --}}
            <div class="prose prose-lg max-w-none leading-relaxed text-gray-800">
                {!! nl2br(e($pmb->content)) !!}
            </div>

            {{-- Tombol Daftar --}}
            @if($pmb->registration_link)
                <div class="mt-12 text-center">
                    <a href="{{ $pmb->registration_link }}"
                       target="_blank"
                       class="inline-flex items-center px-8 py-3 bg-[#1583D7] text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                        Daftar Sekarang
                    </a>
                </div>
            @endif

        </div>

    </div>
</section>

@endsection
