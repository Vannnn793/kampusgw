@extends('layout.main')

@section('content')
<section class="py-24 bg-slate-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-6">
        {{-- Header --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-slate-900 tracking-tighter uppercase mb-4">Pusat Dokumen & Unduhan</h2>
            <p class="text-slate-500 max-w-2xl mx-auto font-medium">Akses cepat dokumen resmi, panduan mahasiswa, dan formulir administrasi kampus kami.</p>
        </div>

        {{-- Main Content --}}
        <div class="grid lg:grid-cols-4 gap-10">
            
            {{-- Sidebar Filter --}}
            <div class="lg:col-span-1 space-y-8">
                <div>
                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-6">Filter Kategori</h4>
                    <div class="flex flex-col gap-2">
                        {{-- Tombol Semua File --}}
                        <a href="{{ route('downloads.index') }}" 
                        class="px-5 py-3 rounded-2xl border transition-all text-sm font-bold flex items-center justify-between group {{ !request('category') ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-sky-600 border-slate-100 shadow-sm hover:bg-sky-50' }}">
                            Semua File
                            <svg class="w-4 h-4 {{ !request('category') ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }} transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>

                        {{-- Looping Kategori dari Database (Sama seperti Navbar) --}}
                        {{-- Di Sidebar Filter Download --}}
                        @foreach($fileCategories as $cat)
                            <a href="?category={{ $cat }}" 
                            class="px-5 py-3 rounded-2xl border transition-all text-sm font-bold flex items-center justify-between group 
                            {{ request('category') == $cat ? 'bg-sky-600 text-white' : 'bg-white text-slate-600' }}">
                                
                                {{ ucfirst($cat) }} {{-- Menampilkan: Akademik, Umum, dll --}}
                                
                                <svg class="w-4 h-4 {{ request('category') == $cat ? 'text-white' : 'text-slate-300' }}" ...></svg>
                            </a>
                        @endforeach
                    </div>
                </div>
                {{-- Info Box --}}
                <div class="bg-sky-600 p-6 rounded-[2rem] text-white shadow-xl shadow-sky-200">
                    <svg class="w-8 h-8 mb-4 opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M13 14h-2V9h2v5zm0 4h-2v-2h2v2zM1 21h22L12 2 1 21z"/></svg>
                    <h5 class="font-black text-lg leading-tight mb-2 text-white">Butuh Dokumen Lain?</h5>
                    <p class="text-[11px] text-sky-100 leading-relaxed font-bold">Jika dokumen yang Anda cari tidak tersedia, silakan hubungi Biro Administrasi Akademik.</p>
                </div>
            </div>

            {{-- Grid Files --}}
            <div class="lg:col-span-3">
                <div class="grid md:grid-cols-2 gap-6">
                    @forelse($downloads as $file)
                    <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-500 group relative overflow-hidden">
                        {{-- Background Accent --}}
                        <div class="absolute top-0 right-0 w-24 h-24 bg-slate-50 rounded-full -mr-12 -mt-12 transition-transform group-hover:scale-150 duration-700"></div>

                        <div class="relative">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-sky-500 group-hover:text-white transition-all duration-500 shadow-inner">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <span class="text-[9px] font-black uppercase tracking-widest text-sky-500 bg-sky-50 px-2 py-0.5 rounded">{{ $file->category }}</span>
                                    <h4 class="font-black text-slate-800 tracking-tight leading-tight mt-1">{{ $file->title }}</h4>
                                </div>
                            </div>

                            <p class="text-xs text-slate-500 leading-relaxed mb-8 font-medium">
                                {{ $file->description ?? 'Tidak ada deskripsi tambahan untuk dokumen ini.' }}
                            </p>

                            <div class="flex items-center justify-between border-t border-slate-50 pt-6">
                                <div class="text-[10px] text-slate-400 font-bold uppercase">
                                    Updated: {{ $file->updated_at->format('M Y') }}
                                </div>
                                <a href="{{ asset('storage/' . $file->file_path) }}" download class="px-6 py-2 bg-[#0F2A44] hover:bg-sky-600 text-white text-[10px] font-black rounded-xl transition-all shadow-lg shadow-slate-200">
                                    DOWNLOAD
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-dashed border-slate-300">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                        </div>
                        <h4 class="font-bold text-slate-400 uppercase text-xs tracking-[0.2em]">Dokumen Belum Tersedia</h4>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection