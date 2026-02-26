
<?php $__env->startSection('title', 'Edit Fakultas'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Fakultas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.faculties.index')); ?>" class="text-decoration-none">Fasilitas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="<?php echo e(route('admin.faculties.index')); ?>" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-pencil-square me-2"></i>Form Perubahan Data
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

                <form action="<?php echo e(route('admin.faculties.update', $faculty->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $faculty->name)); ?>" required>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Gambar / Logo</label>
                        
                        <div class="mb-2 p-2 border rounded bg-light text-center">
                            <?php if($faculty->image): ?>
                                <img src="<?php echo e(asset('storage/' . $faculty->image)); ?>" class="img-fluid rounded shadow-sm" style="max-height: 150px">
                                <div class="small text-muted mt-1 fst-italic">Gambar saat ini</div>
                            <?php else: ?>
                                <span class="text-muted small">Belum ada gambar yang diupload.</span>
                            <?php endif; ?>
                        </div>

                        <div class="input-group">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3"><?php echo e(old('description', $faculty->description)); ?></textarea>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Visi</label>
                            <textarea name="vision" class="form-control" rows="4"><?php echo e(old('vision', $faculty->vision)); ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Misi</label>
                            <textarea name="mission" class="form-control" rows="4"><?php echo e(old('mission', $faculty->mission)); ?></textarea>
                        </div>
                    </div>

                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i> Update Data
                        </button>
                        <a href="<?php echo e(route('admin.faculties.index')); ?>" class="btn btn-light px-4">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\faculties\edit.blade.php ENDPATH**/ ?>