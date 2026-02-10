
<?php $__env->startSection('title', 'Kelola Headline Slider'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Headline Slider</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Slider</li>
            </ol>
        </nav>
    </div>
</div>


<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('admin.sliders.update', 1)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 fw-bold text-primary">
                <i class="bi bi-images me-2"></i>Daftar Berita & Slider
            </h6>
            <div class="small text-muted">
                <i class="bi bi-info-circle me-1"></i> Aktifkan switch untuk menampilkan berita di slider utama.
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center py-3" width="10%">Status</th>
                            <th width="15%" class="py-3">Thumbnail</th>
                            <th width="35%" class="py-3">Informasi Berita</th>
                            <th class="py-3">Judul Slider (Opsional)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="<?php echo e($post->is_slider ? 'bg-primary bg-opacity-10' : ''); ?>" id="row-<?php echo e($post->id); ?>">
                            
                            
                            <td class="text-center">
                                <div class="form-check form-switch d-flex justify-content-center">
                                    <input class="form-check-input fs-4" 
                                           type="checkbox" 
                                           name="sliders[<?php echo e($post->id); ?>][active]" 
                                           id="switch-<?php echo e($post->id); ?>"
                                           role="switch"
                                           onchange="toggleRowColor(<?php echo e($post->id); ?>)"
                                           <?php echo e($post->is_slider ? 'checked' : ''); ?>>
                                </div>
                            </td>

                            
                            <td>
                                <div class="position-relative overflow-hidden rounded border" style="width: 80px; height: 50px;">
                                    <?php if($post->thumbnail): ?>
                                        <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" class="w-100 h-100 object-fit-cover">
                                    <?php else: ?>
                                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted small">
                                            No Img
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>

                            
                            <td>
                                <span class="fw-bold d-block text-dark text-truncate" style="max-width: 300px;">
                                    <?php echo e($post->title); ?>

                                </span>
                                <small class="text-muted">
                                    <i class="bi bi-calendar-event me-1"></i> 
                                    <?php echo e($post->created_at ? $post->created_at->format('d M Y') : '-'); ?>

                                </small>
                            </td>

                            
                            <td>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-pencil-square text-muted"></i>
                                    </span>
                                    <input type="text" 
                                           name="sliders[<?php echo e($post->id); ?>][title]" 
                                           class="form-control border-start-0" 
                                           placeholder="Gunakan judul asli..." 
                                           value="<?php echo e($post->slider_title); ?>">
                                </div>
                                <div class="form-text small" style="font-size: 0.75rem;">
                                    Isi jika ingin judul di slider berbeda dengan judul asli.
                                </div>
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-newspaper fs-1 mb-2 d-block"></i>
                                Belum ada berita yang tersedia.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <div class="fixed-bottom bg-white border-top shadow py-3 px-4" style="z-index: 1000; left: 250px;"> 
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="text-muted small">
                <i class="bi bi-exclamation-circle me-1"></i> Jangan lupa simpan setelah mengubah status slider.
            </span>
            <button type="submit" class="btn btn-primary fw-bold px-4 rounded-pill shadow-sm">
                <i class="bi bi-save me-2"></i>Simpan Perubahan Slider
            </button>
        </div>
    </div>
    
    
    <div style="height: 80px;"></div>

</form>


<script>
    function toggleRowColor(id) {
        const row = document.getElementById('row-' + id);
        const checkbox = document.getElementById('switch-' + id);
        
        if (checkbox.checked) {
            row.classList.add('bg-primary', 'bg-opacity-10');
        } else {
            row.classList.remove('bg-primary', 'bg-opacity-10');
        }
    }
</script>

<style>
    .object-fit-cover {
        object-fit: cover;
    }
    /* Responsive adjustment for fixed bottom bar */
    @media (max-width: 991.98px) {
        .fixed-bottom { left: 0 !important; }
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/sliders/index.blade.php ENDPATH**/ ?>