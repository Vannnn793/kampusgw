
<?php $__env->startSection('title', 'Upload Dokumen'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold text-slate-800">Manajemen Dokumen</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active">Upload & Dokumen Terbaru</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row g-4">
    
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-cloud-arrow-up-fill me-2"></i>Form Upload
                </h6>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger small">
                        <ul class="mb-0 ps-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('admin.download.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Judul Dokumen <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-lg fs-6" placeholder="Judul file..." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Kategori <span class="text-danger">*</span></label>
                        <select name="category" class="form-select" required>
                            <option value="umum">Umum</option>
                            <option value="akademik">Akademik</option>
                            <option value="kemahasiswaan">Kemahasiswaan</option>
                            <option value="panduan">Panduan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">File Dokumen <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Keterangan (Opsional)</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Deskripsi singkat..."></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-2 fw-bold">
                            <i class="bi bi-cloud-upload me-1"></i> Upload Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 fw-bold text-dark">
                    <i class="bi bi-clock-history me-2 text-warning"></i>Baru Saja Diupload
                </h6>
                <a href="<?php echo e(route('admin.download.index')); ?>" class="btn btn-light btn-sm fw-bold">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="small text-uppercase tracking-wider">
                                <th class="ps-4">File</th>
                                <th>Kategori</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $__empty_1 = true; $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light p-2 rounded-3 me-3">
                                            <i class="bi bi-file-earmark-pdf-fill text-danger fs-4"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-slate-700"><?php echo e(Str::limit($dl->title, 30)); ?></div>
                                            <small class="text-muted"><?php echo e($dl->created_at->diffForHumans()); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-soft-primary text-primary border border-primary-subtle rounded-pill px-3">
                                        <?php echo e($dl->category); ?>

                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group">
                                        <a href="<?php echo e(asset('storage/' . $dl->file_path)); ?>" target="_blank" class="btn btn-sm btn-light border" title="Preview">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.download.destroy', $dl->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-light border text-danger" onclick="return confirm('Hapus file?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <img src="https://illustrations.popsy.co/slate/empty-folder.svg" alt="Empty" style="width: 100px;">
                                    <p class="text-muted small mt-3">Belum ada file yang diupload hari ini.</p>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<style>
    .bg-soft-primary { background-color: rgba(13, 110, 253, 0.05); }
    .text-slate-700 { color: #334155; }
</style>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/download/index.blade.php ENDPATH**/ ?>