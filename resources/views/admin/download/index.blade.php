@extends('admin.layout.main')
@section('title', 'Upload Dokumen')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Upload Dokumen</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.download.index') }}" class="text-decoration-none">Download Area</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.download.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-cloud-arrow-up-fill me-2"></i>Form Upload File
                </h6>
            </div>
            
            <div class="card-body">

                {{-- Alert Error Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger small">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.download.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Judul --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Judul Dokumen <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-file-earmark-text"></i></span>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Kalender Akademik 2024" required>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Kategori --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Kategori <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-tags"></i></span>
                                <select name="category" class="form-select" required>
                                    <option value="umum">Umum</option>
                                    <option value="akademik">Akademik</option>
                                    <option value="kemahasiswaan">Kemahasiswaan</option>
                                    <option value="panduan">Panduan</option>
                                </select>
                            </div>
                        </div>

                        {{-- Input File --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">File Dokumen <span class="text-danger">*</span></label>
                            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                            <div class="form-text small text-muted">
                                <i class="bi bi-info-circle me-1"></i> Format: PDF, Word, Excel. Max: 5MB.
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Keterangan (Opsional)</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Tambahkan deskripsi singkat tentang dokumen ini..."></textarea>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-cloud-upload me-1"></i> Upload Sekarang
                        </button>
                        <a href="{{ route('admin.download.index') }}" class="btn btn-light px-4">Batal</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection