<nav x-data="{ mobileMenuOpen: false }" class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-slate-200 transition-all">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

        <a href="/" class="flex items-center gap-3 group">
            {{-- Pastikan $profile dikirim dari Controller/AppServiceProvider --}}
            @if(isset($profile) && $profile->logo)
                <img src="{{ asset('storage/'.$profile->logo) }}" 
                     alt="Logo Kampus" 
                     class="h-10 w-auto object-contain group-hover:scale-105 transition-transform">
            @else
                <div class="h-10 w-10 bg-sky-100 rounded-full flex items-center justify-center text-sky-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
            @endif

            <div class="flex flex-col">
                <span class="text-xl font-extrabold text-sky-600 tracking-wide leading-none">
                    {{ $profile->name ?? 'KampusGW' }}
                </span>
                <span class="text-[10px] font-bold text-slate-400 tracking-widest uppercase mt-0.5">
                    University Profile
                </span>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-1 text-sm font-bold text-slate-600">
            
            {{-- Link Home --}}
            <a href="/" class="px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition-all duration-300">
                Home
            </a>

            {{-- Dropdown: Tentang Kami --}}
            <div class="relative group h-14 flex items-center">
                <button class="flex items-center gap-1 px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition-all duration-300 focus:outline-none group-hover:bg-sky-50 group-hover:text-sky-600">
                    Tentang Kami
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                {{-- Dropdown Box --}}
                <ul class="absolute top-full left-0 w-60 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top translate-y-2 group-hover:translate-y-0 p-2 z-50">
                    <li><a href="/tentang/sejarah" class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition">Sejarah Singkat</a></li>
                    <li><a href="/tentang/struktur" class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition">Struktur Organisasi</a></li>
                    <li><a href="/tentang/akreditasi" class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition">Akreditasi</a></li>

             {{-- Nested Menu: Fasilitas --}}
            <li class="relative group/sub">

                <div class="flex justify-between items-center px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white cursor-pointer transition">
                    Fasilitas
                    <svg class="w-4 h-4 -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>

                <ul class="absolute top-0 left-full w-60 bg-white border border-slate-100
                        rounded-xl shadow-xl opacity-0 invisible
                        group-hover/sub:opacity-100 group-hover/sub:visible
                        transition-all ml-2 p-2">

                    {{-- ================= FASILITAS KAMPUS ================= --}}
                    <li class="px-3 py-2 text-xs font-bold uppercase text-slate-400">
                        Fasilitas Kampus

                    </li>

                    <li>
                        <a href="{{ route('tentang.fasilitas.umum') }}"
                        class="block px-4 py-2 rounded-lg font-semibold
                                bg-sky-600 text-white hover:bg-sky-700 transition">
                            Lihat Semua
                        </a>
                    </li>

                    <li class="border-t my-2"></li>

                        {{-- ================= FASILITAS JURUSAN ================= --}}
                        <li class="px-3 py-2 text-xs font-bold uppercase text-slate-400">
                            Fasilitas Jurusan
                        </li>

                        @foreach($faculties as $faculty)
                            <li>
                                <a href="{{ route('tentang.fasilitas.faculty', $faculty->slug) }}"
                                class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition">
                                    {{ $faculty->name }}
                                </a>
                            </li>
                        @endforeach

                    </ul>

                </li>

                                    
                </ul>
            </div>

        {{-- Dropdown: Faculties --}}
<div class="relative group h-14 flex items-center">
    <button class="flex items-center gap-1 px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition-all duration-300 focus:outline-none group-hover:bg-sky-50 group-hover:text-sky-600">
        Faculties
        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    {{-- MAIN DROPDOWN --}}
    <ul class="absolute top-full mt-2 left-0 w-64 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top translate-y-2 group-hover:translate-y-0 p-2 z-50">
        @foreach($faculties as $faculty)
            <li class="relative group/prodi">
                <div class="flex justify-between items-center px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white cursor-pointer transition">
                    {{ $faculty->name }}
                    <svg class="w-4 h-4 -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>

                {{-- NESTED PRODI DROPDOWN --}}
                <ul class="absolute top-0 left-full ml-3 w-64 bg-white border border-slate-100 rounded-xl shadow-xl opacity-0 invisible group-hover/prodi:opacity-100 group-hover/prodi:visible transition-all p-2 max-h-80 overflow-y-auto">
                    @forelse($faculty->prodis as $prodi)
                        <li>
                            <a href="{{ route('faculties.prodis.show', [$faculty->slug, $prodi->slug]) }}"
                               class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition">
                                {{ $prodi->name }}
                            </a>
                        </li>
                    @empty
                        <li class="px-4 py-2 text-slate-400 text-xs italic">Belum ada prodi</li>
                    @endforelse
                </ul>
            </li>
        @endforeach
    </ul>
</div>


            <a href="/admissions" class="px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition-all duration-300">Admissions</a>
            <a href="/careers" class="px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition-all duration-300">Careers</a>
        </div>

        <div class="flex items-center gap-4">
            <a href="/admissions" class="hidden md:inline-block px-6 py-2.5 bg-sky-600 text-white rounded-full font-bold hover:bg-sky-700 hover:shadow-lg hover:shadow-sky-200 transition transform hover:-translate-y-0.5">
                Daftar Sekarang
            </a>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-slate-700 focus:outline-none p-2 rounded-lg hover:bg-slate-100">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <div x-show="mobileMenuOpen" x-collapse class="md:hidden bg-white border-t border-slate-100 shadow-xl max-h-[85vh] overflow-y-auto">
        <div class="flex flex-col p-4 space-y-2 font-semibold text-slate-700">
            <a href="/" class="block px-4 py-3 rounded-lg hover:bg-sky-50 hover:text-sky-600">Home</a>
            
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 rounded-lg hover:bg-sky-50 hover:text-sky-600">
                    Tentang Kami
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" class="pl-4 space-y-1 mt-1 bg-slate-50 rounded-lg p-2">
                    <a href="/tentang/sejarah" class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white text-sm">Sejarah</a>
                    <a href="/tentang/struktur" class="block px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white text-sm">Struktur</a>
                </div>
            </div>

             <a href="/admissions" class="block w-full text-center px-4 py-3 bg-sky-600 text-white rounded-lg font-bold mt-4 shadow-md">
                Daftar Sekarang
            </a>
        </div>
    </div>
</nav>
<div class="h-20"></div>