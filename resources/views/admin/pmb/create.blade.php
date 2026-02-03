@extends('admin.layout.main')
@section('title', 'Tambah Jalur PMB')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Tambah Jalur PMB</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.pmb-info.index') }}" class="text-decoration-none">Info PMB</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Baru</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.pmb-info.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<form action="{{ route('admin.pmb-info.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row g-4">
        
        {{-- KOLOM KIRI: KONTEN UTAMA --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-file-earmark-text me-2"></i>Konten Informasi
                    </h6>
                </div>
                <div class="card-body">
                    
                    {{-- Judul Jalur --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Nama Jalur Masuk <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-lg" placeholder="Contoh: Gelombang 1 - Jalur Prestasi" value="{{ old('title') }}" required>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Lengkap</label>
                        <textarea name="content" class="form-control" rows="12" placeholder="Tuliskan syarat, biaya, dan detail pendaftaran di sini...">{{ old('content') }}</textarea>
                        <div class="form-text small text-muted">
                            <i class="bi bi-info-circle me-1"></i> Tekan Enter untuk membuat paragraf baru. Gunakan (-) untuk poin.
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: PENGATURAN & META --}}
        <div class="col-lg-4">
            
            {{-- Card Status --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-gear me-2"></i>Status Publikasi</h6>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="statusSwitch" checked style="cursor: pointer;">
                        <label class="form-check-label fw-bold text-dark" for="statusSwitch">Buka Pendaftaran</label>
                    </div>
                    <small class="text-muted d-block lh-sm">Jika dimatikan, informasi ini akan disembunyikan dari halaman depan.</small>
                    
                    <hr>

                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        <i class="bi bi-send me-1"></i> Terbitkan Info
                    </button>
                </div>
            </div>

            {{-- Card Gambar & Link --}}
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-images me-2"></i>Media & Tanggal</h6>
                </div>
                <div class="card-body">

                    {{-- Link Pendaftaran --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Link External (Google Form/Sistem PMB)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-link-45deg"></i></span>
                            <input type="url" name="registration_link" class="form-control" placeholder="https://" value="{{ old('registration_link') }}">
                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Tanggal Buka</label>
                            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Tanggal Tutup</label>
                            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                        </div>
                    </div>

                    {{-- Upload Poster --}}
                    <div class="mb-2">
                        <label class="form-label small fw-bold text-muted">Poster / Brosur</label>
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                        <div class="form-text small text-muted">Format: JPG/PNG, Max: 2MB.</div>
                    </div>

                    {{-- Preview Gambar JS --}}
                    <div class="mt-3 text-center d-none" id="imagePreviewBox">
                        <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded border shadow-sm" style="max-height: 200px;">
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>

{{-- SCRIPT PREVIEW GAMBAR --}}
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            var box = document.getElementById('imagePreviewBox');
            output.src = reader.result;
            box.classList.remove('d-none');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection