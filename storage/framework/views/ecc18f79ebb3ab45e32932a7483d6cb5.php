
<?php $__env->startSection('title', 'Tambah Data Akreditasi'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Manajemen Akreditasi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary"><i class="bi bi-file-earmark-plus me-2"></i>Form Input Akreditasi</h6>
            </div>
            
            <div class="card-body p-4">

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i> <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i> <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('admin.accreditations.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Program Studi <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-mortarboard"></i></span>
                            <select class="form-select <?php $__errorArgs = ['program_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="program_name" required>
                                <option value="" disabled selected>-- Pilih Program Studi --</option>
                                <option value="Kampus" <?php echo e(old('program_name') == 'Kampus' ? 'selected' : ''); ?>>Kampus (Umum)</option>
                                <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->name); ?>" <?php echo e(old('program_name') == $item->name ? 'selected' : ''); ?>>
                                        <?php echo e($item->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-text text-muted">Pilih program studi yang terdaftar di database.</div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Peringkat Akreditasi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-award"></i></span>
                                <input type="text" class="form-control <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       name="level" value="<?php echo e(old('level')); ?>" 
                                       placeholder="Contoh: Unggul, A, Baik Sekali" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Diterbitkan Oleh</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-building-check"></i></span>
                                <input type="text" class="form-control" 
                                       name="issued_by" value="<?php echo e(old('issued_by')); ?>" 
                                       placeholder="Default: BAN-PT / LAM-PTKes">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nomor SK / Sertifikat</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-hash"></i></span>
                                <input type="text" class="form-control" 
                                       name="certificate_number" value="<?php echo e(old('certificate_number')); ?>" 
                                       placeholder="Nomor SK resmi">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Berlaku Sampai</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" class="form-control" 
                                       name="valid_until" value="<?php echo e(old('valid_until')); ?>">
                            </div>
                            <div class="form-text small">Biarkan kosong jika masa berlaku seumur hidup.</div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary px-4">
                            <i class="bi bi-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i> Simpan Data
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/accreditation/create.blade.php ENDPATH**/ ?>