@extends('layout.main')
@section('title','Admissions')

@section('content')
<div class="pt-32 pb-20 px-4 flex justify-center">

    <div class="w-full max-w-xl
        bg-white/10 backdrop-blur-xl
        rounded-3xl shadow-2xl
        p-8 border border-white/20">

        {{-- 🔔 NOTIFIKASI --}}
        @if(session('success'))
            <div class="alert-box success">
                <span class="icon">✔</span>
                <div>
                    <strong>Berhasil!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="alert-box error">
                <span class="icon">✖</span>
                <div>
                    <strong>Gagal!</strong>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-box error">
                <span class="icon">⚠</span>
                <div>
                    <strong>Periksa Form</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

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

            <div>
                <label class="text-xs text-gray-300">Nama Lengkap</label>
                <input name="nama_lengkap" required class="input-style">
            </div>

            <div>
                <label class="text-xs text-gray-300">Email</label>
                <input type="email" name="email" required class="input-style">
            </div>

            <div>
                <label class="text-xs text-gray-300">No HP</label>
                <input name="no_hp" required class="input-style">
            </div>

            <div>
                <label class="text-xs text-gray-300">Fakultas</label>
                <select id="faculty" name="faculty_id" required class="input-style">
                    <option value="">Pilih Fakultas</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-xs text-gray-300">Program Studi</label>
                <select id="prodi" name="prodi_id" required class="input-style">
                    <option value="">Pilih Program Studi</option>
                </select>
            </div>

            <div>
                <label class="text-xs text-gray-300">Tahun Akademik</label>
                <input name="tahun_akademik" placeholder="2025/2026" required class="input-style">
            </div>

            <button type="submit" class="btn-submit">
                Daftar Sekarang
            </button>
        </form>

        <p class="text-xs text-center text-gray-400 mt-6">
            © {{ date('Y') }} KampusGW • Admissions Online
        </p>
    </div>
</div>

{{-- 🎨 STYLE --}}
<style>
.input-style {
    width: 100%;
    margin-top: 6px;
    background: rgba(15,23,42,0.85);
    color: white;
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 10px;
    padding: 10px 12px;
    outline: none;
}
.input-style:focus {
    border-color: #22d3ee;
    box-shadow: 0 0 0 2px rgba(34,211,238,0.3);
}

.btn-submit {
    width: 100%;
    margin-top: 20px;
    background: #06b6d4;
    border: none;
    padding: 12px;
    border-radius: 12px;
    font-weight: bold;
    color: black;
    cursor: pointer;
}

/* NOTIFIKASI */
.alert-box {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 14px 16px;
    border-radius: 14px;
    margin-bottom: 20px;
    font-size: 14px;
    animation: slideDown 0.4s ease;
    backdrop-filter: blur(10px);
}
.alert-box strong { display: block; margin-bottom: 2px; font-size: 15px; }
.alert-box p { margin: 0; font-size: 13px; }
.alert-box ul { margin: 0; padding-left: 18px; font-size: 13px; }
.alert-box .icon { font-size: 18px; margin-top: 2px; }

.success { background: rgba(34,197,94,0.12); border: 1px solid #22c55e; color: #bbf7d0; }
.error { background: rgba(239,68,68,0.12); border: 1px solid #ef4444; color: #fecaca; }

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-15px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

{{-- ⚡ SCRIPT --}}
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

// notif hilang otomatis
setTimeout(() => {
    document.querySelectorAll('.alert-box').forEach(el => {
        el.style.opacity = '0';
        setTimeout(() => el.remove(), 300);
    });
}, 4000);
</script>

@endsection
