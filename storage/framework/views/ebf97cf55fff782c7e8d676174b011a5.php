 
<?php $__env->startSection('content'); ?>
<div class="container py-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo e($page->title); ?></li>
                </ol>
            </nav>
            <h1 class="fw-bold text-dark mt-3"><?php echo e($page->title); ?></h1>
            <hr class="mb-5">
            <div class="page-content text-muted" style="line-height: 2;">
                <?php echo $page->content; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/frontend/pages/show.blade.php ENDPATH**/ ?>