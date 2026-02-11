@extends('admin.layout.main')

@section('title', 'Panduan Lengkap Administrator')

@section('content')
<div class="container-fluid px-4">
    {{-- HEADER --}}
    <div class="d-flex align-items-center mb-4 mt-2">
        <div class="bg-primary text-white p-3 rounded-4 me-3 shadow-sm">
            <i class="bi bi-book-half fs-3"></i>
        </div>
        <div>
            <h3 class="fw-bold mb-0 text-dark">Pusat Bantuan & Dokumentasi</h3>
            <p class="text-muted mb-0">Panduan teknis operasional portal {{ $profile->campus_name }}</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="row g-0">
                {{-- NAVIGASI KIRI --}}
                <div class="col-md-3 bg-light border-end">
                    <div class="nav flex-column nav-pills p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active text-start py-3 mb-2 fw-bold" id="tab-akademik" data-bs-toggle="pill" data-bs-target="#content-akademik" type="button" role="tab">
                            <i class="bi bi-building-fill me-2"></i> 1. Data Akademik
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-visual" data-bs-toggle="pill" data-bs-target="#content-visual" type="button" role="tab">
                            <i class="bi bi-palette-fill me-2"></i> 2. Visual & Identity
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-marketing" data-bs-toggle="pill" data-bs-target="#content-marketing" type="button" role="tab">
                            <i class="bi bi-newspaper me-2"></i> 3. Berita & Artikel
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-pmb" data-bs-toggle="pill" data-bs-target="#content-pmb" type="button" role="tab">
                            <i class="bi bi-people-fill me-2"></i> 4. PMB & Mahasiswa
                        </button>
                        <button class="nav-link text-start py-3 fw-bold text-danger" id="tab-error" data-bs-toggle="pill" data-bs-target="#content-error" type="button" role="tab">
                            <i class="bi bi-exclamation-octagon-fill me-2"></i> 5. Solusi Error
                        </button>
                    </div>
                </div>

                {{-- KONTEN KANAN --}}
                <div class="col-md-9 bg-white">
                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                        
                        {{-- 1. AKADEMIK --}}
                        <div class="tab-pane fade show active" id="content-akademik" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">Pengelolaan Data Akademik</h4>
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark"><i class="bi bi-check2-circle text-primary me-2"></i>Fakultas & Program Studi</h6>
                                <p class="text-muted">Untuk mengatur struktur pendidikan. Pada kolom <b>Fasilitas</b>, wajib gunakan <b>tombol Enter</b> untuk memisahkan item agar muncul sebagai list di website depan.</p>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark"><i class="bi bi-check2-circle text-primary me-2"></i>Akreditasi</h6>
                                <p class="text-muted">Upload sertifikat (PDF/JPG) dan pilih status (Unggul/A/B/C). Data ini akan otomatis tampil di badge profil prodi.</p>
                            </div>
                        </div>

                        {{-- 2. VISUAL --}}
                        <div class="tab-pane fade" id="content-visual" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">Visual & Identity Website</h4>
                            <div class="table-responsive">
                                <table class="table table-hover border">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Fitur</th>
                                            <th>Rekomendasi Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Slider Banner</td>
                                            <td>1920 x 820 px (High Res)</td>
                                        </tr>
                                        <tr>
                                            <td>Thumbnail Berita</td>
                                            <td>800 x 600 px (Rasio 4:3)</td>
                                        </tr>
                                        <tr>
                                            <td>Ikon Fitur</td>
                                            <td>Gunakan kode <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- 3. MARKETING --}}
                        <div class="tab-pane fade" id="content-marketing" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">Berita & Artikel</h4>
                            <p class="text-muted">Posting berita secara berkala untuk meningkatkan SEO. Pastikan setiap berita memiliki <b>Kategori</b> agar pengunjung mudah mencari informasi prestasi atau kegiatan kampus.</p>
                        </div>

                        {{-- 4. PMB --}}
                        <div class="tab-pane fade" id="content-pmb" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">PMB & Data Mahasiswa</h4>
                            <p class="text-muted">Data pendaftar online masuk ke menu <b>Pendaftar Baru</b>. Anda bisa melakukan export Excel di pojok kanan atas tabel pendaftar untuk keperluan berkas fisik.</p>
                        </div>

                        {{-- 5. ERROR --}}
                        <div class="tab-pane fade" id="content-error" role="tabpanel">
                            <h4 class="fw-bold text-danger mb-4">Pusat Troubleshooting</h4>
                            <div class="alert alert-danger border-0 shadow-sm mb-3">
                                <h6 class="fw-bold small">Error "count() on string"</h6>
                                <p class="mb-0 small">Ini terjadi jika data fasilitas lu masih kosong tapi dipaksa tampil di web depan. Isi minimal 1 data fasilitas di menu CMS.</p>
                            </div>
                            <div class="alert alert-warning border-0 shadow-sm">
                                <h6 class="fw-bold small">Gambar Tidak Muncul?</h6>
                                <p class="mb-0 small text-dark">Buka terminal, ketik: <code>php artisan storage:link</code></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-pills .nav-link {
        color: #495057;
        border-radius: 10px;
        transition: all 0.2s;
    }
    .nav-pills .nav-link.active {
        background-color: #0d6efd;
        color: white;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
    }
    .nav-pills .nav-link:hover:not(.active) {
        background-color: #e9ecef;
    }
    .tab-content h4 {
        border-bottom: 2px solid #f1f1f1;
        padding-bottom: 15px;
    }
    .rounded-4 { border-radius: 1rem !important; }
</style>
@endsection