<footer class="mt-32 bg-slate-50 border-t border-slate-200 font-sans">
    <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-4 gap-10 text-sm">

        <div class="space-y-4">
            <div class="flex items-center gap-2">
                {{-- Logo Kecil (Opsional, kalau mau dimunculin) --}}
               @if(!empty($profile) && $profile->logo_path)
                    <img 
                        src="{{ asset('storage/' . $profile->logo_path) }}"
                        alt="Logo Kampus"
                        class="h-10 w-auto object-contain"
                    >
                @endif
                <h3 class="text-xl font-extrabold text-sky-600 tracking-tight">
                    {{-- Ambil Nama Kampus dari DB --}}
                    {{ $profile->campus_name ?? config('app.name', 'KampusGW') }}
                </h3>
            </div>
            
          <p class="text-slate-500 leading-relaxed">
    {{ \Illuminate\Support\Str::words(
        trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($profile->visi ?? 'Mencetak talenta global dengan kurikulum berbasis industri dan teknologi terkini.')))),
        12,
        '...'
    ) }}
</p>


        
            {{-- Sosmed (Hardcode atau tambah kolom nanti) --}}
            <div class="flex gap-4 pt-2">
                <a href="#" class="text-slate-400 hover:text-sky-600 transition"><span class="sr-only">Facebook</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                <a href="#" class="text-slate-400 hover:text-sky-600 transition"><span class="sr-only">Twitter</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg></a>
            </div>
        </div>

        <div>
            <h4 class="font-bold mb-4 text-slate-800 uppercase tracking-wider text-xs">Campus</h4>
            <ul class="space-y-2 text-slate-500">
                <li><a href="/tentang/sejarah" class="hover:text-sky-600 transition duration-300">About Us</a></li>
                <li><a href="/faculties" class="hover:text-sky-600 transition duration-300">Faculties</a></li>
                <li><a href="/admissions" class="hover:text-sky-600 transition duration-300">Admissions</a></li>
                <li><a href="/careers" class="hover:text-sky-600 transition duration-300">Careers</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold mb-4 text-slate-800 uppercase tracking-wider text-xs">Resources</h4>
            <ul class="space-y-2 text-slate-500">
                <li><a href="#" class="hover:text-sky-600 transition duration-300">Academic Calendar</a></li>
                <li><a href="#" class="hover:text-sky-600 transition duration-300">Library & Journal</a></li>
                <li><a href="#" class="hover:text-sky-600 transition duration-300">Student Portal</a></li>
                <li><a href="#" class="hover:text-sky-600 transition duration-300">Alumni Network</a></li>
            </ul>
        </div>

        <div>
    <h4 class="font-bold mb-4 text-slate-800 uppercase tracking-wider text-xs">Contact Us</h4>
    
    <ul class="space-y-4 text-slate-500">

        <li class="w-full mb-4">
            {{-- 1. Siapkan Query Pencarian Maps --}}
            @php
                $campusName = $profile->campus_name ?? config('app.name', 'Universitas');
                $address    = $profile->address ?? 'Jakarta, Indonesia';
                // Gabung Nama + Alamat, lalu encode biar aman di URL
                $mapQuery   = urlencode($campusName . ' ' . $address);
            @endphp

            {{-- 2. Tampilkan Iframe --}}
            <div class="relative w-full h-48 rounded-xl overflow-hidden shadow-md border border-slate-200 group">
                
                {{-- Efek Grayscale (Hitam Putih) biar estetik, berwarna pas di-hover --}}
                <iframe 
                    width="100%" 
                    height="100%" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0" 
                    marginwidth="0" 
                    class="w-full h-full grayscale group-hover:grayscale-0 transition duration-700"
                    src="https://maps.google.com/maps?q={{ $mapQuery }}&t=&z=15&ie=UTF8&iwloc=&output=embed">
                </iframe>

                {{-- Tombol Overlay "Buka di Google Maps" --}}
                <a href="https://www.google.com/maps/search/?api=1&query={{ $mapQuery }}" 
                   target="_blank" 
                   class="absolute inset-0 bg-black/0 hover:bg-black/10 transition flex items-center justify-center pointer-events-none group-hover:pointer-events-auto">
                    <span class="opacity-0 group-hover:opacity-100 bg-white/90 text-xs font-bold px-4 py-2 rounded-full text-slate-800 shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                        Buka Peta 🗺️
                    </span>
                </a>
            </div>
        </li>
        
        <li class="flex items-start gap-3">
            <svg class="w-5 h-5 text-sky-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span class="leading-snug text-sm">
                {{ $profile->address ?? 'Alamat belum diatur' }}
            </span>
        </li>

        <li class="flex items-center gap-3">
            <svg class="w-5 h-5 text-sky-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <a href="mailto:{{ $profile->email }}" class="hover:text-sky-600 transition break-all text-sm">
                {{ $profile->email ?? '-' }}
            </a>
        </li>

        <li class="flex items-center gap-3">
            <svg class="w-5 h-5 text-sky-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <span class="text-sm">
                {{ $profile->phone ?? '-' }}
            </span>
        </li>

    </ul>
</div>
    </div>

    <div class="bg-slate-100 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
            <p>
                &copy; {{ date('Y') }} 
                <span class="font-bold text-slate-700">{{ $profile->campus_name ?? config('app.name') }}</span>. 
                All rights reserved.
            </p>
            <div class="flex gap-4 mt-2 md:mt-0">
                <a href="#" class="hover:text-sky-600 transition">Privacy Policy</a>
                <a href="#" class="hover:text-sky-600 transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>