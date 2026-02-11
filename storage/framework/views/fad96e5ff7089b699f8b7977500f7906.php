<?php $__env->startSection('title', 'Program Studi'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Program Studi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Prodi</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row g-4">

    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-mortarboard-fill me-2"></i>Tambah Prodi Baru
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

                <form method="POST" action="<?php echo e(route('admin.prodis.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Fakultas</label>
                        <select name="faculty_id" class="form-select" required>
                            <option value="">-- Pilih Fakultas --</option>
                            <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($faculty->id); ?>" <?php echo e(old('faculty_id') == $faculty->id ? 'selected' : ''); ?>>
                                    <?php echo e($faculty->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Program Studi</label>
                        <input name="name" class="form-control" placeholder="Contoh: S1 Teknik Informatika" value="<?php echo e(old('name')); ?>" required>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Gambaran umum prodi..."><?php echo e(old('description')); ?></textarea>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Visi / Tujuan (Goal)</label>
                        <textarea name="goal" class="form-control" rows="2" placeholder="Tujuan utama prodi..."><?php echo e(old('goal')); ?></textarea>
                    </div>

                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Cover / Foto Prodi</label>
                        <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
                        <div class="form-text small text-muted">Format: JPG/PNG, Max 2MB.</div>
                    </div>

                    <button class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle me-1"></i> Simpan Prodi
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-list-task me-2"></i>Daftar Program Studi
                </h6>
            </div>
            
            <div class="card-body p-0">
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success m-3 alert-dismissible fade show">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" width="5%">No</th>
                                <th width="15%">Cover</th>
                                <th>Program Studi & Fakultas</th>
                                <th class="text-center" width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $prodis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-4"><?php echo e($loop->iteration); ?></td>
                                
                                
                                <td>
                                    <?php if($prodi->image): ?>
                                        <img src="<?php echo e(asset('storage/'.$prodi->image)); ?>" class="rounded border shadow-sm" width="60" height="40" style="object-fit:cover">
                                    <?php else: ?>
                                        <div class="bg-light rounded border d-flex align-items-center justify-content-center text-muted small" style="width: 60px; height: 40px;">
                                            Img
                                        </div>
                                    <?php endif; ?>
                                </td>

                                
                                <td>
                                    <div class="fw-bold text-dark"><?php echo e($prodi->name); ?></div>
                                    <small class="text-primary">
                                        <i class="bi bi-building me-1"></i> <?php echo e($prodi->faculty->name ?? 'Tanpa Fakultas'); ?>

                                    </small>
                                </td>

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.prodis.edit', $prodi->id)); ?>" class="btn btn-sm btn-light text-primary border" title="Edit Detail & Kurikulum">
                                            <i class="bi bi-pencil-square"></i> Detail
                                        </a>
                                        <form action="<?php echo e(route('admin.prodis.destroy', $prodi->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus prodi ini?')">
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
                                    <i class="bi bi-mortarboard fs-1 d-block mb-2"></i>
                                    Belum ada data Program Studi.
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
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/prodis/index.blade.php ENDPATH**/ ?>