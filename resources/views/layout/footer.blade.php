<footer id="footer" class="mt-32 bg-slate-50 border-t border-slate-200 font-sans relative overflow-hidden">
    {{-- Hiasan Background biar gak sepi --}}
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-sky-500/20 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 py-20 relative z-10">
        {{-- Grid utama kita bikin 5 kolom biar padet --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 text-sm">

            {{-- Kolom 1: Identity & About (Lebih Lebar) --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="space-y-4">
                    @if(!empty($profile) && $profile->logo_path)
                        <img src="{{ asset('storage/' . $profile->logo_path) }}" 
                             class="h-12 w-auto object-contain brightness-110" alt="Logo">
                    @endif
                    <h3 class="text-xl font-black text-slate-800 tracking-tighter uppercase">
                        {{ $profile->campus_name ?? 'KAMPUS KITA' }}
                    </h3>
                    <p class="text-slate-500 leading-relaxed text-[13px]">
                        {{ \Illuminate\Support\Str::words(strip_tags($profile->visi ?? 'Mencetak talenta global dengan kurikulum industri.'), 20) }}
                    </p>
                </div>
                
                {{-- Sosmed dengan Style Card Kecil --}}
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-sky-600 hover:border-sky-600 transition-all shadow-sm">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($profile->campus_name ?? 'KAMPUS KITA') }}&url={{ urlencode(url()->current()) }}" target="_blank" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-sky-600 hover:border-sky-600 transition-all shadow-sm">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.01 3.71.054 1.14.074 1.908.305 2.5.547a4.387 4.387 0 011.57 1.022c.41.408.74.882 1.022 1.57.242.592.474 1.36.547 2.502.045.927.054 1.28.054 3.71s-.01 2.784-.054 3.71c-.074 1.14-.305 1.908-.547 2.5a4.508 4.508 0 01-1.022 1.57 4.387 4.387 0 01-1.57 1.022c-.592.242-1.36.474-2.502 .547-.927 .045-1 .966-.966 .966s-.966 .966-.966 .966v-.966h-.966c-.966 .966- .966 .966s-.966 .966-.966 .966v-.966h-.93c-.3 - .3 - .3 - .3s-.3 - .3 - .3 - .3v-.3h-.3c -.3 -.3 -.3 -.3s -.3 -.3 -.3 -.3v-.3h-.3c -.3 -.3 -.3 -.3s -.3 -.3 -.3 -.3v-.3h-.f3c -.3 -.3 -.3 -.3s -.3 -.3 -.3 -.3v-.3h-.3c -.3 -.3 -.3 -.3s -.3 -.3 -.3 -.3v-.3h-.3c -.3 -.3 -.3 -.3s -.3 -.3 -.3 -.3v-.3h-.3c-.3-.3-.3-.3-.3-.3v-.3h-.966c0 .966 0 .966 0 .966s0 .966 0 966v 966h 966c 966 966 966 966 966 966s 966 966 966 966v 966h 93c"></path></svg>
                    </a>
                    <a href="https://www.instagram.com/?url={{ urlencode(url()->current()) }}" target="_blank" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-sky-600 hover:border-sky-600 transition-all shadow-sm">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5A4.25 4.25 0 0020.5 16.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zm4.25 3a5.75 5.75 0 110 11.5 5.75 5.75 0 010-11.5zm0 1.5a4.25 4.25 0 100 8.5 4.25 4.25 0 000-8.5zm5.5-.75a1.25 1.25 0 110 2.5 1.25 1.25 0 010-2.5z"/></svg>
                    </a>
                </div>
            </div>
            {{-- Kolom 2: Quick Links --}}
            <div>
                <h4 class="font-black mb-6 text-slate-800 uppercase tracking-[0.2em] text-[10px]">Ecosystem</h4>
                <ul class="space-y-3 text-slate-500 font-medium">
                    <li><a href="#About" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> About Us</a></li>
                    <li><a href="#Fakultas" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> Akademik</a></li>
                    <li><a href="#Hero" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> Admissions</a></li>
                    <li><a href="#Testimoni" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> Careers</a></li>
                    <li><a href="#berita-kampus" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> News & Events</a></li>
                    <li><a href="#Partners" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> Our Partners</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Resources --}}
            <div>
                <h4 class="font-black mb-6 text-slate-800 uppercase tracking-[0.2em] text-[10px]">Resources & Downloads</h4>
                <ul class="space-y-4 text-slate-500 font-medium">
                    @forelse($downloads as $dl)
                        <li>
                            <a href="{{ asset('storage/' . $dl->file_path) }}" 
                            class="hover:text-sky-600 transition flex items-start gap-3 group" 
                            download>
                                {{-- Icon File Kecil --}}
                                <svg class="w-4 h-4 mt-0.5 text-slate-300 group-hover:text-sky-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <div class="flex flex-col">
                                    <span class="leading-tight text-[13px]">{{ $dl->title }}</span>
                                    <span class="text-[9px] text-slate-400 uppercase tracking-tighter">{{ $dl->category }}</span>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li class="text-[11px] italic text-slate-400">Belum ada dokumen tersedia.</li>
                    @endforelse
                </ul>
            </div>

            {{-- Kolom 4: Top Programs (Tambahan biar Padet) --}}
            <div>
                <h4 class="font-black mb-6 text-slate-800 uppercase tracking-[0.2em] text-[10px]">Top Programs</h4>
                <ul class="space-y-3 text-slate-500 font-medium">
                    @foreach ($prodis->take(4) as $prodi)
                        <li><a href="#" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> {{ $prodi->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Kolom 5: Contact & Maps (Lebar) --}}
            <div class="space-y-6">
                <h4 class="font-black mb-6 text-slate-800 uppercase tracking-[0.2em] text-[10px]">Get In Touch</h4>
                
                {{-- Mini Maps dengan border mewah --}}
                <div class="relative h-28 rounded-2xl overflow-hidden border-2 border-white shadow-sm group">
                    @php
                        $mapQuery = urlencode(($profile->campus_name ?? 'Kampus') . ' ' . ($profile->address ?? 'Jakarta'));
                    @endphp
                    <iframe width="100%" height="100%" frameborder="0" class="grayscale group-hover:grayscale-0 transition duration-700"
                            src="https://maps.google.com/maps?q={{ $mapQuery }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                    <div class="absolute inset-0 bg-sky-600/5 pointer-events-none"></div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-50 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="text-[12px] font-bold text-slate-600 leading-tight">
                            {{ $profile->email ?? 'info@kampus.ac.id' }}
                        </p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-50 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.213l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.213-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>  
                        <p class="text-[12px] font-bold text-slate-600 leading-tight">
                            {{ $profile->phone ?? '+62 123 4567 890' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center gap-4 text-[11px] font-bold uppercase tracking-widest text-slate-400">
            <div class="flex items-center gap-2">
                <span>© {{ date('Y') }}</span>
                <span class="text-slate-800">{{ $profile->campus_name ?? config('app.name') }}</span>
                <span class="hidden md:inline text-slate-200">|</span>
                <span class="hidden md:inline">Built for Excellence</span>
            </div>
            <div class="flex gap-6">
               <a href="{{ route('page.show', 'privacy-policy') }}">PRIVACY POLICY</a>
                <a href="{{ route('page.show', 'terms-of-service') }}">TERMS OF SERVICE</a>
                <a href="{{ route('page.show', 'site-map') }}">SITE MAP</a>
            </div>
        </div>
    </div>
</footer>