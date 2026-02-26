
<?php $__env->startSection('title', 'Edit Profil Kampus'); ?>

<?php $__env->startSection('content'); ?>

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


<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('admin.profiles.update', $profile->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="row g-4">
        
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

        
        <div class="col-lg-9">
            <div class="tab-content" id="nav-tabContent">
                
                
                <div class="tab-pane show active" id="stats" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Identitas Visual & Statistik</h6>
                        </div>
                        <div class="card-body p-4">
                            
                            <div class="row mb-5 pb-4 border-bottom">
                                <div class="col-md-3 text-center">
                                    <label class="form-label fw-bold mb-2">Logo Kampus</label>
                                    <div class="mx-auto position-relative bg-light border rounded p-3 d-flex align-items-center justify-content-center" style="width: 150px; height: 150px;">
                                        <?php if($profile->logo_path): ?>
                                            <img src="<?php echo e(asset('storage/'.$profile->logo_path)); ?>" id="preview-logo-img" class="img-fluid" style="max-height: 100%;">
                                            <div class="text-muted text-center d-none" id="placeholder-logo"></div>
                                        <?php else: ?>
                                            <div class="text-muted text-center" id="placeholder-logo">
                                                <i class="bi bi-shield-fill fs-1"></i>
                                                <div class="small mt-1">No Logo</div>
                                            </div>
                                            <img src="" id="preview-logo-img" class="d-none img-fluid" style="max-height: 100%;">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-9 d-flex flex-column justify-content-center">
                                    <div class="mb-3">
                                        <label for="file-input-logo" class="form-label fw-semibold">Upload Logo Baru</label>
                                        <input type="file" name="logo_path" id="file-input-logo" class="form-control" accept="image/*" onchange="previewImageUniversal('file-input-logo', 'preview-logo-img', 'placeholder-logo')">
                                        <div class="form-text text-muted">Disarankan format PNG (Background Transparan). Ukuran maks 2MB.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 pb-4 border-bottom">
                                <div class="col-md-12 mb-4 text-left">
                                    <label for="campus_name" class="form-label fw-bold mb-2">Nama Kampus</label>
                                    <input type="text" name="campus_name" id="campus_name" value="<?php echo e(old('campus_name', $profile->campus_name ?? '')); ?>" class="form-control" placeholder="Contoh: Universitas Teknologi FutureTech">
                                </div>
                                <div class="col-md-12 mb-4 text-left">
                                    <label for="tagline" class="form-label fw-bold mb-2">Tagline Kampus</label>
                                    <input type="text" name="tagline" id="tagline" value="<?php echo e(old('tagline', $profile->tagline ?? '')); ?>" class="form-control" placeholder="Contoh: Mencetak Generasi Emas Inovatif">
                                </div>
                            </div>

                            
                            <div class="mb-5 pb-4 border-bottom">
                                <label class="form-label fw-bold mb-3">Foto Gedung Utama</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="position-relative overflow-hidden rounded bg-light border shadow-sm" style="height: 300px;">
                                            <?php if($profile->gambar_kampus): ?>
                                                <img src="<?php echo e(asset('storage/'.$profile->gambar_kampus)); ?>" id="preview-kampus-img" class="w-100 h-100 object-fit-cover">
                                                <div id="placeholder-kampus" class="d-none"></div>
                                            <?php else: ?>
                                                <div class="d-flex align-items-center justify-content-center h-100 text-muted" id="placeholder-kampus">
                                                    <div class="text-center">
                                                        <i class="bi bi-image fs-1 d-block mb-2"></i>
                                                        <span class="small">Belum ada foto</span>
                                                    </div>
                                                </div>
                                                <img src="" id="preview-kampus-img" class="d-none w-100 h-100 object-fit-cover">
                                            <?php endif; ?>
                                        </div>
                                        <label for="file-input-kampus" class="btn btn-outline-primary w-100 mt-2">Pilih Foto Gedung</label>
                                        <input type="file" name="gambar_kampus" id="file-input-kampus" class="d-none" accept="image/*" onchange="previewImageUniversal('file-input-kampus', 'preview-kampus-img', 'placeholder-kampus')">
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <div class="alert alert-info border-0 bg-info-subtle text-info-emphasis w-100">
                                            <i class="bi bi-info-circle-fill me-2"></i> Foto ini akan ditampilkan besar di halaman depan bagian "Mengenal Lebih Dekat". Gunakan foto gedung terbaik yang resolusinya tinggi. Dengan maksimal size foto 2MB. Format yang disarankan adalah JPG atau PNG. Pastikan foto mewakili identitas kampus dengan baik!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label fw-semibold">Tahun Beroperasi</label><input type="text" name="tahun_beroperasi" class="form-control" value="<?php echo e(old('tahun_beroperasi', $profile->tahun_beroperasi)); ?>"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold">Total Program Studi</label><input type="text" name="total_prodi" class="form-control" value="<?php echo e(old('total_prodi', $profile->total_prodi)); ?>"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold">Total Alumni</label><input type="text" name="total_alumni" class="form-control" value="<?php echo e(old('total_alumni', $profile->total_alumni)); ?>"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold">Total Dosen</label><input type="text" name="total_dosen" class="form-control" value="<?php echo e(old('total_dosen', $profile->total_dosen)); ?>"></div>
                                <div class="col-md-6"><label class="form-label fw-semibold">Mahasiswa Aktif</label><input type="text" name="mahasiswa_aktif" class="form-control" value="<?php echo e(old('mahasiswa_aktif', $profile->mahasiswa_aktif)); ?>"></div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="card mt-4 shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-share me-2 text-primary"></i>Social Media Kampus</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">WhatsApp URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-whatsapp text-success"></i></span>
                                        <input type="url" name="whatsapp_url" class="form-control" value="<?php echo e(old('whatsapp_url', $profile->whatsapp_url ?? '')); ?>" placeholder="https://wa.me/1234567890">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Instagram URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-instagram text-danger"></i></span>
                                        <input type="url" name="instagram_url" class="form-control" value="<?php echo e(old('instagram_url', $profile->instagram_url ?? '')); ?>" placeholder="https://instagram.com/kampusgw">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Facebook URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-facebook text-primary"></i></span>
                                        <input type="url" name="facebook_url" class="form-control" value="<?php echo e(old('facebook_url', $profile->facebook_url ?? '')); ?>" placeholder="https://facebook.com/kampusgw">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">YouTube URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-youtube text-danger"></i></span>
                                        <input type="url" name="youtube_url" class="form-control" value="<?php echo e(old('youtube_url', $profile->youtube_url ?? '')); ?>" placeholder="https://youtube.com/c/kampusgw">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Twitter / X URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-twitter-x"></i></span>
                                        <input type="url" name="twitter_url" class="form-control" value="<?php echo e(old('twitter_url', $profile->twitter_url ?? '')); ?>" placeholder="https://twitter.com/kampusgw">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">TikTok URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-tiktok text-dark"></i></span>
                                        <input type="url" name="tiktok_url" class="form-control" value="<?php echo e(old('tiktok_url', $profile->tiktok_url ?? '')); ?>" placeholder="https://tiktok.com/@kampusgw">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
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
                                        <input type="text" name="nama_rektor" class="form-control" value="<?php echo e(old('nama_rektor', $profile->nama_rektor)); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Isi Sambutan</label>
                                        <textarea name="sambutan_rektor" class="form-control summernote"><?php echo e(old('sambutan_rektor', $profile->sambutan_rektor)); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light border-0">
                                        <div class="card-body text-center">
                                            <label class="form-label fw-bold mb-3">Foto Rektor</label>
                                            <div class="mb-3 position-relative overflow-hidden rounded bg-white shadow-sm" style="height: 250px;">
                                                <?php if($profile->foto_rektor): ?>
                                                    <img src="<?php echo e(asset('storage/'.$profile->foto_rektor)); ?>" id="preview-rektor-img" class="w-100 h-100 object-fit-cover">
                                                    <div id="placeholder-rektor" class="d-none"></div>
                                                <?php else: ?>
                                                    <div class="d-flex align-items-center justify-content-center h-100 text-muted" id="placeholder-rektor"><span>No Image</span></div>
                                                    <img src="" id="preview-rektor-img" class="d-none w-100 h-100 object-fit-cover">
                                                <?php endif; ?>
                                            </div>
                                            <label for="file-input-rektor" class="btn btn-sm btn-outline-primary w-100">Upload Foto Baru</label>
                                            <input type="file" name="foto_rektor" id="file-input-rektor" class="d-none" accept="image/*" onchange="previewImageUniversal('file-input-rektor', 'preview-rektor-img', 'placeholder-rektor')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="tab-pane" id="sejarah" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h6 class="m-0 fw-bold text-primary">Sejarah & Video Profil</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Sejarah Singkat Kampus</label>
                                <textarea name="sejarah_kampus" class="form-control summernote"><?php echo e(old('sejarah_kampus', $profile->sejarah_kampus)); ?></textarea>
                            </div>
                            <div class="bg-light p-3 rounded border">
                                <label class="form-label fw-bold"><i class="bi bi-youtube text-danger me-2"></i>Link Video Profil (Youtube)</label>
                                <input type="text" name="link_video_profil" class="form-control" value="<?php echo e(old('link_video_profil', $profile->link_video_profil)); ?>" placeholder="https://youtu.be/ORM-pxgsz5g?si=n30XrfWCEyiFe69H">
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="tab-pane" id="visimisi" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom"><h6 class="m-0 fw-bold text-primary">Visi & Misi</h6></div>
                        <div class="card-body p-4">
                            <div class="mb-4"><label class="form-label fw-bold">Visi</label><textarea name="visi" class="form-control summernote"><?php echo e(old('visi', $profile->visi)); ?></textarea></div>
                            <div><label class="form-label fw-bold">Misi</label><textarea name="misi" class="form-control summernote"><?php echo e(old('misi', $profile->misi)); ?></textarea></div>
                        </div>
                    </div>
                </div>

                
                <div class="tab-pane" id="kontak" role="tabpanel">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3 border-bottom"><h6 class="m-0 fw-bold text-primary">Informasi Kontak & Peta</h6></div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3"><label class="form-label fw-bold">Email</label><input type="email" name="email" class="form-control" value="<?php echo e(old('email', $profile->email)); ?>" placeholder="example@emali.com"></div>
                                <div class="col-md-6 mb-3"><label class="form-label fw-bold">No. Telepon</label><input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $profile->phone)); ?>" placeholder="0812345678"></div>
                                <div class="col-12 mb-4">
                                    <label class="form-label fw-bold">Alamat Lengkap</label>
                                    <textarea name="address" id="address" class="form-control" rows="3" placeholder="Jakarta indonesia "><?php echo e(old('address', $profile->address)); ?></textarea>
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

    
    <div style="height: 100px;"></div>
</form>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({ 
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });

    // 1 Fungsi Universal untuk handle semua preview file lu (Logo, Kampus, Rektor)
    function previewImageUniversal(inputId, imgId, placeholderId) {
        const fileInput = document.getElementById(inputId);
        const previewImg = document.getElementById(imgId);
        const placeholder = document.getElementById(placeholderId);
        
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

    // Fungsi Test Peta yang udah dibenerin link URL-nya
    function checkMap() {
        var namaKampus = document.getElementById('campus_name').value;
        var alamat = document.getElementById('address').value;
        
        if (namaKampus && alamat) {
            // Encode biar aman dari karakter aneh dan spasi
            var query = encodeURIComponent(namaKampus + ' ' + alamat);
            // Pakai link search map resmi Google
            window.open('https://www.google.com/maps/search/?api=1&query=' + query, '_blank');
        } else {
            alert('Isi Nama Kampus (di tab Statistik) dan Alamat Lengkap dulu Bro!');
        }
    }
</script>

<style>
    .list-group-item.active { background-color: #f8f9fa !important; color: #0d6efd !important; border-left: 4px solid #0d6efd !important; border-right: 0; }
    .object-fit-cover { object-fit: cover; }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\profile\index.blade.php ENDPATH**/ ?>