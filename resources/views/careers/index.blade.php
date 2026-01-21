@extends('layout.main')
@section('title','Alumni Track')

@section('content')

{{-- HERO --}}
<section class="min-h-screen flex items-center bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-950">
<div class="max-w-7xl mx-auto px-6 text-center">

<h1 data-aos="fade-up" class="text-5xl md:text-6xl font-extrabold">
Alumni <span class="text-indigo-400">Career Track</span>
</h1>

<p data-aos="fade-up" data-aos-delay="100"
class="mt-6 text-slate-300 max-w-xl mx-auto">
Jejak kesuksesan lulusan kampus kami di industri nasional dan global.
</p>

</div>
</section>


{{-- ALUMNI GRID --}}
<section class="py-28 bg-slate-950">
<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-16">
<h2 class="text-4xl font-extrabold">Alumni Berprestasi</h2>
<p class="text-slate-400 mt-3">
Menginspirasi generasi berikutnya
</p>
</div>

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

{{-- CARD --}}
<div data-aos="zoom-in"
class="group bg-indigo-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

<img src="https://randomuser.me/api/portraits/men/32.jpg"
class="w-full h-60 object-cover">

<div class="p-6">
<h3 class="text-lg font-bold">Ahmad Rizky</h3>
<p class="text-indigo-400 text-sm">Software Engineer — Tokopedia</p>

<p class="mt-3 text-slate-300 text-sm italic">
"Ilmu kampus menjadi fondasi karier saya di industri teknologi."
</p>
</div>

</div>


<div data-aos="zoom-in" data-aos-delay="100"
class="group bg-purple-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

<img src="https://randomuser.me/api/portraits/women/45.jpg"
class="w-full h-60 object-cover">

<div class="p-6">
<h3 class="text-lg font-bold">Siti Aisyah</h3>
<p class="text-purple-400 text-sm">Data Analyst — Shopee</p>

<p class="mt-3 text-slate-300 text-sm italic">
"Praktikum dan project kampus sangat relevan dengan dunia kerja."
</p>
</div>

</div>


<div data-aos="zoom-in" data-aos-delay="200"
class="group bg-emerald-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

<img src="https://randomuser.me/api/portraits/men/75.jpg"
class="w-full h-60 object-cover">

<div class="p-6">
<h3 class="text-lg font-bold">Dimas Pratama</h3>
<p class="text-emerald-400 text-sm">Cyber Security Engineer — BCA</p>

<p class="mt-3 text-slate-300 text-sm italic">
"Kampus membentuk mental profesional dan skill teknis saya."
</p>
</div>

</div>


<div data-aos="zoom-in" data-aos-delay="300"
class="group bg-pink-500/10 rounded-2xl overflow-hidden hover:scale-105 transition">

<img src="https://randomuser.me/api/portraits/women/65.jpg"
class="w-full h-60 object-cover">

<div class="p-6">
<h3 class="text-lg font-bold">Nabila Putri</h3>
<p class="text-pink-400 text-sm">Digital Marketer — Traveloka</p>

<p class="mt-3 text-slate-300 text-sm italic">
"Kampus memberi kepercayaan diri untuk bersaing secara global."
</p>
</div>

</div>

</div>
</div>
</section>

@endsection
