

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    
    <h1 class="mt-4">Manajemen Badge & Gelar</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
        <li class="breadcrumb-item active">Badges</li>
    </ol>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 card-title"><i class="bi bi-plus-circle me-2"></i>Tambah Baru</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.badges.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Badge / Gelar</label>
                            <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   placeholder="Contoh: Terakreditasi Unggul" required>
                            <div class="form-text text-muted">
                                Masukkan nama pencapaian atau slogan singkat.
                            </div>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Badge
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-award me-2"></i>Daftar Badge Aktif</h5>
                        <span class="badge bg-secondary rounded-pill"><?php echo e($badges->count()); ?> Total</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama Badge</th>
                                    <th class="text-center" style="width: 20%">Status</th>
                                    <th class="text-end" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td>
                                            <span class="fw-semibold"><?php echo e($badge->name); ?></span>
                                        </td>
                                        <td class="text-center">
                                            
                                            <form action="<?php echo e(route('admin.badges.toggle', $badge->id)); ?>" method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <button type="submit" 
                                                        class="btn btn-sm <?php echo e($badge->is_active ? 'btn-outline-success' : 'btn-outline-secondary'); ?> rounded-pill px-3"
                                                        title="Klik untuk ubah status">
                                                    <?php if($badge->is_active): ?>
                                                        <i class="bi bi-eye-fill me-1"></i> Tampil
                                                    <?php else: ?>
                                                        <i class="bi bi-eye-slash-fill me-1"></i> Sembunyi
                                                    <?php endif; ?>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-end">
                                            
                                            <form action="<?php echo e(route('admin.badges.destroy', $badge->id)); ?>" method="POST" class="d-inline" 
                                                  onsubmit="return confirm('Yakin ingin menghapus badge ini secara permanen?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                            Belum ada data badge/gelar.
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\badges\index.blade.php ENDPATH**/ ?>