@extends('admin.layout.main')
@section('title', 'Struktur Organisasi')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Struktur Organisasi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Organisasi</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row g-4">

    {{-- KOLOM KIRI: FORM TAMBAH --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-person-plus me-2"></i>Tambah Pejabat Baru
                </h6>
            </div>
            
            <div class="card-body">
                
                @if ($errors->any())
                    <div class="alert alert-danger small p-2">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.organization.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Nama --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama & Gelar</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person-badge"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Dr. Fulana, M.Kom" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    {{-- Jabatan --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Kategori Jabatan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-briefcase"></i></span>
                            <select name="position" id="category_select_create" class="form-select" required>
                                <option value="" disabled selected>Pilih Jabatan...</option>
                                <option value="dosen">Dosen Pengajar</option>
                                <option value="pimpinan_fakultas">Pimpinan Fakultas</option>
                                <option value="pimpinan_univ">Pimpinan Universitas</option>
                                <option value="staff">Staff Tata Usaha</option>
                            </select>
                        </div>
                    </div>

                    {{-- Fakultas (Conditional) --}}
                    <div class="mb-3" id="faculty_wrapper_create">
                        <label class="form-label small fw-bold text-muted">Unit / Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            <select name="faculty_id" class="form-select">
                                <option value="">-- Pilih Fakultas --</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">Fak. {{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Foto --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Foto Profil</label>
                        <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
                    </div>

                    {{-- Urutan --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Urutan</label>
                        <input type="number" name="order" class="form-control" placeholder="1" value="1">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- KOLOM KANAN: TABEL DATA --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-list-ul me-2"></i>Daftar Pejabat
                </h6>
            </div>

            <div class="card-body p-0">

                @if(session('success'))
                    <div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Profil</th>
                                <th>Nama & Jabatan</th>
                                <th>Lokasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($structures as $org)
                            <tr>
                                <td class="ps-4">{{ $loop->iteration }}</td>
                                
                                {{-- Foto --}}
                                <td>
                                    @if($org->photo)
                                        <img src="{{ asset('storage/' . $org->photo) }}" class="rounded-circle border object-fit-cover shadow-sm" width="45" height="45">
                                    @else
                                        <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center text-muted" style="width: 45px; height: 45px">
                                            <i class="bi bi-person fs-5"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- Info --}}
                                <td>
                                    <div class="fw-bold text-dark">{{ $org->name }}</div>
                                    <small class="badge bg-primary bg-opacity-10 text-primary border border-primary rounded-pill">
                                        {{ ucwords(str_replace('_', ' ', $org->position)) }}
                                    </small>
                                </td>

                                {{-- Lokasi --}}
                                <td>
                                    @if($org->faculty)
                                        <span class="text-muted small"><i class="bi bi-building me-1"></i> {{ $org->faculty->name }}</span>
                                    @else
                                        <span class="text-muted small"><i class="bi bi-bank me-1"></i> Universitas</span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="text-center">
                                    <div class="btn-group">
                                        {{-- <a href="{{ route('admin.organization.edit', $org->id) }}" class="btn btn-sm btn-light text-primary border" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a> --}}
                                        <form onsubmit="return confirm('Hapus data pejabat ini?');" 
                                              action="{{ route('admin.organization.destroy', $org->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger border" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-people fs-1 d-block mb-2"></i>
                                    Belum ada data.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- SCRIPT TOGGLE FAKULTAS --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const select = document.getElementById('category_select_create');
        const wrapper = document.getElementById('faculty_wrapper_create');

        function toggle() {
            if(select.value === 'pimpinan_univ') {
                wrapper.style.display = 'none';
            } else {
                wrapper.style.display = 'block';
            }
        }
        select.addEventListener('change', toggle);
        toggle(); // run on load
    });
</script>

@endsection