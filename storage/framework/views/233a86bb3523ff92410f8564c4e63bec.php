
<?php $__env->startSection('title', 'Mitra Kampus'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Mitra Kampus</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mitra</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row g-4">
    
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-building-add me-2"></i>Tambah Mitra Baru
                </h6>
            </div>
            <div class="card-body">
                
                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger small p-2">
                        <ul class="mb-0 ps-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('admin.partners.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Instansi/Mitra</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: PT. Telkom Indonesia" value="<?php echo e(old('name')); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Logo Mitra</label>
                        <div class="input-group">
                            <input type="file" name="logo" class="form-control" accept="image/*" required>
                            <label class="input-group-text"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Format: PNG/JPG (Transparan lebih baik).</div>
                    </div>

                    <button class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle me-1"></i> Simpan Mitra
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-list-check me-2"></i>Daftar Mitra Kerja Sama
                </h6>
            </div>
            
            <div class="card-body p-0">
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" width="5%">No</th>
                                <th width="20%">Logo</th>
                                <th>Nama Mitra</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $mitras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-4"><?php echo e($loop->iteration); ?></td>
                                
                                
                                <td>
                                    <?php if($m->logo): ?>
                                        <div class="p-1 border rounded bg-light d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 60px;">
                                            <img src="<?php echo e(asset('storage/'.$m->logo)); ?>" class="img-fluid" style="max-height: 50px;">
                                        </div>
                                    <?php else: ?>
                                        <span class="text-muted small">No Image</span>
                                    <?php endif; ?>
                                </td>

                                
                                <td>
                                    <span class="fw-bold text-dark"><?php echo e($m->name); ?></span>
                                </td>

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.partners.edit', $m->id)); ?>" class="btn btn-sm btn-light text-primary border" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.partners.destroy', $m->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus mitra ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-sm btn-light text-danger border" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-building-slash fs-1 d-block mb-2"></i>
                                    Belum ada data mitra.
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
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/partners/index.blade.php ENDPATH**/ ?>