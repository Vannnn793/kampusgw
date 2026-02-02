@extends('layout.main')

@section('title', 'Fasilitas')

@section('content')

<section class="min-h-screen bg-[#f8fafc] py-20">
    <div class="max-w-7xl mx-auto px-6">

        {{-- JUDUL --}}
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800">
                Fasilitas
                @isset($faculty)
                    <span class="text-blue-700">{{ $faculty->name }}</span>
                @else
                    Jurusan
                @endisset
            </h1>

            <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                Fasilitas pendukung pembelajaran dan kegiatan akademik
                @isset($faculty)
                    di {{ $faculty->name }}.
                @else
                    di setiap fakultas.
                @endisset
            </p>
        </div>

        {{-- LIST FASILITAS --}}
        <div class="space-y-20">

            @forelse($facilities as $facility)
                <div class="flex flex-col md:flex-row items-center gap-10
                            {{ $loop->iteration % 2 == 0 ? 'md:flex-row-reverse' : '' }}">

                    {{-- FOTO --}}
                    <div class="md:w-1/2">
                        <img
                            src="{{ asset('storage/' . $facility->image) }}"
                            alt="{{ $facility->name }}"
                            class="w-full h-[320px] object-cover rounded-2xl shadow-lg"
                        >
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="md:w-1/2">
                        <h2 class="text-2xl font-bold text-slate-800 mb-4">
                            {{ $facility->name }}
                        </h2>

                        <p class="text-slate-600 leading-relaxed mb-6">
                            {{ $facility->description }}
                        </p>

                        @isset($facility->faculty)
                            <span class="inline-block px-4 py-1 text-sm font-medium
                                         bg-blue-100 text-blue-700 rounded-full">
                                {{ $facility->faculty->name }}
                            </span>
                        @endisset
                    </div>

                </div>
            @empty
                <div class="text-center py-24">
                    <p class="text-lg text-slate-500 font-medium">
                        Belum ada data fasilitas yang tersedia.
                    </p>
                </div>
            @endforelse

        </div>

    </div>
</section>

@endsection
