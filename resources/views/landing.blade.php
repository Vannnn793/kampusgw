@extends('layout.main')
@section('title','Home')

@section('content')

{{-- ================= HERO ================= --}}
<section class="min-h-screen flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight">
                Kampus Teknologi<br>
                <span class="text-sky-400">Pencetak Talenta Global</span>
            </h1>

            <p class="mt-6 text-lg text-slate-300 max-w-xl">
                Kurikulum berbasis industri, dosen praktisi,
                dan ekosistem inovasi yang relevan dengan dunia kerja modern.
            </p>

            <div class="mt-10 flex gap-4">
                <a href="/admissions"
                   class="px-8 py-4 bg-sky-400 text-slate-900 rounded-xl font-bold hover:scale-105 transition">
                    Daftar Sekarang
                </a>

                <a href="/faculties"
                   class="px-8 py-4 border border-white/20 rounded-xl hover:bg-white/10 transition">
                    Jelajahi Kampus
                </a>
            </div>
        </div>

        <div>
            <img src="https://media.quipper.com/media/W1siZiIsIjIwMjMvMDYvMDYvMTAvMDIvNTcvZWIxNzNjNTktODFjOS00N2Q4LTgxNDEtNDBjNDlhZjY3MDRkLyJdLFsicCIsInRodW1iIiwiMTIwMHhcdTAwM2UiLHt9XSxbInAiLCJjb252ZXJ0IiwiLWNvbG9yc3BhY2Ugc1JHQiAtc3RyaXAiLHsiZm9ybWF0IjoianBnIn1dXQ.jpg"
                 class="w-full rounded-2xl shadow-2xl">
        </div>

    </div>
</section>

{{-- ================= BERITA ================= --}}
<section id="berita-kampus" class="py-24 bg-purple-50 text-slate-900min-h-screen flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-extrabold mb-10 border-l-4 border-sky-500 pl-4">
            Berita & Update Kampus
        </h2>

        <div class="grid lg:grid-cols-2 gap-10">

            {{-- BERITA UTAMA --}}
            @if($posts->count())
            <div class="relative rounded-2xl overflow-hidden shadow-xl">
                <img src="{{ asset('storage/'.$posts[0]->thumbnail) }}"
                     class="w-full h-full object-cover brightness-75">

                <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                    <span class="inline-block bg-sky-500 text-sm px-3 py-1 rounded-full w-fit mb-3">
                        Berita Utama
                    </span>
                    <h3 class="text-2xl font-bold">
                        {{ $posts[0]->title }}
                    </h3>
                    <p class="text-sm opacity-80 mt-1">
                        {{ $posts[0]->created_at->format('d M Y') }}
                    </p>
                    <button
                        onclick="openPost('{{ $posts[0]->slug }}')"
                        class="mt-4 inline-block bg-white text-sky-900 px-5 py-2 rounded-lg font-semibold">
                        Baca Selengkapnya
                    </button>

                </div>
            </div>
            @endif

            {{-- LIST BERITA --}}
            <div class="flex flex-col gap-4">
                @foreach($posts->skip(1) as $post)
                <div class="flex gap-4 items-center bg-slate-50 p-4 rounded-xl hover:shadow transition">
                    <img src="{{ asset('storage/'.$post->thumbnail) }}"
                         class="w-24 h-20 object-cover rounded-lg">

                    <div>
                        <p class="text-sm text-slate-500">
                            {{ $post->created_at->format('d M Y') }}
                        </p>
                        <h4 class="font-semibold text-slate-800 leading-snug">
                            {{ Str::limit($post->title, 55) }}
                        </h4>
                        <button
                            onclick="openPost('{{ $posts[1]->slug }}')"
                            class="mt-4 inline-block bg-white text-sky-500 text-sm font-semibold">
                            Baca Selengkapnya
                        </button>

                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

<section id="post-detail"
         class="py-24 bg-purple-50 text-slate-900min-h-screen flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
         <div class="max-w-7xl mx-auto px-6">
    <div class="relative rounded-2xl overflow-hidden shadow-xl">

        <img id="detail-thumb"
             class="img-fluid rounded mb-4 w-100"
             style="max-height:420px; object-fit:cover">

        <h1 id="detail-title" class="text-2xl font-bold"></h1>
        <p id="detail-date" class="text-sm opacity-80 mt-1"></p>

        <article id="detail-content"
                 class="fs-5 lh-lg">
        </article>

    </div>
</div>
</section>



{{-- ================= FAKULTAS ================= --}}
<section class="py-28 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold">
                Fakultas Unggulan
            </h2>
            <p class="mt-4 text-slate-400">
                Dirancang untuk kebutuhan industri masa depan.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($faculties as $faculty)
            <div class="rounded-2xl p-8 bg-white/5 border border-white/10
                        hover:bg-white/10 hover:scale-105 transition">
                <h3 class="text-xl font-bold mb-3">
                    {{ $faculty->name }}
                </h3>
                <p class="text-slate-300 text-sm">
                    {{ $faculty->description ?? 'Program unggulan berbasis teknologi dan industri.' }}
                </p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ================= CTA ================= --}}
<section class="py-28 bg-gradient-to-br from-sky-500 via-indigo-500 to-purple-600 text-slate-900">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <h2 class="text-4xl md:text-5xl font-extrabold">
            Masa Depan Tidak Menunggu
        </h2>

        <p class="mt-6 text-lg">
            Bergabunglah dengan kampus yang menyiapkanmu
            untuk dunia kerja nyata, bukan sekadar teori.
        </p>

        <div class="mt-10 flex justify-center gap-6">
            <a href="/admissions"
               class="px-10 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:scale-105 transition">
                Daftar Sekarang
            </a>
            <a href="/faculties"
               class="px-10 py-4 border-2 border-slate-900 rounded-2xl font-bold hover:bg-slate-900 hover:text-white transition">
                Lihat Fakultas
            </a>
        </div>

    </div>
</section>

<script>
function openPost(slug) {
    fetch(`/posts/${slug}`)
        .then(res => res.json())
        .then(post => {

            document.getElementById('detail-thumb').src =
                `/storage/${post.thumbnail}`;

            document.getElementById('detail-title').innerText =
                post.title;

            document.getElementById('detail-date').innerText =
                new Date(post.created_at).toLocaleDateString('id-ID');

            document.getElementById('detail-content').innerHTML =
                post.content;

            const section = document.getElementById('post-detail');
            section.classList.remove('d-none');

            section.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
}

function closePost() {
    document.getElementById('post-detail').classList.add('d-none');

    document.querySelector('#berita-kampus')
        ?.scrollIntoView({ behavior: 'smooth' });
}
</script>


@endsection
