
<?php $__env->startSection('title', 'Berita & Artikel'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Berita & Artikel</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Posts</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row g-4">

    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-pencil-square me-2"></i>Tulis Berita Baru
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

                <form action="<?php echo e(route('admin.posts.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Judul Berita</label>
                        <input name="title" class="form-control" placeholder="Contoh: Mahasiswa Raih Juara 1..." value="<?php echo e(old('title')); ?>" required>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Kategori</label>
                        <select name="category_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                    <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control form-control-sm" accept="image/*">
                        <div class="form-text small text-muted">Format: JPG/PNG, Max: 2MB.</div>
                    </div>

                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Isi Berita</label>
                        <textarea name="content" rows="8" class="form-control" placeholder="Tulis konten berita di sini..." required><?php echo e(old('content')); ?></textarea>
                    </div>

                    <button class="btn btn-primary w-100">
                        <i class="bi bi-send me-1"></i> Publish Berita
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-newspaper me-2"></i>Daftar Berita
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
                                <th>Judul & Info</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-4"><?php echo e($loop->iteration); ?></td>
                                
                                
                                <td>
                                    <?php if($post->thumbnail): ?>
                                        <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" class="rounded border shadow-sm" width="80" height="50" style="object-fit:cover">
                                    <?php else: ?>
                                        <div class="bg-light rounded border d-flex align-items-center justify-content-center text-muted small" style="width: 80px; height: 50px;">
                                            No Img
                                        </div>
                                    <?php endif; ?>
                                </td>

                                
                                <td>
                                    <div class="fw-bold text-dark text-truncate" style="max-width: 300px;"><?php echo e($post->title); ?></div>
                                    <div class="d-flex gap-2 mt-1">
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary rounded-pill fw-normal">
                                            <?php echo e($post->category->name ?? 'Uncategorized'); ?>

                                        </span>
                                        <small class="text-muted">
                                            <i class="bi bi-calendar3 me-1"></i> <?php echo e($post->created_at->format('d M Y')); ?>

                                        </small>
                                    </div>
                                </td>

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.posts.edit', $post->id)); ?>" class="btn btn-sm btn-light text-primary border" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.posts.destroy', $post->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
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
                                    <i class="bi bi-journal-x fs-1 d-block mb-2"></i>
                                    Belum ada berita yang dipublish.
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
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admin\posts\index.blade.php ENDPATH**/ ?>