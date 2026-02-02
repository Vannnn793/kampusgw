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

{{-- ALERT NOTIFICATION --}}
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
        {{-- KOLOM KIRI: MENU NAVIGASI TABS --}}
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
                <div class="card-body p-0">
                    <div class="list-group list-group-flush rounded-3" id="profileTabs" role="tablist">
                        
                        {{-- Tab 1: Statistik & Gambar (BARU - SAYA TARUH ATAS BIAR GAMPANG DIEDIT) --}}
                        <a class="list-group-item list-group-item-action active py-3 fw-bold d-flex align-items-center" 
                           id="stats-tab" data-bs-toggle="list" href="#stats" role="tab">
                            <i class="bi bi-bar-chart-line fs-5 me-3 text-primary-subtle"></i> Statistik & Gambar
                        </a>

                        <a class="list-group-item list-group-item-action py-3 fw-bold d-flex align-items-center" 
                           id="rektor-tab" data-bs-toggle="list" href="#rektor" role="tab">
                            <i class="bi bi-person-badge fs-5 me-3 text-primary-subtle"></i> Sambutan Rektor
                        </a>
                        
                        <a class="list-group-item list-group-item-action py-3 fw-bold d-flex align-items-center" 
                           id="sejarah-tab" data-bs-toggle="list" href="#sejarah" role="tab">
                            <i class="bi bi-hourglass-split fs-5 me-3 text-primary-subtle"></i> Sejarah & Video
                        </a>
                        
                        <a class="list-group-item list-group-item-action py-3 fw-bold d-flex align-items-center" 
                           id="visimisi-tab" data-bs-toggle="list" href="#visimisi" role="tab">
                            <i class="bi bi-bullseye fs-5 me-3 text-primary-subtle"></i> Visi & Misi
                        </a>

                        <a class="list-group-item list-group-item-action py-3 fw-bold d-flex align-items-center" 
                           id="kontak-tab" data-bs-toggle="list" href="#kontak" role="tab">
                            <i class="bi bi-geo-alt fs-5 me-3 text-primary-subtle"></i> Kontak & Lokasi
                        </a>

                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: KONTEN TABS --}}
        <div class="col-lg-9">
            <div class="tab-content" id="nav-tabContent">
{{-- TAB 1: LOGO, GAMBAR & STATISTIK (UPDATED) --}}
<div class="tab-pane fade show active" id="stats" role="tabpanel">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="m-0 fw-bold text-primary">Identitas Visual & Statistik</h6>
        </div>
        <div class="card-body p-4">

            {{-- SECTION 1: LOGO KAMPUS (BARU) --}}
            <div class="row mb-5 pb-4 border-bottom">
                <div class="col-md-3 text-center">
                    <label class="form-label fw-bold mb-2">Logo Kampus</label>
                    <div class="mx-auto position-relative bg-light border rounded p-3 d-flex align-items-center justify-content-center" style="width: 150px; height: 150px;">
                        @if($profile->logo_path)
                            <img src="{{ asset('storage/'.$profile->logo_path) }}" id="preview-logo-img" class="img-fluid" style="max-height: 100%;">
                        @else
                            <div class="text-muted text-center" id="placeholder-logo">
                                <i class="bi bi-shield-fill fs-1"></i>
                                <div class="small mt-1">No Logo</div>
                            </div>
                            <img src="" id="preview-logo-img" class="d-none img-fluid" style="max-height: 100%;">
                        @endif
                    </div>
                </div>
                <div class="col-md-9 d-flex flex-column justify-content-center">
                    <div class="mb-3">
                        <label for="file-input-logo" class="form-label fw-semibold">Upload Logo Baru</label>
                        <input type="file" name="logo_path" id="file-input-logo" class="form-control" accept="image/*" onchange="previewLogo()">
                        <div class="form-text text-muted">
                            Disarankan format PNG (Background Transparan). Ukuran maks 2MB.
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- SECTION 2: GAMBAR KAMPUS --}}
            <div class="mb-5">
                <label class="form-label fw-bold mb-3">Foto Gedung Utama (Tampil di Home)</label>
                <div class="row">
                    <div class="col-md-5">
                        <div class="position-relative overflow-hidden rounded bg-light border shadow-sm" style="height: 300px;">
                            @if($profile->gambar_kampus)
                                <img src="{{ asset('storage/'.$profile->gambar_kampus) }}" id="preview-kampus-img" class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 text-muted" id="placeholder-kampus">
                                    <div class="text-center">
                                        <i class="bi bi-image fs-1 d-block mb-2"></i>
                                        <span class="small">Belum ada foto</span>
                                    </div>
                                </div>
                                <img src="" id="preview-kampus-img" class="d-none w-100 h-100 object-fit-cover">
                            @endif
                        </div>
                        <label for="file-input-kampus" class="btn btn-outline-primary w-100 mt-2">
                            <i class="bi bi-upload me-1"></i> Pilih Foto Gedung
                        </label>
                        <input type="file" name="gambar_kampus" id="file-input-kampus" class="d-none" accept="image/*" onchange="previewKampus()">
                        <div class="form-text small text-center mt-1">Format: JPG/PNG. Rasio Portrait (Tinggi) disarankan.</div>
                    </div>
                    <div class="col-md-7 d-flex align-items-center">
                        <div class="alert alert-info border-0 bg-info-subtle text-info-emphasis w-100">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            Foto ini akan ditampilkan besar di halaman depan bagian "Mengenal Lebih Dekat". Gunakan foto gedung terbaik yang resolusinya tinggi.
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-secondary-subtle my-4">

            {{-- SECTION 3: ANGKA STATISTIK --}}
            <h6 class="fw-bold mb-3 text-secondary">Data Statistik (Angka)</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tahun Beroperasi</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-calendar-check"></i></span>
                        <input type="text" name="tahun_beroperasi" class="form-control" value="{{ old('tahun_beroperasi', $profile->tahun_beroperasi) }}" placeholder="Contoh: 15+">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Total Program Studi</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-mortarboard"></i></span>
                        <input type="text" name="total_prodi" class="form-control" value="{{ old('total_prodi', $profile->total_prodi) }}" placeholder="Contoh: 11">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Total Alumni</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-people"></i></span>
                        <input type="text" name="total_alumni" class="form-control" value="{{ old('total_alumni', $profile->total_alumni) }}" placeholder="Contoh: 3000+">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Total Dosen & Staf</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-person-workspace"></i></span>
                        <input type="text" name="total_dosen" class="form-control" value="{{ old('total_dosen', $profile->total_dosen) }}" placeholder="Contoh: 100+">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
                {{-- TAB 2: SAMBUTAN REKTOR --}}
                <div class="tab-pane fade" id="rektor" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Edit Sambutan Rektor</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama Lengkap Rektor</label>
                                        <input type="text" name="nama_rektor" class="form-control" value="{{ old('nama_rektor', $profile->nama_rektor) }}" placeholder="Contoh: Prof. Dr. John Doe">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Isi Sambutan</label>
                                        <textarea name="sambutan_rektor" class="form-control summernote">{{ old('sambutan_rektor', $profile->sambutan_rektor) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light border-0 h-100">
                                        <div class="card-body text-center">
                                            <label class="form-label fw-bold mb-3">Foto Rektor</label>
                                            
                                            <div class="mb-3 position-relative overflow-hidden rounded bg-white shadow-sm" style="min-height: 200px;">
                                                @if($profile->foto_rektor)
                                                    <img src="{{ asset('storage/'.$profile->foto_rektor) }}" id="preview-img" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center h-100 text-muted" id="placeholder-text" style="height: 250px;">
                                                        <span class="small">No Image Uploaded</span>
                                                    </div>
                                                    <img src="" id="preview-img" class="d-none img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
                                                @endif
                                            </div>

                                            <label for="file-input" class="btn btn-sm btn-outline-primary w-100">
                                                <i class="bi bi-upload me-1"></i> Upload Foto Baru
                                            </label>
                                            <input type="file" name="foto_rektor" id="file-input" class="d-none" accept="image/*" onchange="previewImage()">
                                            <div class="form-text small mt-2">Format: JPG/PNG. Maks 2MB. Rasio Potrait.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 3: SEJARAH --}}
                <div class="tab-pane fade" id="sejarah" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Sejarah & Video Profil</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Sejarah Singkat Kampus</label>
                                <textarea name="sejarah_kampus" class="form-control summernote">{{ old('sejarah_kampus', $profile->sejarah_kampus) }}</textarea>
                            </div>
                            
                            <div class="bg-light p-3 rounded border">
                                <label class="form-label fw-bold"><i class="bi bi-youtube text-danger me-2"></i>Link Video Profil (Youtube)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-muted">https://</span>
                                    <input type="text" name="link_video_profil" class="form-control" value="{{ old('link_video_profil', $profile->link_video_profil) }}" placeholder="www.youtube.com/watch?v=...">
                                </div>
                                <div class="form-text">Pastikan link video bersifat publik.</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 4: VISI MISI --}}
                <div class="tab-pane fade" id="visimisi" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Visi & Misi Kampus</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label class="form-label fw-bold text-uppercase text-primary">Visi</label>
                                <textarea name="visi" class="form-control summernote">{{ old('visi', $profile->visi) }}</textarea>
                            </div>
                            <div>
                                <label class="form-label fw-bold text-uppercase text-primary">Misi</label>
                                <textarea name="misi" class="form-control summernote">{{ old('misi', $profile->misi) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 5: KONTAK & LOKASI --}}
                <div class="tab-pane fade" id="kontak" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Informasi Kontak & Peta</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email Resmi</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $profile->email) }}" placeholder="info@kampusgw.ac.id">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">No. Telepon / WhatsApp</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}" placeholder="(021) 12345678">
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <label class="form-label fw-bold">Alamat Lengkap</label>
                                    <textarea name="address" class="form-control" rows="3" placeholder="Jl. Raya Kampus No. 1...">{{ old('address', $profile->address) }}</textarea>
                                </div>

                                <div class="col-12">
                                    <div class="bg-light p-3 rounded border">
                                        <label class="form-label fw-bold mb-2">Google Maps Embed (Iframe)</label>
                                        <textarea name="gmaps_iframe" class="form-control font-monospace small text-muted mb-2" rows="3" placeholder='<iframe src="https://www.google.com/maps/embed?..."></iframe>'>{{ old('gmaps_iframe', $profile->gmaps_iframe) }}</textarea>
                                        
                                        <a href="https://www.google.com/maps" target="_blank" class="text-decoration-none small text-primary mb-3 d-inline-block">
                                            <i class="bi bi-box-arrow-up-right me-1"></i> Buka Google Maps untuk ambil kode
                                        </a>

                                        @if($profile->gmaps_iframe)
                                            <div class="ratio ratio-21x9 rounded overflow-hidden shadow-sm border mt-2 bg-white">
                                                {!! $profile->gmaps_iframe !!}
                                            </div>
                                        @endif
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
    <div class="fixed-bottom bg-white border-top shadow py-3" style="z-index: 1050;">
        <div class="container-fluid px-4 d-flex justify-content-end align-items-center">
            <div class="me-auto d-none d-md-block text-muted small">
                <i class="bi bi-info-circle me-1"></i> Jangan lupa simpan setelah mengedit data di tab manapun.
            </div>
            <a href="/dashboard" class="btn btn-light border me-2 fw-semibold">Batal</a>
            <button type="submit" class="btn btn-primary fw-bold px-4 rounded-pill">
                <i class="bi bi-save me-2"></i>Simpan Perubahan
            </button>
        </div>
    </div>

    {{-- SPACER --}}
    <div style="height: 100px;"></div>
