
<?php $__env->startSection('content'); ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h6 class="fw-bold text-primary m-0">Kelola Halaman Statis</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul Halaman</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($page->title); ?></td>
                    <td><code>/p/<?php echo e($page->slug); ?></code></td>
                    <td>
                        <a href="<?php echo e(route('admin.pages.edit', $page->id)); ?>" class="btn btn-sm btn-warning">Edit Isi</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>