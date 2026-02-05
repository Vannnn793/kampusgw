@extends('layout.main')

@section('title', 'Berita & Info Kampus')

@section('content')
<div class="bg-slate-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Header Page --}}
        <div class="mb-12">
            <h1 class="text-4xl font-black text-slate-800 mb-2">Warta Kampus</h1>
            <p class="text-slate-500 font-medium">Update terkini seputar kegiatan dan prestasi akademik.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            {{-- KOLOM UTAMA: LIST BERITA --}}
            <article class="lg:col-span-8 space-y-8">
                @forelse($posts as $post)
                    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group border border-slate-100 flex flex-col md:flex-row">
                        
                        {{-- Thumbnail --}}
                        <div class="md:w-2/5 overflow-hidden relative">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" 
                                     class="h-64 md:h-full w-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="h-64 md:h-full w-full bg-slate-200 flex items-center justify-center italic text-slate-400">No Image</div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-sky-600 text-[10px] font-black uppercase rounded-full shadow-sm">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                        </div>

                        {{-- Konten --}}
                        <div class="p-8 md:w-3/5 flex flex-col justify-between">
                            <div>
                                <div class="text-slate-400 text-xs font-bold mb-3 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $post->created_at->translatedFormat('d F Y') }}
                                </div>
                                <h2 class="text-2xl font-extrabold text-slate-800 mb-4 group-hover:text-sky-600 transition-colors leading-tight">
                                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                                </h2>
                                <div class="text-slate-500 text-sm line-clamp-3 mb-6 leading-relaxed">
                                    {{ Str::limit(strip_tags($post->content), 150) }}
                                </div>
                            </div>

                            <a href="/posts/{{ $post->slug }}" class="inline-flex items-center gap-2 text-sky-600 font-black text-sm group/btn uppercase tracking-widest">
                                BACA SELENGKAPNYA 
                                <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-[2.5rem] p-20 text-center border-2 border-dashed border-slate-200">
                        <h3 class="text-xl font-bold text-slate-400">Belum ada berita tersedia.</h3>
                    </div>
                @endforelse

                {{-- Pagination --}}
                <div class="pt-6">
                    {{ $posts->links() }}
                </div>
            </article>

            {{-- SIDEBAR: CATEGORY COUNT --}}
            <aside class="lg:col-span-4 space-y-8">
                {{-- Widget Cari --}}
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                    <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-[0.2em]">Cari Berita</h3>
                    <form action="/posts" method="GET" class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..." 
                               class="w-full pl-5 pr-12 py-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-sky-500 transition">
                        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-sky-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </button>
                    </form>
                </div>

                {{-- Widget Kategori dengan Hitungan --}}
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                    <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-[0.2em]">Kategori</h3>
                    <div class="space-y-2">
                        @foreach($categories as $cat)
                            <a href="/posts?category={{ $cat->slug }}" 
                            class="flex items-center justify-between px-4 py-3 rounded-xl transition group {{ request('category') == $cat->slug ? 'bg-sky-600 text-white' : 'hover:bg-sky-50 text-slate-600 hover:text-sky-600' }}">
                                <span class="font-bold text-sm">{{ $cat->name }}</span>
                                
                                {{-- Badge dengan animasi counter --}}
                                <span 
                                    x-data="{ count: 0, target: {{ $cat->posts_count }} }"
                                    x-init="let interval = setInterval(() => { if (count < target) { count++ } else { clearInterval(interval) } }, 50)"
                                    class="text-[10px] px-2 py-1 rounded-md transition {{ request('category') == $cat->slug ? 'bg-sky-500 text-white' : 'bg-slate-100 text-slate-500 group-hover:bg-sky-200' }}"
                                >
                                    <span x-text="count">0</span> Berita
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Widget Berita Terbaru --}}
                @if(isset($latest_posts))
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                    <h3 class="text-sm font-black text-slate-800 mb-8 uppercase tracking-[0.2em]">Terbaru</h3>
                    <div class="space-y-6">
                        @foreach($latest_posts as $latest)
                            <a href="/posts/{{ $latest->slug }}" class="flex gap-4 group">
                                <div class="w-16 h-16 shrink-0 rounded-2xl overflow-hidden shadow-sm">
                                    <img src="{{ asset('storage/' . $latest->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4 class="text-[13px] font-bold text-slate-800 group-hover:text-sky-600 transition line-clamp-2 leading-snug">
                                        {{ $latest->title }}
                                    </h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="bg-sky-600 p-8 rounded-[2rem] shadow-xl shadow-sky-100 relative overflow-hidden group">
                    <div class="relative z-10">
                        <h3 class="text-white font-black text-xl mb-2">Mau Jadi Mahasiswa?</h3>
                        <p class="text-sky-100 text-sm mb-6">Dapatkan info pendaftaran terbaru sekarang juga!</p>
                        <a href="/pmb" class="inline-block bg-white text-sky-600 px-6 py-3 rounded-xl font-black text-xs uppercase tracking-widest shadow-lg">Info PMB</a>
                    </div>
                    <svg class="absolute -right-10 -bottom-10 w-40 h-40 text-sky-500/50 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.45l8.15 14.1H3.85L12 5.45z"/></svg>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection