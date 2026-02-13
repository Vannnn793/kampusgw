
<?php $__env->startSection('title', 'Edit Fasilitas'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Fasilitas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.facilities.index')); ?>" class="text-decoration-none">Fasilitas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="<?php echo e(route('admin.facilities.index')); ?>" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-pencil-square me-2"></i>Form Edit Fasilitas
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

                
                <form action="<?php echo e(route('admin.facilities.update', $facility->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Fasilitas <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $facility->name)); ?>" required>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Milik Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-bank"></i></span>
                            <select class="form-select" name="faculty_id">
                                <option value="">-- Milik Universitas (Umum) --</option>
                                <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($faculty->id); ?>" <?php echo e((old('faculty_id', $facility->faculty_id) == $faculty->id) ? 'selected' : ''); ?>>
                                        Fakultas <?php echo e($faculty->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Gambar Fasilitas</label>
                        
                        <div class="mb-2 p-2 border rounded bg-light text-center">
                            <?php if($facility->image): ?>
                                <img src="<?php echo e(asset('storage/' . $facility->image)); ?>" class="img-fluid rounded shadow-sm" style="max-height: 150px">
                                <div class="small text-muted mt-1">Gambar saat ini</div>
                            <?php else: ?>
                                <span class="text-muted fst-italic small">Belum ada gambar</span>
                            <?php endif; ?>
                        </div>

                        <div class="input-group">
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    </div>

                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="4"><?php echo e(old('description', $facility->description)); ?></textarea>
                    </div>
                    
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted d-block mb-3">
                            Pilih Fitur / Tagline Fasilitas
                        </label>

                        <div class="p-3 bg-light border rounded-3">
                            
                            <div class="row g-3">
                                <?php $__currentLoopData = $taglines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <label class="position-relative d-block cursor-pointer">
                                            
                                            <input type="checkbox" 
                                                   name="taglines[]" 
                                                   value="<?php echo e($tagline->id); ?>" 
                                                   class="btn-check" 
                                                   id="tagline-<?php echo e($tagline->id); ?>"
                                                   autocomplete="off"
                                                   <?php if(is_array(old('taglines')) && in_array($tagline->id, old('taglines'))): ?>
                                                       checked
                                                   <?php elseif(isset($facility) && $facility->taglines->contains($tagline->id)): ?>
                                                       checked
                                                   <?php endif; ?>>

                                            <label class="btn btn-outline-primary w-100 py-3 px-2 d-flex flex-column align-items-center gap-2 shadow-sm border-2 h-100 justify-content-center" 
                                                   for="tagline-<?php echo e($tagline->id); ?>">
                                                <i class="<?php echo e($tagline->icon); ?> fs-4"></i>
                                                <span class="small fw-bold" style="font-size: 0.75rem;"><?php echo e($tagline->name); ?></span>
                                                
                                                
                                                <?php if(isset($facility) && $facility->taglines->contains($tagline->id)): ?>
                                                    <i class="bi bi-check-circle-fill position-absolute top-0 end-0 m-1 text-primary" style="font-size: 0.8rem;"></i>
                                                <?php endif; ?>
                                            </label>
                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            
                            <p class="text-muted mt-3 mb-0" style="font-size: 0.7rem;">
                                <i class="bi bi-info-circle me-1"></i> Klik pada kotak untuk menambah atau menghapus fitur fasilitas.
                            </p>
                        </div>
                    </div>

                    
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i> Update Data
                        </button>
                        <a href="<?php echo e(route('admin.facilities.index')); ?>" class="btn btn-light px-4">Batal</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/facilities/edit.blade.php ENDPATH**/ ?>