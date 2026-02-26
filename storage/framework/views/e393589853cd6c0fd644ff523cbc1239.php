
<?php $__env->startSection('title', 'Manajemen PMB'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">

    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Informasi PMB</h4>
            <small class="text-muted">Kelola jalur & informasi penerimaan mahasiswa baru</small>
        </div>
        <a href="<?php echo e(route('admin.pmb-info.create')); ?>" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jalur PMB
        </a>
    </div>

    
    <div class="card shadow-sm border-0">
        <div class="card-body p-0"> 

            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" width="100">Poster</th>
                            <th>Info Jalur</th>
                            <th width="200">Periode Pendaftaran</th>
                            <th width="120">Status</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $pmbInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="ps-4">
                                <?php if($pmb->image): ?>
                                    <img src="<?php echo e(asset('storage/'.$pmb->image)); ?>"
                                         class="rounded shadow-sm border"
                                         width="70"
                                         height="90"
                                         style="object-fit:cover">
                                <?php else: ?>
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center border" style="width:70px; height:90px;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="fw-bold text-dark"><?php echo e($pmb->title); ?></div>
                                <div class="small text-muted text-truncate" style="max-width: 300px;">
                                    <?php echo e(strip_tags($pmb->content)); ?>

                                </div>
                                <?php if($pmb->registration_link): ?>
                                    <a href="<?php echo e($pmb->registration_link); ?>" target="_blank" class="badge bg-light text-primary text-decoration-none border mt-1">
                                        <i class="bi bi-link-45deg"></i> Link Pendaftaran
                                    </a>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="small">
                                    <span class="text-success fw-bold">Buka:</span> 
                                    <?php echo e($pmb->start_date ? $pmb->start_date->format('d M Y') : '-'); ?>

                                </div>
                                <div class="small">
                                    <span class="text-danger fw-bold">Tutup:</span> 
                                    <?php echo e($pmb->end_date ? $pmb->end_date->format('d M Y') : '-'); ?>

                                </div>
                            </td>

                            <td>
                                <?php if($pmb->is_active): ?>
                                    <span class="badge rounded-pill bg-success px-3">
                                        <i class="bi bi-check-circle me-1"></i> Aktif
                                    </span>
                                <?php else: ?>
                                    <span class="badge rounded-pill bg-secondary px-3">
                                        <i class="bi bi-x-circle me-1"></i> Nonaktif
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <div class="btn-group shadow-sm">
                                    <a href="<?php echo e(route('admin.pmb-info.edit', $pmb->id)); ?>"
                                       class="btn btn-sm btn-outline-warning" title="Edit Data">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="<?php echo e(route('admin.pmb-info.destroy', $pmb->id)); ?>"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus jalur pendaftaran ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-sm btn-outline-danger" title="Hapus Data">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="opacity-25 mb-3">
                                <p class="text-muted mb-0">Belum ada data PMB yang dibuat.</p>
                                <a href="<?php echo e(route('admin.pmb-info.create')); ?>" class="btn btn-sm btn-primary mt-2">Buat Sekarang</a>
                            </td>
                        </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\pmb\index.blade.php ENDPATH**/ ?>