@extends('admin.layout.main')
@section('title', 'Tambah Fasilitas')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Tambah Fasilitas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.facilities.index') }}" class="text-decoration-none">Fasilitas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Baru</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.facilities.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-building-add me-2"></i>Form Input Fasilitas
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

                <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Nama Fasilitas --}}
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-bold text-muted">Nama Fasilitas <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Laboratorium Komputer" required>
                        </div>
                    </div>

                    {{-- Fakultas (Opsional) --}}
                    <div class="mb-3">
                        <label for="faculty_id" class="form-label small fw-bold text-muted">Milik Fakultas (Opsional)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-bank"></i></span>
                            <select class="form-select" id="faculty_id" name="faculty_id">
                                <option value="">-- Milik Universitas (Umum) --</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                                        Fakultas {{ $faculty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-text small text-muted">
                            <i class="bi bi-info-circle me-1"></i> Kosongkan jika fasilitas ini untuk umum (Semua Fakultas).
                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-3">
                        <label for="image" class="form-label small fw-bold text-muted">Foto Fasilitas</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <label class="input-group-text" for="image"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Format: JPG, PNG. Maksimal 2MB.</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label for="description" class="form-label small fw-bold text-muted">Deskripsi Detail</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Jelaskan kegunaan dan kapasitas fasilitas ini...">{{ old('description') }}</textarea>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i> Simpan Data
                        </button>
                        <a href="{{ route('admin.facilities.index') }}" class="btn btn-light px-4">Batal</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection