<nav x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

        <a href="/" class="flex items-center gap-3 group">
            @if(isset($profile) && $profile->logo_path)
                <img src="{{ asset('storage/'.$profile->logo_path) }}" 
                     alt="Logo" 
                     class="h-10 w-auto object-contain group-hover:scale-105 transition-transform">
            @else
                <div class="h-10 w-10 bg-sky-100 rounded-xl flex items-center justify-center text-sky-600 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
            @endif

            <div class="flex flex-col">
                <span class="text-xl font-black text-sky-600 tracking-tight leading-none uppercase">
                    {{ $profile->campus_name ?? 'KampusGW' }}
                </span>
                <span class="text-[10px] font-bold text-slate-400 tracking-[0.2em] uppercase mt-1">
                    University Profile
                </span>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-1 text-sm font-bold text-slate-600">
            <a href="/" class="px-4 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600 transition">Home</a>

            <div class="relative group h-20 flex items-center">
                <button class="flex items-center gap-1 px-4 py-2 rounded-lg group-hover:bg-sky-50 group-hover:text-sky-600 transition focus:outline-none">
                    Tentang Kami
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <ul class="absolute top-full left-0 w-64 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top translate-y-2 group-hover:translate-y-0 p-2 z-50">
                    <li><a href="/tentang/sejarah" class="block px-4 py-2.5 rounded-xl hover:bg-sky-600 hover:text-white transition">Sejarah Singkat</a></li>
                    <li><a href="/tentang/struktur" class="block px-4 py-2.5 rounded-xl hover:bg-sky-600 hover:text-white transition">Struktur Organisasi</a></li>
                    <li><a href="/tentang/akreditasi" class="block px-4 py-2.5 rounded-xl hover:bg-sky-600 hover:text-white transition">Akreditasi</a></li>
                    <li class="border-t border-slate-50 my-2"><a href="/tentang/sambutan" class="block px-4 py-2.5 rounded-xl hover:bg-sky-600 hover:text-white transition">Sambutan Rektor</a></li>
                    
                    <li class="relative group/sub">
                        <div class="flex justify-between items-center px-4 py-2.5 rounded-xl hover:bg-sky-600 hover:text-white cursor-pointer transition">
                            Fasilitas
                            <svg class="w-4 h-4 -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        <ul class="absolute top-0 left-full ml-2 w-64 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover/sub:opacity-100 group-hover/sub:visible transition-all p-2">
                            <li class="px-3 py-2 text-[10px] font-black uppercase text-slate-400 tracking-widest">Fasilitas Kampus</li>
                            <li><a href="{{ route('tentang.fasilitas.umum') }}" class="block px-4 py-2 rounded-lg bg-sky-50 text-sky-600 font-bold hover:bg-sky-600 hover:text-white transition mb-2">Fasilitas Umum</a></li>
                            <li class="border-t border-slate-50 my-2"></li>
                            <li class="px-3 py-2 text-[10px] font-black uppercase text-slate-400 tracking-widest">Fasilitas Jurusan</li>
                            @foreach($faculties as $faculty)
                                <li><a href="{{ route('tentang.fasilitas.faculty', $faculty->slug) }}" class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition">{{ $faculty->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="relative group h-20 flex items-center">
                <button class="flex items-center gap-1 px-4 py-2 rounded-lg group-hover:bg-sky-50 group-hover:text-sky-600 transition focus:outline-none">
                    Akademik
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <ul class="absolute top-full left-0 w-64 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top translate-y-2 group-hover:translate-y-0 p-2 z-50">
                    @foreach($faculties as $faculty)
                        <li class="relative group/prodi">
                            <a href="{{ route('faculties.show', [$faculty->slug]) }}">
                            <div class="flex justify-between items-center px-4 py-2.5 rounded-xl hover:bg-sky-600 hover:text-white cursor-pointer transition">
                                {{ $faculty->name }}
                                <svg class="w-4 h-4 -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                            </a>
                            <ul class="absolute top-0 left-full ml-2 w-64 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover/prodi:opacity-100 group-hover/prodi:visible transition-all p-2 max-h-80 overflow-y-auto">
                                @forelse($faculty->prodis as $prodi)
                                    <li><a href="{{ route('faculties.prodis.show', [$faculty->slug, $prodi->slug]) }}" class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition text-xs">{{ $prodi->name }}</a></li>
                                @empty
                                    <li class="px-4 py-2 text-slate-400 text-xs italic">Belum ada prodi</li>
                                @endforelse
                            </ul>
                        </li>
                    @endforeach
                    <li class="relative group/prodi"> 
                        <div class="flex justify-between items-center px-4 py-2.5 rounded-xl hover:bg-sky-600 hover:text-white cursor-pointer transition">
                            <a href="{{ route('downloads.index') }}">Dokumen Akademik</a>
                        </div>
                    </li>
                </ul>
            </div>

            <a href="/pmb" class="px-4 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600 transition">Pendaftaran</a>
            <a href="/careers" class="px-4 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600 transition">Careers</a>
            {{-- Dropdown: Berita & Artikel --}}
            <div class="relative group h-20 flex items-center">
                <button class="flex items-center gap-1 px-4 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600 transition focus:outline-none group-hover:bg-sky-50 group-hover:text-sky-600">
                    Berita
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <ul class="absolute top-full left-0 w-56 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top translate-y-2 group-hover:translate-y-0 p-2 z-50">
                    <li>
                        <a href="/posts" class="block px-4 py-2.5 rounded-xl bg-sky-50 text-sky-600 font-bold hover:bg-sky-600 hover:text-white transition mb-1">
                            Semua Berita
                        </a>
                    </li>
                    <li class="border-t border-slate-50 my-1"></li>
                    
                    {{-- Looping Kategori dari Database --}}
                    @foreach($navCategories as $category)
                        <li>
                            <a href="/posts?category={{ $category->slug }}" class="block px-4 py-2.5 rounded-xl hover:bg-sky-600 hover:text-white transition">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <a href="/admissions" class="hidden md:inline-block px-7 py-3 bg-sky-600 text-white rounded-full font-bold hover:bg-sky-700 shadow-lg shadow-sky-200 transition transform hover:-translate-y-0.5">
                Daftar Sekarang
            </a>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2.5 rounded-xl bg-slate-50 text-slate-700 focus:outline-none">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <div x-show="mobileMenuOpen" 
         x-cloak
         x-collapse
         class="md:hidden bg-white border-t border-slate-100 shadow-2xl max-h-[85vh] overflow-y-auto">
        
        <div class="p-6 space-y-3">
            <a href="/" class="block px-4 py-3 rounded-xl font-bold text-slate-700 hover:bg-sky-50 hover:text-sky-600">Home</a>
            
            {{-- MOBILE: Tentang Kami --}}
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 rounded-xl font-bold text-slate-700 hover:bg-sky-50">
                    Tentang Kami
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                
                <div x-show="open" x-collapse class="pl-4 mt-2 space-y-2 bg-slate-50 rounded-2xl p-2">
                    <a href="/tentang/sejarah" class="block px-4 py-2 text-sm font-semibold text-slate-600 hover:text-sky-600">Sejarah Singkat</a>
                    <a href="/tentang/struktur" class="block px-4 py-2 text-sm font-semibold text-slate-600 hover:text-sky-600">Struktur Organisasi</a>
                    <a href="/tentang/akreditasi" class="block px-4 py-2 text-sm font-semibold text-slate-600 hover:text-sky-600">Akreditasi</a>

                    {{-- NESTED MOBILE: Fasilitas --}}
                    <div x-data="{ openFas: false }" class="border-t border-slate-200/50 pt-2">
                        <button @click="openFas = !openFas" class="flex items-center justify-between w-full px-4 py-2 text-sm font-bold text-sky-600">
                            Fasilitas
                            <svg :class="{'rotate-180': openFas}" class="w-3 h-3 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        
                        <div x-show="openFas" x-collapse class="pl-4 mt-1 space-y-1">
                            {{-- Fasilitas Umum --}}
                            <a href="{{ route('tentang.fasilitas.umum') }}" class="block px-4 py-2 text-xs font-black bg-sky-600 text-white rounded-lg text-center shadow-sm">
                                Lihat Fasilitas Umum
                            </a>

                            <div class="py-2 text-[10px] font-black text-slate-400 uppercase tracking-widest pl-2">Per Jurusan:</div>
                            
                            {{-- Looping Fasilitas per Fakultas --}}
                            @foreach($faculties as $faculty)
                                <a href="{{ route('tentang.fasilitas.faculty', $faculty->slug) }}" class="block px-4 py-1.5 text-xs text-slate-500 hover:text-sky-600 border-l-2 border-slate-200 ml-2">
                                    {{ $faculty->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div x-data="{ openFac: false }">
                <button @click="openFac = !openFac" class="flex items-center justify-between w-full px-4 py-3 rounded-xl font-bold text-slate-700 hover:bg-sky-50">
                    Akademik
                    <svg :class="{'rotate-180': openFac}" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openFac" x-collapse class="pl-4 mt-2 space-y-1 bg-slate-50 rounded-2xl p-2">
                    @foreach($faculties as $faculty)
                        <div x-data="{ openProdi: false }" class="mb-1">
                            <button @click="openProdi = !openProdi" class="flex items-center justify-between w-full px-4 py-2 text-sm font-bold text-slate-600">
                                {{ $faculty->name }}
                                <svg :class="{'rotate-180': openProdi}" class="w-3 h-3 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="openProdi" x-collapse class="pl-4 ml-2 border-l-2 border-sky-200 space-y-1 mt-1">
                                @foreach($faculty->prodis as $prodi)
                                    <a href="{{ route('faculties.prodis.show', [$faculty->slug, $prodi->slug]) }}" class="block px-4 py-1.5 text-xs text-slate-500 font-medium hover:text-sky-600">{{ $prodi->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-bold text-slate-600">
                        <a href="{{ route('downloads.index') }}">Dokumen Akademik</a>
                    </button>
                </div>
            </div>

            <a href="/pmb" class="block px-4 py-3 rounded-xl font-bold text-slate-700 hover:bg-sky-50 hover:text-sky-600">Admissions</a>
            <a href="/careers" class="block px-4 py-3 rounded-xl font-bold text-slate-700 hover:bg-sky-50 hover:text-sky-600">Careers</a>
            <div x-data="{ openNews: false }">
                <button @click="openNews = !openNews" class="flex items-center justify-between w-full px-4 py-3 rounded-xl font-bold text-slate-700 hover:bg-sky-50 mt-3">
                    Berita
                    <svg :class="{'rotate-180': openNews}" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                
                <div x-show="openNews" x-collapse class="pl-4 mt-2 space-y-2 bg-slate-50 rounded-2xl p-2">
                    <a href="/posts" class="block px-4 py-2 text-sm font-black bg-sky-600 text-white rounded-lg text-center shadow-sm">
                        Semua Berita
                    </a>
                    {{-- Looping Kategori dari Database --}}
                    @foreach($navCategories as $category)
                        <a href="/posts?category={{ $category->slug }}" class="block px-4 py-2 text-sm font-semibold text-slate-600 hover:text-sky-600">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <a href="/admissions" class="block w-full text-center px-4 py-4 bg-sky-600 text-white rounded-2xl font-black uppercase tracking-widest mt-6 shadow-xl shadow-sky-100">
                Daftar Sekarang
            </a>
        </div>
    </div>
</nav>

<div class="h-20"></div>

<style>
    [x-cloak] { display: none !important; }
</style>