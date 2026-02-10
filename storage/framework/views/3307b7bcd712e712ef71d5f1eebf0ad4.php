
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
                    
                    
                    <div class="mb-6">
                        <label class="block mb-3 text-sm font-bold text-slate-700">
                            Pilih Fitur / Tagline Fasilitas
                        </label>

                        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
                            
                            
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                
                                <?php $__currentLoopData = $taglines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="relative flex cursor-pointer group">
                                        
                                        
                                        
                                        <input type="checkbox" 
                                            name="taglines[]" 
                                            value="<?php echo e($tagline->id); ?>" 
                                            class="peer sr-only"
                                            <?php if(in_array($tagline->id, old('taglines', $facility->taglines->pluck('id')->toArray() ?? []))): ?> checked <?php endif; ?>
                                        >

                                        
                                        <div class="w-full p-3 bg-white border-2 border-slate-200 rounded-lg transition-all
                                                    peer-checked:border-sky-500 peer-checked:bg-sky-50
                                                    hover:border-slate-300 flex items-center gap-3">
                                            
                                            
                                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 peer-checked:bg-sky-500 peer-checked:text-white transition-colors">
                                                <i class="<?php echo e($tagline->icon); ?>"></i>
                                            </div>
                                            
                                            
                                            <span class="text-sm font-medium text-slate-600 peer-checked:text-sky-700">
                                                <?php echo e($tagline->name); ?>

                                            </span>

                                            
                                            <i class="bi bi-check-circle-fill absolute top-2 right-2 text-sky-500 opacity-0 peer-checked:opacity-100 transition-opacity text-xs"></i>
                                        </div>

                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            
                            <p class="text-xs text-slate-400 mt-3">
                                * Klik pada kotak untuk memilih fitur yang tersedia di fasilitas ini.
                            </p>

                        </div>
                    </div>

                    
                    <div class="d-flex gap-2">
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