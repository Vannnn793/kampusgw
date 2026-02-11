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
                        <button class="list-group-item list-group-item-action active py-3 fw-bold d-flex align-items-center" 
                            data-bs-toggle="list" data-bs-target="#stats" type="button" role="tab">
                            <i class="bi bi-bar-chart-line fs-5 me-3 text-primary-subtle"></i> Statistik & Gambar
                        </button>

                        <button class="list-group-item list-group-item-action py-3 fw-bold d-flex align-items-center" 
                            data-bs-toggle="list" data-bs-target="#rektor" type="button" role="tab">
                            <i class="bi bi-person-badge fs-5 me-3 text-primary-subtle"></i> Sambutan Rektor
                        </button>
                        
                        <button class="list-group-item list-group-item-action py-3 fw-bold d-flex align-items-center" 
                            data-bs-toggle="list" data-bs-target="#sejarah" type="button" role="tab">
                            <i class="bi bi-hourglass-split fs-5 me-3 text-primary-subtle"></i> Sejarah & Video
                        </button>
                        
                        <button class="list-group-item list-group-item-action py-3 fw-bold d-flex align-items-center" 
                            data-bs-toggle="list" data-bs-target="#visimisi" type="button" role="tab">
                            <i class="bi bi-bullseye fs-5 me-3 text-primary-subtle"></i> Visi & Misi
                        </button>

                        <button class="list-group-item list-group-item-action py-3 fw-bold d-flex align-items-center" 
                            data-bs-toggle="list" data-bs-target="#kontak" type="button" role="tab">
                            <i class="bi bi-geo-alt fs-5 me-3 text-primary-subtle"></i> Kontak & Lokasi
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: KONTEN TABS --}}
        <div class="col-lg-9">
            <div class="tab-content" id="nav-tabContent">
                
                {{-- TAB 1: LOGO, GAMBAR & STATISTIK (TANPA FADE) --}}
                <div class="tab-pane show active" id="stats" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Identitas Visual & Statistik</h6>
                        </div>
                        <div class="card-body p-4">
                            {{-- LOGO SECTION --}}
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
                                        <div class="form-text text-muted">Disarankan format PNG (Background Transparan). Ukuran maks 2MB.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6 pb-4 border-bottom">
                                <div class="col-md-12 mb-4 text-left">
                                    <label for="campus_name" class="form-label fw-bold mb-2">Nama Kampus</label>
                                    <input type="text" name="campus_name" id="campus_name" value="{{ old('campus_name', $profile->campus_name ?? '') }}" class="form-control" placeholder="Contoh: Universitas Teknologi FutureTech">
                                </div>
                                <div class="col-md-12 mb-4 text-left">
                                    <label for="tagline" class="form-label fw-bold mb-2">Tagline Kampus</label>
                                    <input type="text" name="tagline" id="tagline" value="{{ old('tagline', $profile->tagline ?? '') }}" class="form-control" placeholder="Contoh: Mencetak Generasi Emas Inovatif">
                                </div>
                            </div>

                            {{-- GAMBAR KAMPUS --}}
                            <div class="mb-5 pb-4 border-bottom">
                                <label class="form-label fw-bold mb-3">Foto Gedung Utama</label>
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
                                        <label for="file-input-kampus" class="btn btn-outline-primary w-100 mt-2">Pilih Foto Gedung</label>
                                        <input type="file" name="gambar_kampus" id="file-input-kampus" class="d-none" accept="image/*" onchange="previewKampus()">
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <div class="alert alert-info border-0 bg-info-subtle text-info-emphasis w-100">
                                            <i class="bi bi-info-circle-fill me-2"></i>                                 Foto ini akan ditampilkan besar di halaman depan bagian "Mengenal Lebih Dekat". Gunakan foto gedung terbaik yang resolusinya tinggi.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- STATISTIK --}}
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label fw-semibold">Tahun Beroperasi</label><input type="text" name="tahun_beroperasi" class="form-control" value="{{ $profile->tahun_beroperasi }}"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold">Total Program Studi</label><input type="text" name="total_prodi" class="form-control" value="{{ $profile->total_prodi }}"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold">Total Alumni</label><input type="text" name="total_alumni" class="form-control" value="{{ $profile->total_alumni }}"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold">Total Dosen</label><input type="text" name="total_dosen" class="form-control" value="{{ $profile->total_dosen }}"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold">Mahasiswa Aktif</label><input type="text" name="mahasiswa_aktif" class="form-control" value="{{ $profile->mahasiswa_aktif }}"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 2: REKTOR (TANPA FADE) --}}
                <div class="tab-pane" id="rektor" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Edit Sambutan Rektor</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama Lengkap Rektor</label>
                                        <input type="text" name="nama_rektor" class="form-control" value="{{ $profile->nama_rektor }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Isi Sambutan</label>
                                        <textarea name="sambutan_rektor" class="form-control summernote">{{ $profile->sambutan_rektor }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light border-0">
                                        <div class="card-body text-center">
                                            <label class="form-label fw-bold mb-3">Foto Rektor</label>
                                            <div class="mb-3 position-relative overflow-hidden rounded bg-white shadow-sm" style="height: 250px;">
                                                @if($profile->foto_rektor)
                                                    <img src="{{ asset('storage/'.$profile->foto_rektor) }}" id="preview-img" class="w-100 h-100 object-fit-cover">
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center h-100 text-muted" id="placeholder-text"><span>No Image</span></div>
                                                    <img src="" id="preview-img" class="d-none w-100 h-100 object-fit-cover">
                                                @endif
                                            </div>
                                            <label for="file-input" class="btn btn-sm btn-outline-primary w-100">Upload Foto Baru</label>
                                            <input type="file" name="foto_rektor" id="file-input" class="d-none" accept="image/*" onchange="previewImage()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 3: SEJARAH --}}
                <div class="tab-pane" id="sejarah" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Sejarah & Video Profil</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Sejarah Singkat Kampus</label>
                                <textarea name="sejarah_kampus" class="form-control summernote">{{ $profile->sejarah_kampus }}</textarea>
                            </div>
                            <div class="bg-light p-3 rounded border">
                                <label class="form-label fw-bold"><i class="bi bi-youtube text-danger me-2"></i>Link Video Profil (Youtube)</label>
                                <input type="text" name="link_video_profil" class="form-control" value="{{ $profile->link_video_profil }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 4: VISI MISI --}}
                <div class="tab-pane" id="visimisi" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom"><h6 class="m-0 fw-bold text-primary">Visi & Misi</h6></div>
                        <div class="card-body p-4">
                            <div class="mb-4"><label class="form-label fw-bold">Visi</label><textarea name="visi" class="form-control summernote">{{ $profile->visi }}</textarea></div>
                            <div><label class="form-label fw-bold">Misi</label><textarea name="misi" class="form-control summernote">{{ $profile->misi }}</textarea></div>
                        </div>
                    </div>
                </div>

                {{-- TAB 5: KONTAK (DENGAN LOGIC CHECK MAPS LU) --}}
                <div class="tab-pane" id="kontak" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom"><h6 class="m-0 fw-bold text-primary">Informasi Kontak & Peta</h6></div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3"><label class="form-label fw-bold">Email</label><input type="email" name="email" class="form-control" value="{{ $profile->email }}"></div>
                                <div class="col-md-6 mb-3"><label class="form-label fw-bold">No. Telepon</label><input type="text" name="phone" class="form-control" value="{{ $profile->phone }}"></div>
                                <div class="col-12 mb-4">
                                    <label class="form-label fw-bold">Alamat Lengkap</label>
                                    <textarea name="address" id="address" class="form-control" rows="3">{{ $profile->address }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light p-4 rounded border">
                                        <h6 class="fw-bold">Pengaturan Peta Lokasi</h6>
                                        <p class="text-muted small">Titik peta otomatis dari Nama Kampus + Alamat.</p>
                                        <button type="button" onclick="checkMap()" class="btn btn-sm btn-outline-primary bg-white">
                                            <i class="bi bi-geo-alt-fill me-1"></i> Test Buka Peta
                                        </button>
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

{{-- SCRIPTS (GUE MASUKIN SEMUA FUNGSI LU) --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({ height: 250 });

        // Force Bootstrap Tabs working
        var triggerTabList = [].slice.call(document.querySelectorAll('#profileTabs button'))
        triggerTabList.forEach(function (triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)
            triggerEl.addEventListener('click', function (event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    });

    // SEMUA FUNGSI PREVIEW PUNYA LU GUE BALIKIN:
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

    function checkMap() {
        var namaKampus = document.getElementById('campus_name').value;
        var alamat = document.getElementById('address').value;
        if (namaKampus && alamat) {
            var query = encodeURIComponent(namaKampus + ' ' + alamat);
            window.open('http://googleusercontent.com/maps.google.com/maps?q=' + query, '_blank');
        } else {
            alert('Isi Nama Kampus dan Alamat dulu Bro!');
        }
    }
</script>

<style>
    .list-group-item.active { background-color: #f8f9fa !important; color: #0d6efd !important; border-left: 4px solid #0d6efd !important; border-right: 0; }
    .object-fit-cover { object-fit: cover; }
</style>

@endsection