@extends('layout.main')

@section('title','Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-20">

    <h1 class="text-4xl font-extrabold mb-10">
        Admin Dashboard
    </h1>

    <div class="grid md:grid-cols-4 gap-6">

        <div class="p-6 rounded-xl bg-white/5 border border-white/10">
            <h3 class="text-xl font-bold">Fakultas</h3>
            <p class="text-slate-400 mt-2">Kelola data fakultas</p>
        </div>

        <div class="p-6 rounded-xl bg-white/5 border border-white/10">
            <h3 class="text-xl font-bold">Prodi</h3>
            <p class="text-slate-400 mt-2">Kelola jurusan</p>
        </div>

        <div class="p-6 rounded-xl bg-white/5 border border-white/10">
            <h3 class="text-xl font-bold">Alumni</h3>
            <p class="text-slate-400 mt-2">Kelola testimoni</p>
        </div>

        <div class="p-6 rounded-xl bg-white/5 border border-white/10">
            <h3 class="text-xl font-bold">Mitra</h3>
            <p class="text-slate-400 mt-2">Kelola partner</p>
        </div>

    </div>

</div>
@endsection
