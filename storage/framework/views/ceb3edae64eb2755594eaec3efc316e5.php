
<?php $__env->startSection('title', 'Edit Prodi & Kurikulum'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Program Studi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.prodis.index')); ?>" class="text-decoration-none">Prodi</a></li>
                <li class="breadcrumb-item active"><?php echo e($prodi->name); ?></li>
            </ol>
        </nav>
    </div>
    <a href="<?php echo e(route('admin.prodis.index')); ?>" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>


<form action="<?php echo e(route('admin.prodis.update', $prodi->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    
    <ul class="nav nav-tabs mb-4" id="mainTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-bold" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-content" type="button" role="tab">
                <i class="bi bi-info-circle me-2"></i>Informasi Umum
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="curriculum-tab" data-bs-toggle="tab" data-bs-target="#curriculum-content" type="button" role="tab">
                <i class="bi bi-journal-bookmark me-2"></i>Kurikulum & Matkul
            </button>
        </li>
    </ul>

    <div class="tab-content" id="mainTabContent">
        
        
        <div class="tab-pane fade show active" id="info-content" role="tabpanel">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-3">Detail Program Studi</h6>
                            
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Nama Prodi</label>
                                <input name="name" class="form-control" value="<?php echo e(old('name', $prodi->name)); ?>" required>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Fakultas</label>
                                <select name="faculty_id" class="form-select" required>
                                    <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($faculty->id); ?>" <?php echo e($prodi->faculty_id == $faculty->id ? 'selected' : ''); ?>>
                                            <?php echo e($faculty->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Deskripsi</label>
                                <textarea name="description" rows="4" class="form-control"><?php echo e(old('description', $prodi->description)); ?></textarea>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Visi / Tujuan (Goal)</label>
                                <textarea name="goal" rows="3" class="form-control"><?php echo e(old('goal', $prodi->goal)); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <h6 class="fw-bold text-primary mb-3 text-start">Gambar Sampul</h6>
                            
                            <?php if($prodi->image): ?>
                                <img src="<?php echo e(asset('storage/'.$prodi->image)); ?>" class="img-fluid rounded mb-3 shadow-sm" style="max-height: 200px">
                            <?php else: ?>
                                <div class="py-4 bg-light rounded mb-3 text-muted border border-dashed">No Image</div>
                            <?php endif; ?>

                            <input type="file" name="image" class="form-control form-control-sm">
                            <div class="form-text small text-start">Upload gambar baru untuk mengganti.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="tab-pane fade" id="curriculum-content" role="tabpanel">
            
            <div class="alert alert-info border-0 shadow-sm d-flex align-items-center mb-3">
                <i class="bi bi-exclamation-circle-fill me-2 fs-5"></i>
                <div>
                    <strong>Perhatian:</strong> Tambah, edit, atau hapus mata kuliah di bawah ini. Klik "Simpan Semua Perubahan" di bagian paling bawah untuk menyimpan.
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    
                    
                    <ul class="nav nav-pills mb-3 gap-1 pb-2 overflow-auto flex-nowrap" id="semesterPills" role="tablist">
                        <?php for($s=1; $s<=8; $s++): ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-sm <?php echo e($s==1 ? 'active' : ''); ?> border" 
                                        id="pill-sem-<?php echo e($s); ?>" 
                                        data-bs-toggle="pill" 
                                        data-bs-target="#pill-content-<?php echo e($s); ?>" 
                                        type="button" role="tab">
                                    Semester <?php echo e($s); ?>

                                </button>
                            </li>
                        <?php endfor; ?>
                    </ul>

                    
                    <div class="tab-content" id="semesterPillsContent">
                        <?php for($s=1; $s<=8; $s++): ?>
                            <?php
                                $existingCourses = $curriculums->where('semester', $s)->first()?->courses ?? collect([]);
                            ?>

                            <div class="tab-pane fade <?php echo e($s==1 ? 'show active' : ''); ?>" id="pill-content-<?php echo e($s); ?>" role="tabpanel">
                                <div class="bg-light p-4 rounded border">
                                    <h6 class="fw-bold text-dark mb-3">Mata Kuliah Semester <?php echo e($s); ?></h6>
                                    
                                    <div id="container-sem-<?php echo e($s); ?>">
                                        <?php $__empty_1 = true; $__currentLoopData = $existingCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="row g-2 mb-2 align-items-center">
                                                <div class="col-md-7 col-8">
                                                    <input type="text" name="courses[<?php echo e($s); ?>][<?php echo e($idx); ?>][name]" class="form-control" value="<?php echo e($course->name); ?>" placeholder="Nama Matkul">
                                                </div>
                                                <div class="col-md-3 col-3">
                                                    <input type="number" name="courses[<?php echo e($s); ?>][<?php echo e($idx); ?>][sks]" class="form-control text-center" value="<?php echo e($course->sks); ?>" placeholder="SKS">
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <button type="button" class="btn btn-danger btn-sm w-100" onclick="this.closest('.row').remove()"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            
                                            <div class="row g-2 mb-2 align-items-center">
                                                <div class="col-md-7 col-8">
                                                    <input type="text" name="courses[<?php echo e($s); ?>][0][name]" class="form-control" placeholder="Nama Matkul">
                                                </div>
                                                <div class="col-md-3 col-3">
                                                    <input type="number" name="courses[<?php echo e($s); ?>][0][sks]" class="form-control text-center" placeholder="SKS">
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <button type="button" class="btn btn-danger btn-sm w-100" onclick="this.closest('.row').remove()"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <button type="button" class="btn btn-outline-primary btn-sm mt-2" onclick="addCourse(<?php echo e($s); ?>)">
                                        <i class="bi bi-plus-lg me-1"></i> Tambah Matkul
                                    </button>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>

                </div>
            </div>
        </div>

    </div>

    
    <div class="fixed-bottom bg-white border-top shadow py-3 px-4" style="z-index: 1000; left: 250px;"> <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="text-muted small">Pastikan semua data sudah benar sebelum menyimpan.</span>
            <button type="submit" class="btn btn-primary fw-bold px-4">
                <i class="bi bi-save me-2"></i>Simpan Semua Perubahan
            </button>
        </div>
    </div>
    
    
    <div style="height: 100px;"></div>

</form>


<script>
    function addCourse(semester) {
        const timestamp = new Date().getTime(); // Unique ID
        const html = `
            <div class="row g-2 mb-2 align-items-center fade-in">
                <div class="col-md-7 col-8">
                    <input type="text" name="courses[${semester}][${timestamp}][name]" class="form-control" placeholder="Nama Matkul Baru">
                </div>
                <div class="col-md-3 col-3">
                    <input type="number" name="courses[${semester}][${timestamp}][sks]" class="form-control text-center" placeholder="SKS">
                </div>
                <div class="col-md-2 col-1">
                    <button type="button" class="btn btn-danger btn-sm w-100" onclick="this.closest('.row').remove()"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        `;
        document.getElementById(`container-sem-${semester}`).insertAdjacentHTML('beforeend', html);
    }
</script>

<style>
    /* Animasi halus */
    .fade-in { animation: fadeIn 0.3s; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(-5px); } to { opacity: 1; transform: translateY(0); } }
    
    /* Responsive adjustment for fixed bottom bar if sidebar exists */
    @media (max-width: 991.98px) {
        .fixed-bottom { left: 0 !important; }
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/prodis/kurikulum.blade.php ENDPATH**/ ?>