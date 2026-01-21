<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admissions | KampusGW</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Dark mode select fix -->
    <style>
        select, input {
            background-color: #020617 !important;
            color: #e5e7eb !important;
        }
        select option {
            background-color: #020617;
            color: #e5e7eb;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 min-h-screen text-white">

<!-- NAVBAR -->
<nav class="w-full px-8 py-4 flex justify-between items-center bg-black/30 backdrop-blur-md fixed top-0 left-0 z-50">
    <h1 class="text-xl font-bold text-cyan-400">KampusGW</h1>
    <ul class="hidden md:flex gap-8 text-sm text-gray-300">
        <li class="hover:text-cyan-400">Home</li>
        <li class="hover:text-cyan-400">Faculties</li>
        <li class="text-cyan-400 font-semibold">Admissions</li>
        <li class="hover:text-cyan-400">Careers</li>
    </ul>
</nav>

<!-- CONTENT -->
<div class="pt-32 px-4 flex justify-center">

    <div class="w-full max-w-xl bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/20">

        <!-- HEADER -->
        <h2 class="text-3xl font-bold text-center mb-2">Admissions</h2>
        <p class="text-center text-gray-300 mb-6">
            Pendaftaran Mahasiswa Baru KampusGW
        </p>

        <!-- ALERT -->
        @if(session('success'))
            <div class="bg-cyan-500/20 text-cyan-300 p-3 rounded-xl mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
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

            <!-- FAKULTAS -->
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

            <!-- PROGRAM STUDI -->
            <div>
                <label class="text-sm text-gray-300">Program Studi</label>
                <select id="prodi" name="program_studi" required
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
                    <option value="">Pilih Program Studi</option>
                </select>
            </div>

            <!-- TAHUN AKADEMIK -->
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

            <!-- INPUT MANUAL -->
            <div id="tahunManualWrap" class="hidden">
                <label class="text-sm text-gray-300">Tahun Akademik (Manual)</label>
                <input type="text" id="tahunManual"
                    placeholder="Contoh: 2027/2028"
                    class="w-full border border-white/30 rounded-xl px-4 py-2 focus:ring-2 focus:ring-cyan-400">
            </div>

            <!-- VALUE FINAL -->
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

<!-- SCRIPT -->
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

// Tahun akademik
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

</body>
</html>
