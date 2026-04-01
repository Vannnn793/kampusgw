
<?php $__env->startSection('title', 'Edit Pejabat'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Data Pejabat</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.organization.index')); ?>" class="text-decoration-none">Organisasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="<?php echo e(route('admin.organization.index')); ?>" class="btn btn-outline-secondary btn-sm">
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

                <form action="<?php echo e(route('admin.organization.update', $organization->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Lengkap & Gelar</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person-badge"></i></span>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $organization->name)); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Kategori Jabatan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-briefcase"></i></span>
                                <select name="position" id="category_select" class="form-select" required>
                                    <option value="dosen" <?php echo e(old('position', $organization->position) == 'dosen' ? 'selected' : ''); ?>>Dosen Pengajar</option>
                                    <option value="pimpinan_fakultas" <?php echo e(old('position', $organization->position) == 'pimpinan_fakultas' ? 'selected' : ''); ?>>Pimpinan Fakultas</option>
                                    <option value="pimpinan_univ" <?php echo e(old('position', $organization->position) == 'pimpinan_univ' ? 'selected' : ''); ?>>Pimpinan Universitas</option>
                                    <option value="staff" <?php echo e(old('position', $organization->position) == 'staff' ? 'selected' : ''); ?>>Staff Tata Usaha</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-md-6 mb-3" id="faculty_wrapper">
                            <label class="form-label small fw-bold text-muted">Unit / Fakultas</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                                <select name="faculty_id" class="form-select">
                                    <option value="">-- Pilih Fakultas --</option>
                                    <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($faculty->id); ?>" <?php echo e(old('faculty_id', $organization->faculty_id) == $faculty->id ? 'selected' : ''); ?>>
                                            Fakultas <?php echo e($faculty->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Foto Profil</label>
                        
                        
                        <div class="d-flex align-items-center mb-2 p-2 border rounded bg-light">
                            <?php if($organization->photo): ?>
                                <img src="<?php echo e(asset('storage/' . $organization->photo)); ?>" class="rounded-circle me-3" width="60" height="60" style="object-fit: cover">
                                <div>
                                    <small class="d-block text-dark fw-bold">Foto Saat Ini</small>
                                    <small class="text-muted">Upload baru untuk mengganti</small>
                                </div>
                            <?php else: ?>
                                <div class="rounded-circle bg-secondary me-3 d-flex align-items-center justify-content-center text-white" style="width: 60px; height: 60px">
                                    <i class="bi bi-person"></i>
                                </div>
                                <small class="text-muted">Belum ada foto</small>
                            <?php endif; ?>
                        </div>

                        <div class="input-group">
                            <input type="file" name="photo" class="form-control" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-upload"></i></label>
                        </div>
                    </div>

                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Urutan Tampil</label>
                        <div class="input-group" style="max-width: 150px;">
                            <span class="input-group-text bg-light"><i class="bi bi-sort-numeric-down"></i></span>
                            <input type="number" name="order" class="form-control" value="<?php echo e(old('order', $organization->order)); ?>">
                        </div>
                    </div>

                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                        </button>
                        <a href="<?php echo e(route('admin.organization.index')); ?>" class="btn btn-light px-4">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th class="ps-4">No</th>
                <th>Profil</th>
                <th>Nama & Jabatan</th>
                <th>Penempatan</th>
                <th>Urutan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="ps-4"><?php echo e($loop->iteration); ?></td>
                
                
                <td>
                    <?php if($org->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $org->photo)); ?>" class="rounded-circle border" width="40" height="40" style="object-fit: cover">
                    <?php else: ?>
                        <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px">
                            <i class="bi bi-person"></i>
                        </div>
                    <?php endif; ?>
                </td>

                
                <td>
                    <div class="fw-bold text-dark"><?php echo e($org->name); ?></div>
                    <span class="badge bg-info bg-opacity-10 text-info border border-info rounded-pill fw-normal">
                        <?php echo e(ucwords(str_replace('_', ' ', $org->position))); ?>

                    </span>
                </td>

                
                <td>
                    <?php if($org->faculty): ?>
                        <span class="text-muted small"><i class="bi bi-building me-1"></i> Fak. <?php echo e($org->faculty->name); ?></span>
                    <?php else: ?>
                        <span class="text-muted small"><i class="bi bi-bank me-1"></i> Universitas</span>
                    <?php endif; ?>
                </td>

                <td><?php echo e($org->order); ?></td>

                
                <td class="text-center">
                    <div class="btn-group">
                        
                        
                        <a href="<?php echo e(route('admin.organization.edit', $org->id)); ?>" class="btn btn-sm btn-light text-primary border" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        
                        <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus pejabat ini?');" 
                              action="<?php echo e(route('admin.organization.destroy', $org->id)); ?>" 
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
                <td colspan="6" class="text-center py-5 text-muted">
                    <i class="bi bi-people fs-1 d-block mb-2"></i>
                    Belum ada data struktur organisasi.
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var categorySelect = document.getElementById('category_select');
        var facultyWrapper = document.getElementById('faculty_wrapper');

        function toggleFaculty() {
            if(categorySelect.value === 'pimpinan_univ') {
                facultyWrapper.style.display = 'none';
            } else {
                facultyWrapper.style.display = 'block';
            }
        }

        categorySelect.addEventListener('change', toggleFaculty);
        toggleFaculty(); // Jalankan saat load agar status awal benar
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\organization\edit.blade.php ENDPATH**/ ?>