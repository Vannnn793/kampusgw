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

                    <ul class="absolute left-0 mt-3 w-60 bg-[#1f4e8c] text-white rounded-xl shadow-xl
                               opacity-0 invisible group-hover:opacity-100 group-hover:visible
                               transition-all duration-300 z-50">

                        <li>
                            <a href="/tentang/sejarah" class="block px-5 py-3 hover:bg-[#2c67b2]">
                                Sejarah Singkat
                            </a>
                        </li>

                        <li>
                            <a href="/tentang/struktur" class="block px-5 py-3 hover:bg-[#2c67b2]">
                                Struktur Organisasi
                            </a>
                        </li>

                        <li>
                            <a href="/tentang/akreditasi" class="block px-5 py-3 hover:bg-[#2c67b2]">
                                Akreditasi
                            </a>
                        </li>

                        <!-- Sub Dropdown Fasilitas -->
                        <li class="relative group/fasilitas">
                            <div class="flex justify-between items-center px-5 py-3 hover:bg-[#2c67b2] cursor-pointer">
                                Fasilitas Jurusan
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>

                            <ul class="absolute top-0 left-full ml-2 w-60 bg-[#2c67b2] text-white
                                       rounded-xl shadow-xl opacity-0 invisible
                                       group-hover/fasilitas:opacity-100 group-hover/fasilitas:visible
                                       transition-all duration-300 z-50">

                                @foreach($faculties as $faculty)
                                    <li>
                                        <a href="{{ route('tentang.fasilitas.faculty', $faculty->slug) }}"
                                           class="block px-5 py-3 hover:bg-[#3b82f6]">
                                            {{ $faculty->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                    </ul>
                </li>

            {{-- Dropdown: Faculties --}}
            <div class="relative group h-14 flex items-center">
                <button class="flex items-center gap-1 px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition-all duration-300 focus:outline-none group-hover:bg-sky-50 group-hover:text-sky-600">
                    Faculties
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                    <ul class="absolute left-1/2 -translate-x-1/2 mt-3 w-64
                               bg-[#1f4e8c] text-white rounded-xl shadow-xl
                               opacity-0 invisible group-hover:opacity-100 group-hover:visible
                               transition-all duration-300 z-50">

                        @foreach($faculties as $faculty)
                            <li class="relative group/faculty">
                                <div class="flex justify-between items-center px-6 py-4 hover:bg-[#2c67b2] cursor-pointer">
                                    {{ $faculty->name }}
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>

                                <ul class="absolute top-0 left-full ml-2 w-72 bg-[#2c67b2] text-white
                                           rounded-xl shadow-xl opacity-0 invisible
                                           group-hover/faculty:opacity-100 group-hover/faculty:visible
                                           transition-all duration-300 z-50">

                                    @forelse($faculty->prodis as $prodi)
                                        <li>
                                            <a href="{{ route('faculties.prodis.show', [
                                                'faculty' => $faculty->slug,
                                                'prodi' => $prodi->slug
                                            ]) }}"
                                               class="block px-6 py-4 hover:bg-[#3b7fd1]">
                                                {{ $prodi->name }}
                                            </a>
                                        </li>
                                    @empty
                                        <li class="px-6 py-4 text-white/70">
                                            Belum ada prodi
                                        </li>
                                    @endforelse

                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>

            <a href="/admissions" class="px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition-all duration-300">Admissions</a>
            <a href="/careers" class="px-4 py-2 rounded-lg hover:bg-sky-600 hover:text-white transition-all duration-300">Careers</a>
        </div>

        <!-- KANAN: DAFTAR -->
        <div class="ml-auto hidden md:block">
            <a href="/admissions"
               class="px-5 py-2 bg-sky-500 text-white rounded-xl font-bold hover:bg-sky-600 transition">
                Daftar
            </a>
        </div>
    </div>
</nav>

<div class="h-20"></div>