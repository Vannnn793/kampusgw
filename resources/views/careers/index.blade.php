@extends('layout.main')
@section('title','Alumni Track')

@section('content')

{{-- HERO --}}
<section class="min-h-screen flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h1 data-aos="fade-up" class="text-5xl md:text-6xl font-extrabold">
            Alumni <span class="text-indigo-400">Career Track</span>
        </h1>

        <p data-aos="fade-up" data-aos-delay="100"
           class="mt-6 text-slate-300 max-w-xl mx-auto">
            Jejak kesuksesan lulusan kampus kami di industri nasional dan global.
        </p>

    </div>
</section>


{{-- ALUMNI GRID --}}
<section class="py-28 bg-slate-950">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold">Alumni Berprestasi</h2>
            <p class="text-slate-400 mt-3">
                Menginspirasi generasi berikutnya
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @forelse ($alumni as $a)
                <div data-aos="zoom-in"
                     class="group bg-indigo-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

                    <img
                        src="{{ $a->foto ? asset('storage/'.$a->foto) : 'https://ui-avatars.com/api/?name='.$a->nama }}"
                        class="w-full h-60 object-cover"
                        alt="{{ $a->nama }}">

                    <div class="p-6">
                        <h3 class="text-lg font-bold">
                            {{ $a->nama }}
                        </h3>

                        <p class="text-indigo-400 text-sm">
                            {{ $a->jabatan ?? '-' }}
                            —
                            {{ $a->perusahaan ?? '-' }}
                        </p>

                        <p class="mt-2 text-slate-400 text-xs">
                            {{ $a->faculty->name ?? '-' }} • {{ $a->prodi->name ?? '-' }}
                        </p>

                        @if ($a->pesan_kesan)
                            <p class="mt-3 text-slate-300 text-sm italic">
                                "{{ $a->pesan_kesan }}"
                            </p>
                        @endif
                    </div>

                </div>
            @empty
                <p class="text-center text-slate-400 col-span-4">
                    Belum ada data alumni.
                </p>
            @endforelse

        </div>
    </div>
</section>

@endsection
