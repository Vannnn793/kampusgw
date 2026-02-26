
<?php $__env->startSection('title', 'Manajemen Fasilitas'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Data Fasilitas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="<?php echo e(route('admin.facilities.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Tambah Fasilitas
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 fw-bold text-primary"><i class="bi bi-building me-2"></i>Daftar Fasilitas Kampus</h6>
        
        
        <div class="d-none d-md-block" style="width: 250px;">
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control bg-light border-start-0" placeholder="Cari fasilitas...">
            </div>
        </div>
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
                        <th width="15%">Foto</th>
                        <th width="30%">Nama & Lokasi</th>
                        <th width="35%">Deskripsi Singkat</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4"><?php echo e($loop->iteration); ?></td>
                        
                        
                        <td>
                            <?php if($facility->image): ?>
                                <img src="<?php echo e(asset('storage/' . $facility->image)); ?>" 
                                     alt="<?php echo e($facility->name); ?>" 
                                     class="rounded border shadow-sm object-fit-cover" 
                                     width="80" height="60">
                            <?php else: ?>
                                <div class="bg-light rounded border d-flex align-items-center justify-content-center text-muted" style="width: 80px; height: 60px;">
                                    <i class="bi bi-image fs-4"></i>
                                </div>
                            <?php endif; ?>
                        </td>

                        
                        <td>
                            <div class="fw-bold text-dark"><?php echo e($facility->name); ?></div>
                            <?php if($facility->faculty): ?>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill fw-normal">
                                    Fakultas <?php echo e($facility->faculty->name); ?>

                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill fw-normal">
                                    Umum / Universitas
                                </span>
                            <?php endif; ?>
                        </td>

                        
                        <td>
                            <span class="text-muted small">
                                <?php echo e(Str::limit($facility->description, 70, '...')); ?>

                            </span>
                        </td>

                        
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?php echo e(route('admin.facilities.edit', $facility->id)); ?>" class="btn btn-sm btn-light text-primary border" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?');" action="<?php echo e(route('admin.facilities.destroy', $facility->id)); ?>" method="POST" class="d-inline">
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
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-building-dash fs-1 d-block mb-2"></i>
                                <h6 class="fw-bold">Belum ada data fasilitas</h6>
                                <p class="small mb-0">Silakan tambahkan fasilitas baru untuk ditampilkan di website.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        
        
        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\facilities\index.blade.php ENDPATH**/ ?>