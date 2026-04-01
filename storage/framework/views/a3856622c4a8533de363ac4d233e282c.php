
<?php $__env->startSection('title', 'Edit Mitra'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Mitra</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.partners.index')); ?>" class="text-decoration-none">Mitra</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="<?php echo e(route('admin.partners.index')); ?>" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
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

                <form method="POST" action="<?php echo e(route('admin.partners.update', $partner->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Instansi/Mitra</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $partner->name)); ?>" required>
                        </div>
                    </div>

                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Logo Mitra</label>
                        
                        
                        <div class="p-3 border rounded bg-light mb-2 text-center">
                            <?php if($partner->logo): ?>
                                <img src="<?php echo e(asset('storage/'.$partner->logo)); ?>" class="img-fluid" style="max-height: 100px;">
                                <div class="small text-muted mt-2 fst-italic">Logo saat ini</div>
                            <?php else: ?>
                                <span class="text-muted">Belum ada logo</span>
                            <?php endif; ?>
                        </div>

                        <div class="input-group">
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-upload"></i></label>
                        </div>
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah logo.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i> Update Mitra
                        </button>
                        <a href="<?php echo e(route('admin.partners.index')); ?>" class="btn btn-light px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\partners\edit.blade.php ENDPATH**/ ?>