<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Dashboard</h1>
        <p class="text-muted">Selamat datang kembali, Admin! Berikut ringkasan aktivitas kampus hari ini.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span> Minggu Ini
        </button>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Fakultas</h6>
                        <h2 class="display-6 fw-bold mb-0"><?php echo e($facultyCount); ?></h2>
                    </div>
                    <i class="bi bi-building fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-primary border-0 d-flex align-items-center justify-content-between">
                <a href="#" class="text-white text-decoration-none small stretched-link">Lihat Detail</a>
                <i class="bi bi-chevron-right text-white small"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Program Studi</h6>
                        <h2 class="display-6 fw-bold mb-0"><?php echo e($prodiCount); ?></h2>
                    </div>
                    <i class="bi bi-mortarboard fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-info border-0 d-flex align-items-center justify-content-between">
                <a href="#" class="text-white text-decoration-none small stretched-link">Lihat Detail</a>
                <i class="bi bi-chevron-right text-white small"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Alumni Terdata</h6>
                        <h2 class="display-6 fw-bold mb-0"><?php echo e($alumniCount); ?></h2>
                    </div>
                    <i class="bi bi-people fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-success border-0 d-flex align-items-center justify-content-between">
                <a href="#" class="text-white text-decoration-none small stretched-link">Lihat Database</a>
                <i class="bi bi-chevron-right text-white small"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-dark h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Mitra Kampus</h6>
                        <h2 class="display-6 fw-bold mb-0"><?php echo e($partnerCount); ?></h2>
                    </div>
                    <i class="bi bi-handshake fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-warning border-0 d-flex align-items-center justify-content-between">
                <a href="#" class="text-dark text-decoration-none small stretched-link">Kelola Mitra</a>
                <i class="bi bi-chevron-right text-dark small"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    
    <div class="col-lg-8">
        
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 fw-bold text-primary"><i class="bi bi-newspaper me-2"></i>Berita Terbaru</h5>
                <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Judul Artikel</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <?php if($post->thumbnail): ?>
                                            <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" class="rounded me-3" width="40" height="40" style="object-fit:cover">
                                        <?php else: ?>
                                            <div class="rounded me-3 bg-secondary d-flex align-items-center justify-content-center text-white" style="width:40px; height:40px;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <div class="fw-bold text-dark"><?php echo e(Str::limit($post->title, 40)); ?></div>
                                            <small class="text-muted"><?php echo e($post->published_at?->format('d M Y') ?? 'Draft'); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border"><?php echo e($post->category->name ?? 'Umum'); ?></span></td>
                                <td>
                                    <?php if($post->published_at): ?>
                                        <span class="badge bg-success-subtle text-success">Published</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary-subtle text-secondary">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="<?php echo e(route('admin.posts.edit',$post)); ?>" class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil-square"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada postingan.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 fw-bold text-dark"><i class="bi bi-cloud-arrow-down me-2"></i>Dokumen Publik</h5>
                <a href="<?php echo e(route('admin.download.create')); ?>" class="btn btn-sm btn-primary"><i class="bi bi-upload"></i> Upload</a>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php $__empty_1 = true; $__currentLoopData = $downloads->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3 text-danger fs-4"><i class="bi bi-file-earmark-pdf-fill"></i></div>
                            <div>
                                <h6 class="mb-0 fw-semibold"><?php echo e($item->title); ?></h6>
                                <small class="text-muted"><?php echo e($item->category); ?> &bull; <?php echo e($item->created_at->diffForHumans()); ?></small>
                            </div>
                        </div>
                        <a href="<?php echo e(asset('storage/'.$item->file_path)); ?>" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download"></i></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="text-center text-muted py-3">Tidak ada dokumen terbaru.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <br>
        
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 fw-bold text-dark">
                    <i class="bi bi-award-fill me-2 text-warning"></i>Daftar Akreditasi Program Studi
                </h5>
                
                <a href="<?php echo e(route('admin.accreditations.create')); ?>" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Kelola Data
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="small text-uppercase">
                                <th class="ps-4">Program / Instansi</th>
                                <th class="text-center">Peringkat</th>
                                <th>Lembaga Penerbit</th>
                                <th>Masa Berlaku</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $accreditations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?php echo e($acc->program_name); ?></div>
                                    <small class="text-muted">ID: #ACC-00<?php echo e($acc->id); ?></small>
                                </td>
                                <td class="text-center">
                                    <?php
                                        $badgeColor = match(strtoupper($acc->level)) {
                                            'A', 'UNGGUL' => 'bg-success',
                                            'B', 'BAIK SEKALI' => 'bg-primary',
                                            default => 'bg-secondary'
                                        };
                                    ?>
                                    <span class="badge <?php echo e($badgeColor); ?> px-3 py-2 text-uppercase">
                                        <?php echo e($acc->level); ?>

                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted"><i class="bi bi-patch-check me-1"></i><?php echo e($acc->issued_by ?? 'BAN-PT'); ?></span>
                                </td>
                                <td>
                                    <?php if($acc->valid_until): ?>
                                        <?php if(\Carbon\Carbon::parse($acc->valid_until)->isPast()): ?>
                                            <span class="text-danger small fw-bold">
                                                <i class="bi bi-exclamation-triangle-fill me-1"></i>Kadaluwarsa
                                            </span>
                                        <?php else: ?>
                                            <span class="text-dark small">
                                                <?php echo e(\Carbon\Carbon::parse($acc->valid_until)->format('d M Y')); ?>

                                            </span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="badge bg-light text-success border border-success-subtle">Seumur Hidup</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        
                                        <form action="<?php echo e(route('admin.accreditations.destroy', $acc->id)); ?>" method="POST" onsubmit="return confirm('Hapus data akreditasi ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder2-open d-block fs-2 mb-2"></i>
                                    <span class="small">Belum ada data akreditasi yang tersimpan.</span>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if($accreditations->count() > 5): ?>
            <div class="card-footer bg-white text-center py-2">
                <small class="text-muted">Menampilkan data akreditasi terbaru.</small>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-4">
        
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="m-0 fw-bold"><i class="bi bi-megaphone me-2"></i>Status PMB</h5>
            </div>
            <div class="card-body">
                <?php
                    $activePmb = $pmbInfos->where('is_active', true)->first();
                ?>

                <?php if($activePmb): ?>
                    <div class="text-center py-3">
                        <div class="spinner-grow text-success mb-2" role="status"></div>
                        <h4 class="fw-bold text-success">PENDAFTARAN DIBUKA</h4>
                        <p class="mb-3"><?php echo e($activePmb->title); ?></p>
                        <a href="<?php echo e(route('admin.pmb-info.index')); ?>" class="btn btn-outline-primary w-100">Kelola PMB</a>
                    </div>
                <?php else: ?>
                    <div class="text-center py-3">
                        <i class="bi bi-lock-fill fs-1 text-secondary mb-2"></i>
                        <h4 class="fw-bold text-secondary">TIDAK ADA PERIODE AKTIF</h4>
                        <p class="text-muted mb-3">Silakan buka jalur pendaftaran baru.</p>
                        <a href="<?php echo e(route('admin.pmb-info.create')); ?>" class="btn btn-primary w-100">Buka Pendaftaran</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold">Akses Cepat</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('admin.organization.index')); ?>" class="btn btn-outline-dark text-start">
                        <i class="bi bi-person-plus-fill me-2"></i> Tambah Dosen/Staff
                    </a>
                    <a href="<?php echo e(route('admin.facilities.create')); ?>" class="btn btn-outline-dark text-start">
                        <i class="bi bi-building-add me-2"></i> Input Fasilitas Baru
                    </a>
                    <a href="<?php echo e(route('admin.accreditations.create')); ?>" class="btn btn-outline-dark text-start">
                        <i class="bi bi-award-fill me-2"></i> Update Akreditasi
                    </a>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold">Struktur Organisasi Terbaru</h6>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <?php $__empty_1 = true; $__currentLoopData = $structures->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="list-group-item d-flex align-items-center">
                        <img src="<?php echo e(asset('storage/'.$staff->photo)); ?>" class="rounded-circle me-3" width="40" height="40" style="object-fit:cover">
                        <div>
                            <h6 class="mb-0 text-sm fw-bold"><?php echo e(Str::limit($staff->name, 20)); ?></h6>
                            <small class="text-muted d-block"><?php echo e($staff->position); ?></small>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-3 text-center text-muted">Belum ada data pegawai.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>