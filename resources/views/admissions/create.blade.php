{{-- 
@include('layout.main')
@section('title', 'Admissions - KampusGW')

@section('content')
<div class="pt-32 px-4 flex justify-center">
    @if(session('success'))
            <div class="bg-cyan-500/20 text-cyan-300 p-3 rounded-xl mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

    <div class="w-full max-w-xl bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/20">

        <h2 class="text-3xl font-bold text-center mb-2">Admissions</h2>
        <p class="text-center text-gray-300 mb-6">
            Pendaftaran Mahasiswa Baru KampusGW
        </p>
        <form method="POST" action="/admissions" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm text-gray-300">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
            </div>

            <div>
                <label class="text-sm text-gray-300">Email</label>
                <input type="email" name="email" required
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
            </div>

            <div>
                <label class="text-sm text-gray-300">No HP</label>
                <input type="text" name="no_hp" required
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
            </div>

            <div>
                <label class="text-sm text-gray-300">Fakultas</label>
                <select id="fakultas" name="fakultas" required
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
                    <option value="">Pilih Fakultas</option>
                    <option>Fakultas Informatika</option>
                    <option>Fakultas Sistem Informasi</option>
                    <option>Fakultas Data Science</option>
                    <option>Fakultas Bisnis Digital</option>
                </select>
            </div>

            <div>
                <label class="text-sm text-gray-300">Program Studi</label>
                <select id="prodi" name="program_studi" required
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
                    <option value="">Pilih Program Studi</option>
                </select>
            </div>

            <div>
                <label class="text-sm text-gray-300">Tahun Akademik</label>
                <select id="tahunSelect"
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
                    <option value="">Pilih Tahun Akademik</option>
                    <option value="2024/2025">2024/2025</option>
                    <option value="2025/2026">2025/2026</option>
                    <option value="2026/2027">2026/2027</option>
                    <option value="LAINNYA">Tahun Lainnya</option>
                </select>
            </div>

            <div id="tahunManualWrap" class="hidden">
                <label class="text-sm text-gray-300">Tahun Akademik (Manual)</label>
                <input type="text" id="tahunManual"
                    placeholder="Contoh: 2027/2028"
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
            </div>

            <input type="hidden" name="tahun_akademik" id="tahunFinal">

            <button type="submit"
                class="w-full bg-cyan-500 hover:bg-cyan-400 text-black font-bold py-3 rounded-xl transition">
                Daftar Sekarang
            </button>
        </form>

        <p class="text-xs text-center text-gray-400 mt-6">
            © {{ date('Y') }} KampusGW • Admissions Online
        </p>
    </div>
</div>

<script>
const dataJurusan = {
    "Fakultas Informatika": ["Artificial Intelligence", "Cyber Security", "Software Engineering"],
    "Fakultas Sistem Informasi": ["ERP System", "Business Analytics", "Enterprise Database"],
    "Fakultas Data Science": ["Data Mining", "Machine Learning", "Big Data"],
    "Fakultas Bisnis Digital": ["Startup Business", "Digital Branding", "E-Commerce"]
};

const fakultas = document.getElementById("fakultas");
const prodi = document.getElementById("prodi");

fakultas.addEventListener("change", () => {
    prodi.innerHTML = '<option value="">Pilih Program Studi</option>';
    if (fakultas.value) {
        dataJurusan[fakultas.value].forEach(j => {
            const o = document.createElement("option");
            o.textContent = j;
            prodi.appendChild(o);
        });
    }
});

const tahunSelect = document.getElementById('tahunSelect');
const manualWrap = document.getElementById('tahunManualWrap');
const manualInput = document.getElementById('tahunManual');
const finalInput = document.getElementById('tahunFinal');

tahunSelect.addEventListener('change', () => {
    if (tahunSelect.value === 'LAINNYA') {
        manualWrap.classList.remove('hidden');
        finalInput.value = '';
    } else {
        manualWrap.classList.add('hidden');
        finalInput.value = tahunSelect.value;
    }
});

manualInput.addEventListener('input', () => {
    finalInput.value = manualInput.value;
});
</script>

@endsection
--}}