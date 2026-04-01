<?php $__env->startSection('title', 'Manajemen Fakultas'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Data Fakultas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fakultas</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">

    
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Fakultas Baru
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

                <form action="<?php echo e(route('admin.faculties.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Fakultas Teknik" required>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Foto / Logo</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Format: JPG, PNG. Max: 2MB.</div>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Gambaran umum fakultas..."></textarea>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Visi</label>
                        <textarea name="vision" class="form-control" rows="2" placeholder="Visi fakultas..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Misi</label>
                        <textarea name="mission" class="form-control" rows="2" placeholder="Misi fakultas..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save me-1"></i> Simpan Fakultas
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-list-ul me-2"></i>Daftar Fakultas
                </h6>
            </div>

            <div class="card-body p-0">
                
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <i class="bi bi-check-circle me-2"></i> <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" width="5%">No</th>
                                <th width="15%">Logo</th>
                                <th width="35%">Info Fakultas</th>
                                <th width="30%">Visi</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-4"><?php echo e($loop->iteration); ?></td>
                                
                                
                                <td>
                                    <?php if($faculty->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $faculty->image)); ?>" 
                                             class="rounded border object-fit-cover shadow-sm" 
                                             width="60" height="60" alt="Logo">
                                    <?php else: ?>
                                        <div class="bg-light rounded border d-flex align-items-center justify-content-center text-secondary" style="width: 60px; height: 60px;">
                                            <i class="bi bi-building fs-4"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                
                                <td>
                                    <div class="fw-bold text-dark"><?php echo e($faculty->name); ?></div>
                                    <div class="small text-muted"><?php echo e(Str::limit($faculty->description, 50)); ?></div>
                                </td>

                                
                                <td>
                                    <div class="small text-muted fst-italic">
                                        "<?php echo e(Str::limit($faculty->vision, 60, '...')); ?>"
                                    </div>
                                </td>

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        
                                        <a href="<?php echo e(route('admin.faculties.edit', $faculty->id)); ?>" class="btn btn-sm btn-light text-primary border" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        
                                        
                                        <form onsubmit="return confirm('Hapus fakultas ini? Data prodi terkait mungkin akan error.');" 
                                              action="<?php echo e(route('admin.faculties.destroy', $faculty->id)); ?>" 
                                              method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-light text-danger border" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-journal-x fs-1 d-block mb-2"></i>
                                    Belum ada data fakultas.
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
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\faculties\index.blade.php ENDPATH**/ ?>