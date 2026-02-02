<nav class="fixed w-full z-50 bg-white/70 backdrop-blur-md border-b border-slate-200">
    <div class="relative max-w-7xl mx-auto px-6 py-4 flex items-center">

        <!-- KIRI: LOGO -->
        <div class="flex items-center">
            <a href="/" class="text-xl font-extrabold text-sky-600 tracking-wide">
                KampusGW
            </a>
        </div>

        <!-- TENGAH: MENU (POSISI TETAP, JANGAN DIUBAH) -->
        <div class="absolute left-1/2 -translate-x-1/2 hidden md:flex gap-8 text-sm font-semibold text-slate-700">
            <ul class="flex gap-8 items-center list-none">

                <a href="/" class="hover:text-blue-800 transition">Home</a>

                        <!-- Tentang Kami -->
                <li class="relative group">
                    <button class="flex items-center gap-1 hover:text-blue-800 transition focus:outline-none">
                        Tentang Kami
                        <svg class="w-4 h-4 mt-[1px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <ul class="absolute left-0 mt-3 w-56 bg-[#1f4e8c] text-white rounded-xl shadow-xl
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible
                            transition-all duration-300 z-50">

                <li>
                    <a href="/tentang/sejarah" class="block px-5 py-3 hover:bg-[#2c67b2] rounded-t-xl">
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

        {{-- SUB DROPDOWN FASILITAS --}}
        <li class="relative group/fasilitas">
            <div class="flex items-center justify-between px-5 py-3 hover:bg-[#2c67b2] cursor-pointer">
                Fasilitas Jurusan
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5l7 7-7 7"/>
                </svg>
            </div>

            <ul class="absolute top-0 left-full ml-1 w-56 bg-[#2c67b2] text-white
                       rounded-xl shadow-xl opacity-0 invisible
                       group-hover/fasilitas:opacity-100 group-hover/fasilitas:visible
                       transition-all duration-300 z-50">

                @foreach($faculties as $faculty)
                    <li>
                        <<a href="{{ route('tentang.fasilitas.faculty', $faculty->slug) }}"
                            class="block px-5 py-3 hover:bg-[#3b82f6]">
                            {{ $faculty->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Faculties -->
                <li class="relative group">
                    <button class="flex items-center gap-1 hover:text-blue-800 transition focus:outline-none">
                        Faculties
                        <svg class="w-4 h-4 mt-[1px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <ul class="absolute left-1/2 -translate-x-1/2 mt-3 w-56 bg-[#1f4e8c] text-white
                               rounded-xl shadow-xl opacity-0 invisible
                               group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        @foreach($faculties as $faculty)
                            <li>
                                <a href="{{ route('faculties.show', $faculty->slug) }}"
                                   class="block px-5 py-3 hover:bg-[#2c67b2] transition">
                                    {{ $faculty->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <a href="/admissions" class="hover:text-blue-800 transition">Admissions</a>
                <a href="/careers" class="hover:text-blue-800 transition">Careers</a>
            </ul>
        </div>

        <!-- KANAN: BUTTON DAFTAR (FIX POJOK KANAN) -->
        <div class="ml-auto hidden md:block">
            <a href="/admissions"
               class="px-5 py-2 bg-sky-500 text-white rounded-xl font-bold hover:bg-sky-600 transition">
                Daftar
            </a>
        </div>

    </div>
</nav>

<div class="h-20"></div>
