@extends('admin.layout.main')
@section('title', 'Edit Pejabat')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Data Pejabat</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.organization.index') }}" class="text-decoration-none">Organisasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.organization.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-pencil-square me-2"></i>Form Perubahan Data
                </h6>
            </div>

            <div class="card-body">

                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger small">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.organization.update', $organization->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    {{-- Nama Lengkap --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Lengkap & Gelar</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person-badge"></i></span>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $organization->name) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Jabatan --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Kategori Jabatan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-briefcase"></i></span>
                                <select name="position" id="category_select" class="form-select" required>
                                    <option value="dosen" {{ old('position', $organization->position) == 'dosen' ? 'selected' : '' }}>Dosen Pengajar</option>
                                    <option value="pimpinan_fakultas" {{ old('position', $organization->position) == 'pimpinan_fakultas' ? 'selected' : '' }}>Pimpinan Fakultas</option>
                                    <option value="pimpinan_univ" {{ old('position', $organization->position) == 'pimpinan_univ' ? 'selected' : '' }}>Pimpinan Universitas</option>
                                    <option value="staff" {{ old('position', $organization->position) == 'staff' ? 'selected' : '' }}>Staff Tata Usaha</option>
                                </select>
                            </div>
                        </div>

                        {{-- Penempatan Fakultas --}}
                        <div class="col-md-6 mb-3" id="faculty_wrapper">
                            <label class="form-label small fw-bold text-muted">Unit / Fakultas</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                                <select name="faculty_id" class="form-select">
                                    <option value="">-- Pilih Fakultas --</option>
                                    @foreach($faculties as $faculty)
                                        <option value="{{ $faculty->id }}" {{ old('faculty_id', $organization->faculty_id) == $faculty->id ? 'selected' : '' }}>
                                            Fakultas {{ $faculty->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Foto --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Foto Profil</label>
                        
                        {{-- Preview Gambar Lama --}}
                        <div class="d-flex align-items-center mb-2 p-2 border rounded bg-light">
                            @if($organization->photo)
                                <img src="{{ asset('storage/' . $organization->photo) }}" class="rounded-circle me-3" width="60" height="60" style="object-fit: cover">
                                <div>
                                    <small class="d-block text-dark fw-bold">Foto Saat Ini</small>
                                    <small class="text-muted">Upload baru untuk mengganti</small>
                                </div>
                            @else
                                <div class="rounded-circle bg-secondary me-3 d-flex align-items-center justify-content-center text-white" style="width: 60px; height: 60px">
                                    <i class="bi bi-person"></i>
                                </div>
                                <small class="text-muted">Belum ada foto</small>
                            @endif
                        </div>

                        <div class="input-group">
                            <input type="file" name="photo" class="form-control" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-upload"></i></label>
                        </div>
                    </div>

                    {{-- Urutan Tampil --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Urutan Tampil</label>
                        <div class="input-group" style="max-width: 150px;">
                            <span class="input-group-text bg-light"><i class="bi bi-sort-numeric-down"></i></span>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $organization->order) }}">
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.organization.index') }}" class="btn btn-light px-4">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- Potongan bagian Tabel di index.blade.php --}}

<div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th class="ps-4">No</th>
                <th>Profil</th>
                <th>Nama & Jabatan</th>
                <th>Penempatan</th>
                <th>Urutan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($organizations as $org)
            <tr>
                <td class="ps-4">{{ $loop->iteration }}</td>
                
                {{-- Foto --}}
                <td>
                    @if($org->photo)
                        <img src="{{ asset('storage/' . $org->photo) }}" class="rounded-circle border" width="40" height="40" style="object-fit: cover">
                    @else
                        <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif
                </td>

                {{-- Nama & Jabatan --}}
                <td>
                    <div class="fw-bold text-dark">{{ $org->name }}</div>
                    <span class="badge bg-info bg-opacity-10 text-info border border-info rounded-pill fw-normal">
                        {{ ucwords(str_replace('_', ' ', $org->position)) }}
                    </span>
                </td>

                {{-- Penempatan --}}
                <td>
                    @if($org->faculty)
                        <span class="text-muted small"><i class="bi bi-building me-1"></i> Fak. {{ $org->faculty->name }}</span>
                    @else
                        <span class="text-muted small"><i class="bi bi-bank me-1"></i> Universitas</span>
                    @endif
                </td>

                <td>{{ $org->order }}</td>

                {{-- TOMBOL AKSI (EDIT & DELETE) --}}
                <td class="text-center">
                    <div class="btn-group">
                        
                        {{-- Tombol Edit --}}
                        <a href="{{ route('admin.organization.edit', $org->id) }}" class="btn btn-sm btn-light text-primary border" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        {{-- Form Hapus --}}
                        <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus pejabat ini?');" 
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
                <td colspan="6" class="text-center py-5 text-muted">
                    <i class="bi bi-people fs-1 d-block mb-2"></i>
                    Belum ada data struktur organisasi.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- JAVASCRIPT LOGIKA DROPDOWN --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var categorySelect = document.getElementById('category_select');
        var facultyWrapper = document.getElementById('faculty_wrapper');

        function toggleFaculty() {
            if(categorySelect.value === 'pimpinan_univ') {
                facultyWrapper.style.display = 'none';
            } else {
                facultyWrapper.style.display = 'block';
            }
        }

        categorySelect.addEventListener('change', toggleFaculty);
        toggleFaculty(); // Jalankan saat load agar status awal benar
    });
</script>

@endsection