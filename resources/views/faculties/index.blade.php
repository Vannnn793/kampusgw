@extends('layout.main')
@section('title','Faculties')

@section('content')

{{-- HERO --}}
<section class="pt-20 min-h-[60vh] flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
<div class="max-w-7xl mx-auto px-6 text-center">

<h1 data-aos="fade-up"
class="text-5xl md:text-6xl font-extrabold">
Fakultas <span class="text-sky-400">Unggulan</span>
</h1>

<p data-aos="fade-up" data-aos-delay="100"
class="mt-6 text-slate-300 max-w-xl mx-auto">
Program studi berbasis industri global untuk masa depanmu.
</p>

</div>
</section>


{{-- FACULTIES GRID --}}
<section class="py-28 bg-slate-950">
<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-16">
<h2 data-aos="fade-up"
class="text-4xl font-extrabold">
Pilih Fakultas Favoritmu
</h2>

<p data-aos="fade-up" data-aos-delay="100"
class="text-slate-400 mt-3">
Siapkan karier global sejak hari pertama
</p>
</div>


<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

{{-- Informatika --}}
<div data-aos="zoom-in"
class="group bg-sky-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

<img src="https://images.unsplash.com/photo-1518770660439-4636190af475"
class="w-full h-56 object-cover">

<div class="p-6">
<h3 class="text-lg font-bold">Informatika</h3>
<p class="text-sky-400 text-sm">
AI • Software Engineering • Cyber Security
</p>
</div>

</div>


{{-- Sistem Informasi --}}
<div data-aos="zoom-in" data-aos-delay="100"
class="group bg-purple-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

<img src="https://images.unsplash.com/photo-1556761175-4b46a572b786"
class="w-full h-56 object-cover">

<div class="p-6">
<h3 class="text-lg font-bold">Sistem Informasi</h3>
<p class="text-purple-400 text-sm">
ERP • Business Tech • Data Analytics
</p>
</div>

</div>


{{-- Data Science --}}
<div data-aos="zoom-in" data-aos-delay="200"
class="group bg-emerald-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

<img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71"
class="w-full h-56 object-cover">

<div class="p-6">
<h3 class="text-lg font-bold">Data Science</h3>
<p class="text-emerald-400 text-sm">
Machine Learning • Big Data • AI Research
</p>
</div>

</div>


{{-- Bisnis Digital --}}
<div data-aos="zoom-in" data-aos-delay="300"
class="group bg-pink-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

<img src="https://images.unsplash.com/photo-1551836022-deb4988cc6c0"
class="w-full h-56 object-cover">

<div class="p-6">
<h3 class="text-lg font-bold">Bisnis Digital</h3>
<p class="text-pink-400 text-sm">
Startup • Digital Marketing • E-Commerce
</p>
</div>

</div>

</div>
</div>
</section>

@endsection
