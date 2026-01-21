@extends('layout.main')
@section('title','Admissions')

@section('content')
<div class="pt-32 pb-20 px-4 flex justify-center">

    <div class="w-full max-w-xl
        bg-white/10 backdrop-blur-xl
        rounded-3xl shadow-2xl
        p-8 border border-white/20">

        <!-- HEADER -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white tracking-tight">
                Admissions
            </h2>
            <p class="text-sm text-gray-300 mt-1">
                Pendaftaran Mahasiswa Baru
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="/admissions" class="space-y-4">
            @csrf

            <!-- NAMA -->
            <div>
                <label class="text-xs text-gray-300">Nama Lengkap</label>
                <input name="nama_lengkap" required
                    class="w-full mt-1 bg-slate-900/80 text-white
                    border border-white/20 rounded-xl px-4 py-2
                    focus:ring-2 focus:ring-cyan-400 focus:outline-none">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="text-xs text-gray-300">Email</label>
                <input type="email" name="email" required
                    class="w-full mt-1 bg-slate-900/80 text-white
                    border border-white/20 rounded-xl px-4 py-2
                    focus:ring-2 focus:ring-cyan-400 focus:outline-none">
            </div>

            <!-- NO HP -->
            <div>
                <label class="text-xs text-gray-300">No HP</label>
                <input name="no_hp" required
                    class="w-full mt-1 bg-slate-900/80 text-white
                    border border-white/20 rounded-xl px-4 py-2
                    focus:ring-2 focus:ring-cyan-400 focus:outline-none">
            </div>

            <!-- FAKULTAS -->
            <div>
                <label class="text-xs text-gray-300">Fakultas</label>
                <select id="faculty" name="faculty_id" required
                    class="w-full mt-1 bg-slate-900/80 text-white
                    border border-white/20 rounded-xl px-4 py-2
                    focus:ring-2 focus:ring-cyan-400 focus:outline-none">
                    <option value="">Pilih Fakultas</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">
                            {{ $faculty->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- PRODI -->
            <div>
                <label class="text-xs text-gray-300">Program Studi</label>
                <select id="prodi" name="prodi_id" required
                    class="w-full mt-1 bg-slate-900/80 text-white
                    border border-white/20 rounded-xl px-4 py-2
                    focus:ring-2 focus:ring-cyan-400 focus:outline-none">
                    <option value="">Pilih Program Studi</option>
                </select>
            </div>

            <!-- TAHUN -->
            <div>
                <label class="text-xs text-gray-300">Tahun Akademik</label>
                <input name="tahun_akademik" placeholder="2025/2026" required
                    class="w-full mt-1 bg-slate-900/80 text-white
                    border border-white/20 rounded-xl px-4 py-2
                    focus:ring-2 focus:ring-cyan-400 focus:outline-none">
            </div>

            <!-- BUTTON -->
            <button
                class="w-full mt-6 bg-cyan-500/90 hover:bg-cyan-400
                text-black font-bold py-3 rounded-xl transition">
                Daftar Sekarang
            </button>
        </form>

        <!-- FOOTER -->
        <p class="text-xs text-center text-gray-400 mt-6">
            © {{ date('Y') }} KampusGW • Admissions Online
        </p>
    </div>
</div>

<!-- SCRIPT PRODI -->
<script>
const faculties = @json($faculties);

document.getElementById('faculty').addEventListener('change', function () {
    const prodi = document.getElementById('prodi');
    prodi.innerHTML = '<option value="">Pilih Program Studi</option>';

    const selected = faculties.find(f => f.id == this.value);
    if (selected) {
        selected.prodis.forEach(p => {
            prodi.innerHTML += `<option value="${p.id}">${p.name}</option>`;
        });
    }
});
</script>
@endsection
