@extends('layout.main')
@section('title','Admissions')

@section('content')

<div class="pt-32 pb-20 px-4 flex justify-center min-h-screen bg-[#9DC7F4]">

    <div class="w-full max-w-xl
        bg-white
        rounded-3xl shadow-2xl
        p-8 border border-slate-200">

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

        {{-- HEADER --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-slate-900 tracking-tight">
                Admissions
            </h2>
            <p class="text-sm text-slate-600 mt-1">
                Pendaftaran Mahasiswa Baru
            </p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="/admissions" class="space-y-4">
            @csrf

            <div>
                <label class="text-xs font-semibold text-slate-700">
                    Nama Lengkap
                </label>
                <input name="nama_lengkap" required class="input-style">
            </div>

            <div>
                <label class="text-xs font-semibold text-slate-700">
                    Email
                </label>
                <input type="email" name="email" required class="input-style">
            </div>

            <div>
                <label class="text-xs font-semibold text-slate-700">
                    No HP
                </label>
                <input name="no_hp" required class="input-style">
            </div>

            <div>
                <label class="text-xs font-semibold text-slate-700">
                    Fakultas
                </label>
                <select id="faculty" name="faculty_id" required class="input-style">
                    <option value="">Pilih Fakultas</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-xs font-semibold text-slate-700">
                    Program Studi
                </label>
                <select id="prodi" name="prodi_id" required class="input-style">
                    <option value="">Pilih Program Studi</option>
                </select>
            </div>

            <div>
                <label class="text-xs font-semibold text-slate-700">
                    Tahun Akademik
                </label>
                <input name="tahun_akademik" placeholder="2025/2026" required class="input-style">
            </div>

            <button type="submit" class="btn-submit">
                Daftar Sekarang
            </button>
        </form>

        <p class="text-xs text-center text-slate-500 mt-6">
            © {{ date('Y') }} KampusGW • Admissions Online
        </p>
    </div>
</div>

{{-- 🎨 STYLE --}}
<style>
.input-style {
    width: 100%;
    margin-top: 6px;
    background: #F8FAFC; /* terang */
    color: #0f172a;
    border: 1px solid #CBD5E1;
    border-radius: 12px;
    padding: 11px 14px;
    outline: none;
    transition: all .2s ease;
}

.input-style:focus {
    border-color: #1583D7;
    box-shadow: 0 0 0 3px rgba(21,131,215,0.25);
    background: white;
}

.btn-submit {
    width: 100%;
    margin-top: 20px;
    background: #1583D7;
    border: none;
    padding: 13px;
    border-radius: 14px;
    font-weight: bold;
    color: white;
    cursor: pointer;
    transition: all .25s ease;
}

.btn-submit:hover {
    background: #0F6CC0;
    transform: translateY(-1px);
    box-shadow: 0 10px 25px rgba(21,131,215,.35);
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
}

.alert-box strong {
    display: block;
    margin-bottom: 2px;
    font-size: 15px;
}

.alert-box p,
.alert-box ul {
    margin: 0;
    font-size: 13px;
}

.alert-box .icon {
    font-size: 18px;
    margin-top: 2px;
}

.success {
    background: #ECFDF5;
    border: 1px solid #22C55E;
    color: #166534;
}

.error {
    background: #FEF2F2;
    border: 1px solid #EF4444;
    color: #7F1D1D;
}

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
