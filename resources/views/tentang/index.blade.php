@extends('layout.main')
@section('title','Tentang Kami')

@section('content')

<!-- ================= TENTANG KAMI ================= -->
<section
    class="min-h-screen flex items-center
           bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950 text-white">

    <div class="max-w-7xl mx-auto px-6 w-full">

        <!-- HEADER -->
        <div class="text-center mb-20">

            <span class="inline-block mb-4 px-4 py-1 text-xs rounded-full
                         bg-cyan-500/10 text-cyan-400">
                Tentang KampusGW
            </span>

            <h2
                class="relative inline-block text-4xl md:text-5xl font-black tracking-wide
                       bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400
                       bg-clip-text text-transparent
                       drop-shadow-[0_0_20px_rgba(56,189,248,0.35)]">

                Profil Kampus

                <span
                    class="absolute left-0 -bottom-3 w-full h-[3px]
                           bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-400
                           rounded-full animate-line"></span>
            </h2>

            <p class="mt-6 text-lg text-slate-400 max-w-2xl mx-auto">
                  Informasi institusi yang disajikan secara profesional dan modern.
            </p>

        </div>

        <!-- GRID MENU -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- SEJARAH -->
            <div
                onclick="location.href='{{ url('/tentang/sejarah') }}'"
                class="cursor-pointer rounded-2xl p-8
                       bg-white/5 border border-white/10
                       hover:bg-white/10 hover:scale-105
                       transition duration-300">

                <h3 class="text-xl font-bold mb-2 text-cyan-400">
                    Sejarah Kampus
                </h3>
            </div>

            <!-- VISI MISI -->
            <div
                onclick="location.href='{{ url('/tentang/visi-misi') }}'"
                class="cursor-pointer rounded-2xl p-8
                       bg-white/5 border border-white/10
                       hover:bg-white/10 hover:scale-105
                       transition duration-300">

                <h3 class="text-xl font-bold mb-2 text-indigo-400">
                    Visi • Misi • Tujuan
                </h3>
            </div>

            <!-- STRUKTUR -->
            <div
                onclick="location.href='{{ url('/tentang/struktur') }}'"
                class="cursor-pointer rounded-2xl p-8
                       bg-white/5 border border-white/10
                       hover:bg-white/10 hover:scale-105
                       transition duration-300">

                <h3 class="text-xl font-bold mb-2 text-cyan-400">
                    Struktur Organisasi
                </h3>
            </div>

            <!-- AKREDITASI -->
            <div
                onclick="location.href='{{ url('/tentang/akreditasi') }}'"
                class="cursor-pointer rounded-2xl p-8
                       bg-white/5 border border-white/10
                       hover:bg-white/10 hover:scale-105
                       transition duration-300">

                <h3 class="text-xl font-bold mb-2 text-emerald-400">
                    Akreditasi
                </h3>
            </div>

        </div>

    </div>
</section>

<!-- ================= ANIMATION ================= -->
<style>
@keyframes lineGrow {
    from { width: 0; opacity: 0; }
    to { width: 100%; opacity: 1; }
}
.animate-line {
    animation: lineGrow 1.2s ease-out forwards;
}
</style>

@endsection
