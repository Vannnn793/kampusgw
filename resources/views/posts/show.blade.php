@extends('layout.main')

@section('title', $post->title)

@section('content')
@php 
    $latest_posts = $latest_posts ?? collect(); 
@endphp

<div class="bg-slate-50 min-h-screen py-14">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12">

        {{-- ================= MAIN CONTENT ================= --}}
        <div class="lg:col-span-8">

            {{-- Back --}}
            <a href="/posts" class="text-sky-600 text-sm font-semibold mb-6 inline-block hover:underline">
                ← Kembali ke Warta Kampus
            </a>

            {{-- Judul --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-snug mb-3">
                {{ $post->title }}
            </h1>

            {{-- Meta --}}
            <div class="text-slate-500 text-sm mb-8">
                {{ $post->created_at->translatedFormat('d F Y') }}
                <span class="mx-2">•</span>
                <span class="text-sky-600 font-semibold">{{ $post->category->name }}</span>
            </div>

            {{-- FOTO BESAR UTUH --}}
            @if($post->thumbnail)
            <div class="mb-10 flex justify-center">
                <img src="{{ asset('storage/' . $post->thumbnail) }}"
                     class="max-h-[550px] w-auto object-contain">
            </div>
            @endif

            {{-- ISI ARTIKEL --}}
            <article class="text-slate-700 leading-8 text-justify space-y-5 text-[17px]">
                {!! $post->content !!}
            </article>

            <div class="my-16 border-t border-slate-200"></div>

            {{-- Berita lainnya --}}
            @if($latest_posts->count())
            <div>
                <h3 class="text-lg font-bold text-slate-800 mb-6">Berita Lainnya</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($latest_posts as $latest)
                        @if($latest->id != $post->id)
                        <a href="/posts/{{ $latest->slug }}"
                           class="flex gap-4 items-center bg-white p-4 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition group">

                            <div class="w-16 h-16 overflow-hidden shrink-0">
                                <img src="{{ asset('storage/' . $latest->thumbnail) }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            </div>

                            <div class="flex-1">
                                <h4 class="font-semibold text-slate-800 group-hover:text-sky-600 transition line-clamp-2">
                                    {{ $latest->title }}
                                </h4>
                                <p class="text-xs text-slate-400 mt-1">
                                    {{ $latest->created_at->translatedFormat('d M Y') }}
                                </p>
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif

        </div>

        {{-- ================= SIDEBAR ================= --}}
        <aside class="lg:col-span-4 space-y-8">

            {{-- Cari --}}
            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-[0.2em]">Cari Berita</h3>
                <form action="/posts" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..." 
                        class="w-full pl-5 pr-12 py-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-sky-500 transition">
                </form>
            </div>

            {{-- Kategori --}}
            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-[0.2em]">Kategori</h3>
                <div class="space-y-2">
                    @foreach($categories as $cat)
                        <a href="/posts?category={{ $cat->slug }}" 
                        class="flex justify-between px-4 py-3 rounded-xl hover:bg-sky-50 text-slate-600 hover:text-sky-600">
                            <span class="font-bold text-sm">{{ $cat->name }}</span>
                            <span class="text-xs text-slate-400">{{ $cat->posts_count ?? 0 }} Berita</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- PMB --}}
            <div class="bg-sky-600 p-8 rounded-[2rem] shadow-xl text-white">
                <h3 class="font-black text-xl mb-2">Mau Jadi Mahasiswa?</h3>
                <p class="text-sky-100 text-sm mb-6">Dapatkan info pendaftaran terbaru sekarang juga!</p>
                <a href="/pmb" class="inline-block bg-white text-sky-600 px-6 py-3 rounded-xl font-black text-xs uppercase tracking-widest shadow-lg">Info PMB</a>
            </div>

        </aside>

    </div>
</div>
@endsection
