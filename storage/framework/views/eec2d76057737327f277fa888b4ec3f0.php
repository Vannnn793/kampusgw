<?php $__env->startSection('title', $prodi->name); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    
    <div class="absolute inset-0">
        <img 
            src="<?php echo e($prodi->image ? asset('storage/'.$prodi->image) : asset('storage/images/default-prodi.jpg')); ?>" 
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="<?php echo e($prodi->name); ?>"
        >
        
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-500/20 border border-sky-300/30 backdrop-blur-md text-sky-100 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-300 animate-pulse"></span>
            Program Studi
        </div>

        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight animate-fade-up">
            <?php echo e($prodi->name); ?>

        </h1>

        
        <p class="text-lg text-sky-100 max-w-2xl mx-auto font-light animate-fade-up delay-100 leading-relaxed">
            <?php echo e($prodi->goal ?? 'Wadah pengembangan potensi akademik dan profesionalisme untuk masa depan yang gemilang.'); ?>

        </p>

        
        <div class="mt-8 flex flex-wrap justify-center gap-4 animate-fade-up delay-100">
             <span class="px-5 py-2 rounded-full bg-sky-600/80 backdrop-blur-sm text-white font-bold text-sm shadow-lg border border-sky-500/50">
                <i class="bi bi-mortarboard-fill mr-2"></i> <?php echo e($prodi->degree ?? 'Sarjana (S1)'); ?>

            </span>
             <span class="px-5 py-2 rounded-full bg-white/10 border border-white/20 text-white font-bold text-sm backdrop-blur-sm">
                <i class="bi bi-building mr-2"></i> Fakultas <?php echo e($prodi->faculty->name ?? 'Terkait'); ?>

            </span>
        </div>

    </div>
</div>


<section class="bg-sky-50/50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        
        <div class="grid md:grid-cols-2 gap-8 mb-20">
            
            
            <div class="group relative bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-xl shadow-sky-900/5 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 reveal-on-scroll p-8 md:p-10">
                <div class="absolute top-0 right-0 p-8 opacity-10">
                     <i class="bi bi-text-paragraph text-8xl text-sky-600 rotate-12"></i>
                </div>
                
                <h3 class="text-2xl font-black text-slate-800 mb-6 relative z-10 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-full bg-sky-50 flex items-center justify-center text-sky-600 text-lg">
                        <i class="bi bi-info-lg"></i>
                    </span>
                    Tentang Program
                </h3>
                
                <div class="prose prose-slate text-slate-500 leading-relaxed relative z-10">
                    <?php echo nl2br(e($prodi->description)); ?>

                </div>
            </div>

            
            <div class="group relative bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-xl shadow-sky-900/5 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 reveal-on-scroll p-8 md:p-10 delay-100">
                <div class="absolute top-0 right-0 p-8 opacity-10">
                     <i class="bi bi-trophy text-8xl text-sky-600 rotate-12"></i>
                </div>

                <h3 class="text-2xl font-black text-slate-800 mb-6 relative z-10 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-full bg-sky-50 flex items-center justify-center text-sky-600 text-lg">
                        <i class="bi bi-rocket-takeoff-fill"></i>
                    </span>
                    Kompetensi Lulusan
                </h3>
                
                <ul class="space-y-4 relative z-10 text-slate-500">
                    <li class="flex items-start gap-3">
                        <i class="bi bi-check-circle-fill text-sky-500 mt-1"></i>
                        <span>Menguasai dasar keilmuan dan keterampilan praktis di bidang <?php echo e($prodi->name); ?>.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="bi bi-check-circle-fill text-sky-500 mt-1"></i>
                        <span>Mampu beradaptasi dengan perkembangan teknologi industri terbaru.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="bi bi-check-circle-fill text-sky-500 mt-1"></i>
                        <span>Memiliki integritas profesional dan etika kerja yang tinggi.</span>
                    </li>
                </ul>
            </div>
        </div>

        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 reveal-on-scroll">
            <div>
                <h2 class="text-3xl font-black text-slate-800 mb-2">Kurikulum & Studi</h2>
                <p class="text-slate-500">Sebaran mata kuliah per semester.</p>
            </div>
            
            <div class="flex items-center gap-2 px-5 py-2 bg-white rounded-full border border-sky-100 shadow-sm text-sm font-bold text-slate-600">
                <i class="bi bi-book-half text-sky-500"></i>
                Total Beban: <span class="text-sky-600"><?php echo e($prodi->curriculums->sum(fn($c) => $c->courses->sum('sks'))); ?></span> SKS
            </div>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php
                $grouped = $prodi->curriculums->groupBy('semester');
            ?>

            <?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester => $curriculums): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $curriculums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curriculum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                
                <div class="group relative bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-sky-900/5 hover:shadow-2xl hover:shadow-sky-200/50 transition-all duration-500 reveal-on-scroll">
                    
                    
                    <div class="px-8 py-5 border-b border-slate-50 flex justify-between items-center bg-slate-50/50 group-hover:bg-sky-50/30 transition-colors">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center font-bold text-sm">
                                <?php echo e($semester); ?>

                            </span>
                            <h4 class="font-bold text-slate-700">Semester <?php echo e($semester); ?></h4>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            <?php echo e($curriculum->courses->sum('sks')); ?> SKS
                        </span>
                    </div>

                    
                    <div class="p-6">
                        <ul class="space-y-3">
                            <?php $__currentLoopData = $curriculum->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex justify-between items-start pb-3 border-b border-slate-50 last:border-0 last:pb-0">
                                <span class="text-slate-600 text-sm font-medium group-hover:text-slate-800 transition-colors">
                                    <?php echo e($course->name); ?>

                                </span>
                                <span class="text-sky-500 text-sm font-bold whitespace-nowrap ml-4">
                                    <?php echo e($course->sks); ?> SKS
                                </span>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="mt-20 text-center reveal-on-scroll">
            <a href="<?php echo e(route('faculties.index')); ?>" class="inline-flex items-center gap-2 px-8 py-4 bg-sky-600 text-white rounded-full font-bold hover:bg-sky-500 transition-all hover:-translate-y-1 shadow-lg shadow-sky-500/30">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Daftar Fakultas
            </a>
        </div>

    </div>
</section>


<style>
    /* Hero Animations */
    .animate-slow-zoom { animation: slowZoom 20s infinite alternate; }
    @keyframes slowZoom { 0% { transform: scale(1); } 100% { transform: scale(1.1); } }
    
    .animate-fade-up { animation: fadeUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
    .animate-fade-down { animation: fadeDown 0.8s ease-out forwards; opacity: 0; transform: translateY(-20px); }
    .delay-100 { animation-delay: 0.1s; }
    
    @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeDown { to { opacity: 1; transform: translateY(0); } }

    /* Scroll Reveal */
    .reveal-on-scroll { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1); }
    .reveal-on-scroll.is-visible { opacity: 1; transform: translateY(0); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('is-visible');
                    }, index * 100); 
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal-on-scroll').forEach((el) => {
            observer.observe(el);
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/faculties/prodi.blade.php ENDPATH**/ ?>