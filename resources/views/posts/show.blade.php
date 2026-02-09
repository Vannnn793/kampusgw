@extends('layout.main')

@section('title', $post->title)

@section('content')

{{-- ================= HERO SECTION (ARTICLE HEADER) ================= --}}
<div class="relative py-20 md:py-32 lg:py-40 overflow-hidden min-h-[500px] flex items-center">
    
    {{-- 1. Background Image (Blurred & Darkened) --}}
    <div class="absolute inset-0">
        @if($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                 class="w-full h-full object-cover blur-sm scale-110 opacity-50"
                 alt="Background">
        @else
            <img src="{{ asset('storage/images/default-news-cover.jpg') }}" 
                 class="w-full h-full object-cover opacity-50"
                 onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop'">
        @endif
        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/80 mix-blend-multiply"></div>
    </div>

    {{-- 2. Hero Content --}}
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
        
        {{-- Back Button (Mobile Only) --}}
        <a href="/posts" class="inline-flex md:hidden items-center gap-2 text-sky-200 mb-6 text-sm font-bold hover:text-white transition-colors">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        {{-- Category Badge --}}
        <div class="flex justify-center mb-6">
            <span class="px-5 py-2 bg-sky-500/20 border border-sky-400/30 backdrop-blur-md text-sky-100 text-xs font-black uppercase tracking-widest rounded-full shadow-lg">
                {{ $post->category->name }}
            </span>
        </div>

        {{-- Title --}}
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-8 leading-tight drop-shadow-lg">
            {{ $post->title }}
        </h1>

        {{-- Meta Data --}}
        <div class="flex flex-wrap items-center justify-center gap-6 text-slate-300 text-sm font-medium uppercase tracking-wider">
            <div class="flex items-center gap-2">
                <i class="bi bi-calendar-event text-sky-400"></i>
                {{ $post->created_at->translatedFormat('d F Y') }}
            </div>
            <span class="hidden md:inline w-1.5 h-1.5 rounded-full bg-slate-500"></span>
            <div class="flex items-center gap-2">
                <i class="bi bi-clock text-sky-400"></i>
                {{ $post->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</div>

{{-- ================= CONTENT WRAPPER ================= --}}
<section class="bg-slate-50 relative z-20 -mt-20 rounded-t-[3rem] min-h-screen">
    
    {{-- Decorative Top Line --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-16 pb-24">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            {{-- ================= KOLOM UTAMA: ARTIKEL ================= --}}
            <div class="lg:col-span-8">
                
                <div class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-xl shadow-sky-900/5 border border-slate-100">
                    
                    {{-- Tombol Kembali (Desktop) --}}
                    <a href="/posts" class="hidden md:inline-flex items-center gap-2 text-slate-400 text-sm font-bold hover:text-sky-600 transition-colors mb-8 group">
                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-sky-50 transition-colors">
                            <i class="bi bi-arrow-left"></i>
                        </div>
                        Kembali ke Warta Kampus
                    </a>

                    {{-- Featured Image (Clear) --}}
                    @if($post->thumbnail)
                        <div class="rounded-3xl overflow-hidden shadow-lg mb-10 group relative">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                 class="w-full h-auto object-cover transform transition-transform duration-1000 group-hover:scale-105"
                                 alt="{{ $post->title }}">
                        </div>
                    @endif

                    {{-- Article Content --}}
                    {{-- Menggunakan typography styling manual agar rapi --}}
                    <article class="prose prose-slate prose-lg max-w-none 
                                    prose-headings:font-bold prose-headings:text-slate-800 
                                    prose-p:text-slate-600 prose-p:leading-8 prose-p:mb-6
                                    prose-a:text-sky-600 prose-a:no-underline hover:prose-a:underline
                                    prose-img:rounded-2xl prose-img:shadow-md">
                        {!! $post->content !!}
                    </article>

                    {{-- Share / Footer Article (Optional) --}}
                    <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-slate-400 text-sm font-bold uppercase tracking-wider">Bagikan:</span>
                        <div class="flex gap-3">
                            <button class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 hover:bg-blue-600 hover:text-white transition-all flex items-center justify-center">
                                <i class="bi bi-facebook"></i>
                            </button>
                            <button class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 hover:bg-sky-500 hover:text-white transition-all flex items-center justify-center">
                                <i class="bi bi-twitter-x"></i>
                            </button>
                            <button class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 hover:bg-green-600 hover:text-white transition-all flex items-center justify-center">
                                <i class="bi bi-whatsapp"></i>
                            </button>
                        </div>
                    </div>

                </div>

                {{-- ================= RELATED NEWS ================= --}}
                @php $latest_posts = $latest_posts ?? collect(); @endphp
                @if($latest_posts->count() > 0)
                <div class="mt-12">
                    <h3 class="text-xl font-black text-slate-800 mb-8 flex items-center gap-3">
                        <span class="w-2 h-8 bg-sky-500 rounded-full"></span>
                        Berita Lainnya
                    </h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach($latest_posts as $latest)
                            @if($latest->id != $post->id)
                            <a href="/posts/{{ $latest->slug }}" class="group bg-white p-5 rounded-[2rem] border border-slate-100 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex gap-4 items-center">
                                <div class="w-20 h-20 shrink-0 rounded-2xl overflow-hidden relative">
                                    <img src="{{ $latest->thumbnail ? asset('storage/' . $latest->thumbnail) : asset('storage/images/default.jpg') }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800 group-hover:text-sky-600 transition line-clamp-2 leading-snug mb-2">
                                        {{ $latest->title }}
                                    </h4>
                                    <div class="flex items-center gap-2 text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                                        <i class="bi bi-calendar"></i>
                                        {{ $latest->created_at->translatedFormat('d M') }}
                                    </div>
                                </div>
                            </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            {{-- ================= SIDEBAR (SAME AS INDEX) ================= --}}
            <aside class="lg:col-span-4 space-y-8">
                
                {{-- 1. Widget Cari --}}
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-sky-900/5 border border-slate-100">
                    <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-widest flex items-center gap-2">
                        <i class="bi bi-search text-sky-500"></i> Cari Berita
                    </h3>
                    <form action="/posts" method="GET" class="relative group">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..." 
                               class="w-full pl-6 pr-14 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm focus:ring-2 focus:ring-sky-500 focus:bg-white transition-all outline-none text-slate-600 font-medium">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 bg-white rounded-xl shadow-sm text-sky-600 flex items-center justify-center hover:bg-sky-500 hover:text-white transition-all">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>
                </div>

                {{-- 2. Widget Kategori --}}
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-sky-900/5 border border-slate-100">
                    <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-widest flex items-center gap-2">
                        <i class="bi bi-tags-fill text-sky-500"></i> Kategori
                    </h3>
                    <div class="space-y-3">
                        @foreach($categories as $cat)
                            <a href="/posts?category={{ $cat->slug }}" 
                               class="group flex items-center justify-between p-4 rounded-2xl border border-slate-50 transition-all duration-300 hover:bg-sky-50 hover:border-sky-100">
                                <span class="font-bold text-sm text-slate-600 group-hover:text-sky-600 transition-colors">{{ $cat->name }}</span>
                                <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-400 text-[10px] font-bold group-hover:bg-sky-200 group-hover:text-sky-700 transition-colors">
                                    {{ $cat->posts_count ?? 0 }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- 3. CTA PMB --}}
                <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl shadow-sky-500/20 group bg-sky-600">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20"></div>
                    <div class="relative z-10 p-10 text-center">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl backdrop-blur-sm flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <h3 class="text-white font-black text-xl mb-2">Ingin Kuliah Disini?</h3>
                        <p class="text-sky-100 text-sm mb-6 font-light">Cek info pendaftaran terbaru.</p>
                        <a href="/pmb" class="inline-block bg-white text-sky-600 px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest shadow-lg hover:bg-sky-50 hover:scale-105 transition-all">
                            Info PMB
                        </a>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</section>

@endsection