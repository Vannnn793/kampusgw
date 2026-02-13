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

                    {{-- Input Group: Fasilitas Unggulan --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted d-block mb-3">
                            Pilih Fitur / Tagline Fasilitas
                        </label>

                        <div class="p-3 bg-light border rounded-3">
                            {{-- Grid Checkbox --}}
                            <div class="row g-3">
                                @foreach($taglines as $tagline)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <label class="position-relative d-block cursor-pointer">
                                            {{-- Logic Checked: 
                                                Cek old() dulu, kalau kosong baru cek apakah variabel $facility ada (untuk mode edit) 
                                            --}}
                                            <input type="checkbox" 
                                                name="taglines[]" 
                                                value="{{ $tagline->id }}" 
                                                class="btn-check" 
                                                id="tagline-{{ $tagline->id }}"
                                                autocomplete="off"
                                                @if(is_array(old('taglines')) && in_array($tagline->id, old('taglines')))
                                                    checked
                                                @elseif(isset($facility) && $facility->taglines->contains($tagline->id))
                                                    checked
                                                @endif>

                                            <label class="btn btn-outline-primary w-100 py-3 px-2 d-flex flex-column align-items-center gap-2 shadow-sm border-2 h-100 justify-content-center" 
                                                for="tagline-{{ $tagline->id }}">
                                                <i class="{{ $tagline->icon }} fs-4"></i>
                                                <span class="small fw-bold" style="font-size: 0.75rem;">{{ $tagline->name }}</span>
                                            </label>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            
                            <p class="text-muted mt-3 mb-0" style="font-size: 0.7rem;">
                                <i class="bi bi-info-circle me-1"></i> Pilih fitur yang tersedia di fasilitas ini (bisa pilih lebih dari satu).
                            </p>
                        </div>
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