

<?php $__env->startSection('title', isset($pmbInfo) ? 'Edit Jalur PMB' : 'Tambah Jalur PMB'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold"><?php echo e(isset($pmbInfo) ? 'Edit Jalur PMB' : 'Tambah Jalur PMB'); ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.pmb-info.index')); ?>" class="text-decoration-none">Info PMB</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(isset($pmbInfo) ? 'Edit Data' : 'Buat Baru'); ?></li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="<?php echo e(route('admin.pmb-info.index')); ?>" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>


<form action="<?php echo e(isset($pmbInfo) ? route('admin.pmb-info.update', $pmbInfo->id) : route('admin.pmb-info.store')); ?>" 
      method="POST" 
      enctype="multipart/form-data">
    
    <?php echo csrf_field(); ?>
    
    <?php if(isset($pmbInfo)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    
    <div class="row g-4">
        
        
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-file-earmark-text me-2"></i>Konten Informasi
                    </h6>
                </div>
                <div class="card-body">
                    
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Nama Jalur Masuk <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-lg" 
                               placeholder="Contoh: Gelombang 1 - Jalur Prestasi" 
                               value="<?php echo e(old('title', $pmbInfo->title ?? '')); ?>" required>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Lengkap</label>
                        <textarea name="content" class="form-control" rows="12" 
                                  placeholder="Tuliskan syarat, biaya, dan detail pendaftaran di sini..."><?php echo e(old('content', $pmbInfo->content ?? '')); ?></textarea>
                        <div class="form-text small text-muted">
                            <i class="bi bi-info-circle me-1"></i> Tekan Enter untuk membuat paragraf baru. Gunakan (-) untuk poin.
                        </div>
                    </div>

                </div>
            </div>
        </div>

        
        <div class="col-lg-4">
            
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-gear me-2"></i>Status Publikasi</h6>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="statusSwitch" 
                               <?php echo e(old('is_active', $pmbInfo->is_active ?? 1) == 1 ? 'checked' : ''); ?> style="cursor: pointer;">
                        <label class="form-check-label fw-bold text-dark" for="statusSwitch">Buka Pendaftaran</label>
                    </div>
                    <small class="text-muted d-block lh-sm">Jika dimatikan, informasi ini akan disembunyikan dari halaman depan.</small>
                    
                    <hr>

                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        <i class="bi bi-check-circle me-1"></i> <?php echo e(isset($pmbInfo) ? 'Simpan Perubahan' : 'Terbitkan Info'); ?>

                    </button>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-images me-2"></i>Media & Tanggal</h6>
                </div>
                <div class="card-body">

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Link External</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-link-45deg"></i></span>
                            <input type="url" name="registration_link" class="form-control" 
                                   placeholder="https://" value="<?php echo e(old('registration_link', $pmbInfo->registration_link ?? '')); ?>">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Tanggal Buka</label>
                            <input type="date" name="start_date" class="form-control" 
                                   value="<?php echo e(old('start_date', isset($pmbInfo->start_date) ? $pmbInfo->start_date->format('Y-m-d') : '')); ?>">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Tanggal Tutup</label>
                            <input type="date" name="end_date" class="form-control" 
                                   value="<?php echo e(old('end_date', isset($pmbInfo->end_date) ? $pmbInfo->end_date->format('Y-m-d') : '')); ?>">
                        </div>
                    </div>

                    
                    <div class="mb-2">
                        <label class="form-label small fw-bold text-muted">Poster / Brosur</label>
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                        <?php if(isset($pmbInfo) && $pmbInfo->image): ?>
                            <div class="form-text small text-info">
                                <i class="bi bi-info-circle"></i> Biarkan kosong jika tidak ingin mengubah gambar.
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    
                    <div class="mt-3 text-center <?php echo e(isset($pmbInfo) && $pmbInfo->image ? '' : 'd-none'); ?>" id="imagePreviewBox">
                        <img id="imagePreview" 
                             src="<?php echo e(isset($pmbInfo) && $pmbInfo->image ? asset('storage/' . $pmbInfo->image) : '#'); ?>" 
                             alt="Preview" class="img-fluid rounded border shadow-sm" style="max-height: 200px;">
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\pmb\create.blade.php ENDPATH**/ ?>