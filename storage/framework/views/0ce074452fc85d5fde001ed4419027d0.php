
<?php $__env->startSection('title', 'Edit Berita'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Berita</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.posts.index')); ?>" class="text-decoration-none">Posts</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<form action="<?php echo e(route('admin.posts.update', $post->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="row g-4">
        
        
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-pencil-square me-2"></i>Konten Berita
                    </h6>
                </div>
                
                <div class="card-body">
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Judul Berita</label>
                        <input type="text" name="title" class="form-control form-control-lg" 
                               value="<?php echo e(old('title', $post->title)); ?>" placeholder="Masukkan judul..." required>
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Isi Artikel</label>
                        
                        <textarea name="content" rows="15" class="form-control" 
                                  placeholder="Tulis konten di sini..."><?php echo e(old('content', $post->content)); ?></textarea>
                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4">
            
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-gear me-2"></i>Publish</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary fw-bold">
                            <i class="bi bi-save me-1"></i> Update Berita
                        </button>
                    </div>
                    <div class="mt-3 text-center">
                        <small class="text-muted">Terakhir diupdate: <?php echo e($post->updated_at->diffForHumans()); ?></small>
                    </div>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-image me-2"></i>Atribut</h6>
                </div>
                <div class="card-body">
                    
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Kategori</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" 
                                    <?php echo e(old('category_id', $post->category_id) == $category->id ? 'selected' : ''); ?>>
                                    <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Thumbnail Saat Ini</label>
                        <div class="border rounded p-2 bg-light text-center mb-2">
                            <?php if($post->thumbnail): ?>
                                <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                            <?php else: ?>
                                <div class="py-4 text-muted small fst-italic">Belum ada gambar</div>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="mb-2">
                        <label class="form-label small fw-bold text-muted">Ganti Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control form-control-sm" accept="image/*">
                        <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/posts/edit.blade.php ENDPATH**/ ?>