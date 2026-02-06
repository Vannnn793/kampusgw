<?php $__env->startSection('title','Program Studi Detail'); ?>
<?php $__env->startSection('content'); ?>



<section class="relative h-[65vh] flex items-center justify-center overflow-hidden">

    <img src="<?php echo e(asset('storage/'.$prodi->image)); ?>"
         class="absolute inset-0 w-full h-full object-cover scale-105"
         alt="<?php echo e($prodi->name); ?>">

    
    <div class="absolute inset-0 bg-white/60"></div>

    <div class="relative text-center max-w-4xl px-6">
        <h1 data-aos="fade-up"
            class="text-5xl font-extrabold text-slate-900">
            <?php echo e($prodi->name); ?>

        </h1>

        <p data-aos="fade-up" data-aos-delay="100"
           class="mt-4 text-slate-700 text-lg">
            <?php echo e($prodi->goal); ?>

        </p>
    </div>

</section>


<section class="py-28 bg-[#9DC7F4]">

<div class="max-w-5xl mx-auto px-6 space-y-16">

    
    <div data-aos="fade-up"
         class="rounded-2xl bg-white border border-slate-200 p-8 shadow">
        <h2 class="text-2xl font-bold mb-4 text-[#1583D7]">
            Deskripsi
        </h2>
        <p class="text-slate-800 leading-relaxed">
            <?php echo e($prodi->description); ?>

        </p>
    </div>

    
    <div data-aos="fade-up"
         class="rounded-2xl bg-white border border-slate-200 p-8 shadow">
        <h2 class="text-2xl font-bold mb-4 text-[#1583D7]">
            Tujuan
        </h2>
        <p class="text-slate-800 leading-relaxed">
            <?php echo e($prodi->goal); ?>

        </p>
    </div>

</div>

</section>


<section class="py-28 bg-white">

<div class="max-w-7xl mx-auto px-6">

<h2 class="text-3xl font-bold mb-16 text-center text-slate-900">
    Kurikulum Program Studi
</h2>

<?php
    $grouped = $prodi->curriculums->groupBy(function ($item) {
        return $item->semester <= 4 ? '1-4' : '5-8';
    });
?>

<?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $curriculums): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="mb-20">

    <h3 class="text-2xl font-bold mb-10 text-[#1583D7] text-center">
        Semester <?php echo e($label); ?>

    </h3>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php $__currentLoopData = $curriculums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curriculum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div data-aos="fade-up"
             class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            
            <div class="bg-[#9DC7F4] px-4 py-3 text-center">
                <span class="block text-xs uppercase tracking-widest text-slate-700">
                    Semester
                </span>
                <span class="text-2xl font-extrabold text-slate-900">
                    <?php echo e($curriculum->semester); ?>

                </span>
            </div>

            
            <table class="w-full text-sm text-slate-800">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="p-3 text-left font-semibold">Mata Kuliah</th>
                        <th class="p-3 text-center font-semibold w-16">SKS</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $curriculum->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t hover:bg-slate-50">
                        <td class="p-3"><?php echo e($course->name); ?></td>
                        <td class="p-3 text-center"><?php echo e($course->sks); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
</section>


<section class="py-32 bg-[#9DC7F4]">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-white border border-slate-200 rounded-2xl p-10 shadow">

            <h2 class="text-3xl font-bold mb-4 text-slate-900">
                Tentang Fakultas
            </h2>

            <h3 class="text-2xl font-bold mt-10 mb-4 text-[#1583D7]">
                Keunggulan
            </h3>

            <ul class="list-disc pl-6 text-slate-800 space-y-2">
                <li>Kurikulum industri</li>
                <li>Dosen praktisi profesional</li>
                <li>Program magang wajib</li>
                <li>Sertifikasi internasional</li>
            </ul>

            <div class="mt-10">
                <a href="/faculties"
                   class="inline-block px-6 py-3 bg-[#1583D7] text-white rounded-xl font-bold hover:scale-105 transition">
                    ← Kembali ke Faculties
                </a>
            </div>

        </div>

    </div>
</section>
            

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/faculties/prodi.blade.php ENDPATH**/ ?>