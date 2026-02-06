@extends('layout.main')
@section('title','Alumni Track')

@section('content')

{{-- ================= ALUMNI TRACK ================= --}}
<section class="py-24 bg-sky-50">
    <div class="max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="mb-20 max-w-2xl">
            <span class="inline-block mb-4 px-4 py-2 text-sm font-semibold
                         text-sky-700 bg-sky-100 rounded-full">
                SUCCESS STORIES
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                Alumni
                <span class="text-sky-600">Career Track</span>
            </h1>

            <p class="mt-4 text-slate-600 leading-relaxed">
                Kisah nyata perjalanan alumni dalam membangun karir
                setelah menyelesaikan studi.
            </p>
        </div>

        {{-- ALUMNI GRID --}}
        <div class="grid md:grid-cols-2 gap-10">

            @forelse ($alumni as $a)
            <div data-aos="fade-up"
                 class="bg-sky-100 rounded-3xl p-8
                        border border-sky-200
                        shadow-sm hover:shadow-lg
                        hover:-translate-y-1
                        transition duration-300">

                {{-- PESAN & KESAN (FULL) --}}
                @if ($a->pesan_kesan)
                <p class="text-slate-800 text-lg leading-relaxed italic mb-10">
                    “{{ $a->pesan_kesan }}”
                </p>
                @endif

                {{-- FOOTER CARD --}}
                <div class="flex items-center gap-4 pt-6 border-t border-sky-300/50">

                    <img
                        src="{{ $a->foto ? asset('storage/'.$a->foto) : 'https://ui-avatars.com/api/?name='.$a->nama }}"
                        alt="{{ $a->nama }}"
                        class="w-14 h-14 rounded-full object-cover
                               ring-2 ring-sky-400 bg-white">

                    <div>
                        <h3 class="font-semibold text-slate-900">
                            {{ $a->nama }}
                        </h3>

                        <p class="text-sky-700 text-sm font-semibold">
                            {{ $a->jabatan ?? '-' }}
                            —
                            {{ $a->perusahaan ?? '-' }}
                        </p>

                        <p class="text-xs text-slate-600 mt-1">
                            {{ $a->faculty->name ?? '-' }} • {{ $a->prodi->name ?? '-' }}
                        </p>
                    </div>

                </div>
            </div>
            @empty
            <p class="text-center text-slate-600 col-span-2">
                Belum ada data alumni.
            </p>
            @endforelse

        </div>

    </div>
</section>

{{-- ================= AOS ================= --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<style>
@keyframes zoomHero {
    0%   { transform: scale(1); }
    50%  { transform: scale(1.08); }
    100% { transform: scale(1); }
}
</style>

<script>
AOS.init({
    duration: 800,
    easing: 'ease-out-cubic',
    once: true
});
</script>
@endsection
