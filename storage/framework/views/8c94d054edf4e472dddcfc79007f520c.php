

<?php $__env->startSection('content'); ?>
<div class="container py-5" style="margin-top: 80px;">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-light p-3 rounded-pill shadow-sm px-4" style="--bs-breadcrumb-divider: '›';">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted"><i class="bi bi-house-door me-1"></i> Home</a></li>
                    <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page"><?php echo e($page->title); ?></li>
                </ol>
            </nav>

            <header class="mb-5 text-center">
                <h1 class="display-4 fw-extrabold text-dark mb-3" style="letter-spacing: -1px;"><?php echo e($page->title); ?></h1>
                <div class="mx-auto bg-primary rounded-pill" style="width: 60px; height: 5px;"></div>
            </header>

            <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5">
                    <article class="page-content text-secondary" style="line-height: 1.8; font-size: 1.1rem;">
                        <?php echo $page->content; ?>

                    </article>
                </div>
            </div>

            <div class="mt-5 text-center">
                <a href="javascript:history.back()" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="bi bi-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styling untuk elemen di dalam <?php echo $page->content; ?> */
    .page-content h2, .page-content h3 {
        color: #212529;
        margin-top: 2rem;
        font-weight: 700;
    }
    .page-content p {
        margin-bottom: 1.5rem;
    }
    .page-content img {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        margin: 20px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\frontend\pages\show.blade.php ENDPATH**/ ?>