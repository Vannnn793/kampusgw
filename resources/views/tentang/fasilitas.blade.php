@extends('layout.main')

@section('title', 'Fasilitas')

@section('content')

<section class="min-h-screen bg-[#f8fafc] py-20">
    <div class="max-w-7xl mx-auto px-6">

        {{-- ================= JUDUL ================= --}}
        <div class="text-center mb-16 animate-title">
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

        {{-- ================= LIST FASILITAS ================= --}}
        <div class="space-y-24">

            @forelse($facilities as $facility)
                <div class="facility-item flex flex-col md:flex-row items-center gap-12
                            {{ $loop->iteration % 2 == 0 ? 'md:flex-row-reverse' : '' }}">

                    {{-- FOTO --}}
                    <div class="md:w-1/2 facility-image">
                        <img
                            src="{{ asset('storage/' . $facility->image) }}"
                            alt="{{ $facility->name }}"
                            class="w-full h-[340px] md:h-[380px]
                                   object-cover rounded-2xl shadow-xl"
                        >
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="md:w-1/2 facility-text">
                        <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-4">
                            {{ $facility->name }}
                        </h2>

                        <p class="text-slate-600 leading-relaxed mb-6 text-lg">
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

{{-- ================= CSS ANIMATION ================= --}}
<style>
/* JUDUL */
.animate-title {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
}
.animate-title.show {
    opacity: 1;
    transform: translateY(0);
}

/* ITEM */
.facility-image,
.facility-text {
    opacity: 0;
    transition: all 0.9s ease;
}

/* FOTO MASUK DARI SAMPING */
.md\:flex-row .facility-image {
    transform: translateX(-80px);
}

.md\:flex-row-reverse .facility-image {
    transform: translateX(80px);
}

/* TEKS MASUK DARI BAWAH */
.facility-text {
    transform: translateY(50px);
}

/* AKTIF */
.facility-item.show .facility-image,
.facility-item.show .facility-text {
    opacity: 1;
    transform: translate(0, 0);
}
</style>

{{-- ================= SCRIPT ANIMATION ================= --}}
<script>
document.addEventListener("DOMContentLoaded", () => {

    const title = document.querySelector(".animate-title");
    const items = document.querySelectorAll(".facility-item");

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        },
        { threshold: 0.25 }
    );

    if (title) observer.observe(title);
    items.forEach(item => observer.observe(item));

});
</script>

@endsection
