<div class="card h-100 shadow-sm border-0">
    <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" class="card-img-top">

    <div class="card-body">
        <small class="text-muted">
            <?php echo e($post->created_at->format('d M Y')); ?>

        </small>

        <h5 class="fw-semibold mt-2">
            <?php echo e(Str::limit($post->title, 60)); ?>

        </h5>

        <a href="#" class="stretched-link text-decoration-none"></a>
    </div>
</div>
<?php /**PATH C:\laragon\www\kampus_anda\resources\views\components\post-card.blade.php ENDPATH**/ ?>