</form>

{{-- STYLES & SCRIPTS --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    /* Styling List Group Active State */
    .list-group-item.active {
        background-color: #f8f9fa;
        color: #0d6efd;
        border-color: #f8f9fa;
        border-left: 4px solid #0d6efd;
    }
    .list-group-item {
        border: none;
        border-left: 4px solid transparent;
        color: #6c757d;
        transition: all 0.2s;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
        color: #0d6efd;
    }
    .list-group-item .bi {
        transition: color 0.2s;
    }
    .list-group-item.active .bi {
        color: #0d6efd !important;
    }
    .object-fit-cover {
        object-fit: cover;
    }
    
    /* Summernote Clean Look */
    .note-editor.note-frame {
        border-color: #dee2e6;
        border-radius: 0.375rem;
    }
    .note-toolbar {
        background-color: #f8f9fa !important;
        border-bottom: 1px solid #dee2e6 !important;
        border-radius: 0.375rem 0.375rem 0 0;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        // Init Summernote
        $('.summernote').summernote({
            placeholder: 'Ketik konten di sini...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'hr']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });

    // Preview Image Logic (Rektor)
    function previewImage() {
        const fileInput = document.getElementById('file-input');
        const previewImg = document.getElementById('preview-img');
        const placeholder = document.getElementById('placeholder-text');
        
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('d-none');
                if(placeholder) placeholder.classList.add('d-none');
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    // Preview Image Logic (Kampus - BARU)
    function previewKampus() {
        const fileInput = document.getElementById('file-input-kampus');
        const previewImg = document.getElementById('preview-kampus-img');
        const placeholder = document.getElementById('placeholder-kampus');
        
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('d-none');
                if(placeholder) placeholder.classList.add('d-none');
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
    // Preview Image Logic (LOGO - BARU)
function previewLogo() {
    const fileInput = document.getElementById('file-input-logo');
    const previewImg = document.getElementById('preview-logo-img');
    const placeholder = document.getElementById('placeholder-logo');
    
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.classList.remove('d-none');
            if(placeholder) placeholder.classList.add('d-none');
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>

@endsection