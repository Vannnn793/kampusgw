@extends('admin.layout.main')
@section('title', 'Edit Profil Kampus')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Profil Kampus</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
            </ol>
        </nav>
    </div>
</div>

{{-- ALERT --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        {{-- KOLOM KIRI: NAVIGASI TABS --}}
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                <div class="card-body p-0">
                    <div class="list-group list-group-flush rounded-3" id="profileTabs" role="tablist">
                        <a class="list-group-item list-group-item-action active py-3 fw-bold" id="rektor-tab" data-bs-toggle="list" href="#rektor" role="tab">
                            <i class="bi bi-person-badge me-2"></i> Sambutan Rektor
                        </a>
                        <a class="list-group-item list-group-item-action py-3 fw-bold" id="sejarah-tab" data-bs-toggle="list" href="#sejarah" role="tab">
                            <i class="bi bi-hourglass-split me-2"></i> Sejarah Kampus
                        </a>
                        <a class="list-group-item list-group-item-action py-3 fw-bold" id="visimisi-tab" data-bs-toggle="list" href="#visimisi" role="tab">
                            <i class="bi bi-bullseye me-2"></i> Visi & Misi
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: KONTEN FORM --}}
        <div class="col-lg-9">
            <div class="tab-content" id="nav-tabContent">
                
                {{-- TAB 1: SAMBUTAN REKTOR --}}
                <div class="tab-pane fade show active" id="rektor" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h6 class="m-0 fw-bold text-primary">Sambutan Rektor</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold small text-muted">Nama Lengkap Rektor</label>
                                        <input type="text" name="nama_rektor" class="form-control" value="{{ old('nama_rektor', $profile->nama_rektor) }}" placeholder="Contoh: Prof. Dr. John Doe">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold small text-muted">Isi Sambutan</label>
                                        <textarea name="sambutan_rektor" class="form-control summernote">{{ old('sambutan_rektor', $profile->sambutan_rektor) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light border-0">
                                        <div class="card-body text-center">
                                            <label class="form-label fw-bold small text-muted mb-3">Foto Rektor</label>
                                            
                                            <div class="mb-3 position-relative">
                                                @if($profile->foto_rektor)
                                                    <img src="{{ asset('storage/'.$profile->foto_rektor) }}" id="preview-img" class="img-fluid rounded shadow-sm" style="max-height: 250px; object-fit: cover;">
                                                @else
                                                    <img src="https://via.placeholder.com/200x250?text=No+Image" id="preview-img" class="img-fluid rounded shadow-sm opacity-50">
                                                @endif
                                            </div>

                                            <input type="file" name="foto_rektor" id="file-input" class="form-control form-control-sm" accept="image/*" onchange="previewImage()">
                                            <div class="form-text small mt-2">Format: JPG/PNG. Maks 2MB.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 2: SEJARAH --}}
                <div class="tab-pane fade" id="sejarah" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h6 class="m-0 fw-bold text-primary">Sejarah & Profil Video</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <label class="form-label fw-bold small text-muted">Sejarah Singkat</label>
                                <textarea name="sejarah_kampus" class="form-control summernote">{{ old('sejarah_kampus', $profile->sejarah_kampus) }}</textarea>
                            </div>
                            
                            <hr class="text-muted">

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted"><i class="bi bi-youtube text-danger me-1"></i> Link Video Profil (Youtube)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted">https://</span>
                                    <input type="text" name="link_video_profil" class="form-control" value="{{ old('link_video_profil', $profile->link_video_profil) }}" placeholder="www.youtube.com/watch?v=...">
                                </div>
                                <div class="form-text">Masukkan link lengkap video Youtube profil kampus.</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 3: VISI MISI --}}
                <div class="tab-pane fade" id="visimisi" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h6 class="m-0 fw-bold text-primary">Visi & Misi Kampus</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="bg-light p-3 rounded border">
                                        <label class="form-label fw-bold text-uppercase text-primary mb-2">Visi</label>
                                        <textarea name="visi" class="form-control summernote">{{ old('visi', $profile->visi) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="bg-light p-3 rounded border">
                                        <label class="form-label fw-bold text-uppercase text-primary mb-2">Misi</label>
                                        <textarea name="misi" class="form-control summernote">{{ old('misi', $profile->misi) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- FIXED SAVE BAR --}}
    <div class="fixed-bottom bg-white border-top shadow py-3 px-4" style="z-index: 1000; left: 250px;"> 
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="text-muted small d-none d-md-inline">
                <i class="bi bi-info-circle me-1"></i> Perubahan akan diterapkan ke website utama setelah disimpan.
            </span>
            <button type="submit" class="btn btn-primary fw-bold px-4 rounded-pill">
                <i class="bi bi-save me-2"></i>Simpan Perubahan
            </button>
        </div>
    </div>
    
    {{-- Spacer agar tombol tidak menutupi konten bawah --}}
    <div style="height: 100px;"></div>

</form>

{{-- STYLES & SCRIPTS --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    /* Styling Navigasi List Group agar terlihat seperti Tabs Samping */
    .list-group-item.active {
        background-color: #0d6efd; /* Primary Color */
        border-color: #0d6efd;
        color: white;
    }
    .list-group-item {
        border-left: 3px solid transparent;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
        border-left: 3px solid #0d6efd;
    }
    
    /* Responsive Save Bar Adjustment */
    @media (max-width: 991.98px) {
        .fixed-bottom { left: 0 !important; }
    }
    /* Fix toolbar summernote agar clean */
    .note-editor .note-toolbar {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi Summernote
        $('.summernote').summernote({
            placeholder: 'Tulis konten detail di sini...',
            tabsize: 2,
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'hr']], // Disederhanakan
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });

    // Preview Image Sederhana
    function previewImage() {
        const fileInput = document.getElementById('file-input');
        const previewImg = document.getElementById('preview-img');
        
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>

@endsection