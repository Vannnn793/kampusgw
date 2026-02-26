<?php $__env->startSection('title', 'Fakultas ' . $faculty->name); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    
    <div class="absolute inset-0">
        <img 
            src="<?php echo e(asset('storage/'.$faculty->image)); ?>"
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="<?php echo e($faculty->name); ?>"
        >
        
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-500/20 border border-sky-300/30 backdrop-blur-md text-sky-100 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <a href="<?php echo e(route('faculties.index')); ?>" class="hover:text-white transition-colors">Fakultas</a>
            <span class="w-1 h-1 rounded-full bg-sky-300"></span>
            <span>Detail</span>
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight animate-fade-up">
            Fakultas <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">
                <?php echo e($faculty->name); ?>

            </span>
        </h1>

        <p class="text-lg text-sky-100 max-w-2xl mx-auto font-light animate-fade-up delay-100 leading-relaxed">
            <?php echo e($faculty->description); ?>

        </p>

    </div>
</div>


<section class="bg-sky-50/50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        
        <?php if($faculty && ($faculty->vision || $faculty->mission)): ?>
            <div class="grid md:grid-cols-2 gap-8 mb-24">
                
                
                <div class="group relative bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-xl shadow-sky-900/5 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 reveal-on-scroll p-10">
                    <div class="absolute top-0 right-0 p-8 opacity-10">
                        <i class="bi bi-eye-fill text-8xl text-sky-600 rotate-12"></i>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-sky-50 flex items-center justify-center text-sky-600 text-2xl mb-6 shadow-sm">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h2 class="text-3xl font-black text-slate-800 mb-6">Visi</h2>
                        <div class="prose prose-slate text-slate-500 leading-relaxed italic">
                            <?php echo nl2br(e($faculty->vision)); ?>

                        </div>
                    </div>
                </div>

                
                <div class="group relative bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-xl shadow-sky-900/5 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 reveal-on-scroll p-10 delay-100">
                    <div class="absolute top-0 right-0 p-8 opacity-10">
                        <i class="bi bi-rocket-takeoff-fill text-8xl text-blue-600 rotate-12"></i>
                    </div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 text-2xl mb-6 shadow-sm">
                            <i class="bi bi-list-task"></i>
                        </div>
                        <h2 class="text-3xl font-black text-slate-800 mb-6">Misi</h2>
                        <div class="prose prose-slate text-slate-500 leading-relaxed">
                            <?php echo nl2br(e($faculty->mission)); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        
        <div class="mb-24">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 reveal-on-scroll">
                <div>
                    <span class="text-sky-600 font-bold tracking-widest uppercase text-xs mb-2 block">Academic Programs</span>
                    <h2 class="text-3xl font-black text-slate-800">Program Studi</h2>
                </div>
                
                <div class="flex items-center gap-2 px-5 py-2 bg-white rounded-full border border-sky-100 shadow-sm text-sm font-bold text-slate-600">
                    <i class="bi bi-mortarboard-fill text-sky-500"></i>
                    Total: <span class="text-sky-600"><?php echo e($faculty->prodis->count()); ?></span> Prodi
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__empty_1 = true; $__currentLoopData = $faculty->prodis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('faculties.prodis.show', [$faculty->slug, $prodi->slug])); ?>"
                       class="group relative bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-sky-900/5 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 reveal-on-scroll flex flex-col h-full p-8">
                        
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-sky-50 flex items-center justify-center text-sky-600 text-2xl group-hover:bg-sky-500 group-hover:text-white transition-colors duration-300">
                                <i class="bi bi-mortarboard"></i>
                            </div>
                            <span class="px-3 py-1 bg-slate-50 rounded-lg border border-slate-100 text-xs font-bold uppercase tracking-wider text-slate-500 group-hover:text-sky-600 group-hover:border-sky-100 transition-colors">
                                <?php echo e($prodi->degree ?? 'S1'); ?>

                            </span>
                        </div>

                        <div class="mb-6 flex-1">
                            <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-sky-600 transition-colors">
                                <?php echo e($prodi->name); ?>

                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 group-hover:text-slate-600">
                                <?php echo e(Str::limit($prodi->description, 100, '...')); ?>

                            </p>
                        </div>

                        <div class="pt-6 border-t border-slate-50 mt-auto flex items-center text-sky-600 font-bold text-sm group-hover:translate-x-2 transition-transform">
                            <span>Lihat Detail</span>
                            <i class="bi bi-arrow-right ml-2"></i>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full py-16 text-center border-2 border-dashed border-slate-200 rounded-3xl bg-slate-50">
                        <i class="bi bi-journal-x text-4xl text-slate-300 mb-4 block"></i>
                        <span class="text-slate-400 font-medium">Belum ada Program Studi.</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <?php if($faculty->facilities->count() > 0): ?>
        <div class="reveal-on-scroll">
            <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-12">
                <div>
                    <span class="text-sky-600 font-bold tracking-widest uppercase text-xs mb-2 block">
                        Campus Facilities
                    </span>
                    <h2 class="text-3xl font-black text-slate-800">
                        Fasilitas Fakultas
                    </h2>
                </div>
                <a href="<?php echo e(route('tentang.fasilitas.faculty', $faculty->slug)); ?>" class="text-sm font-bold text-sky-600 hover:text-sky-500 flex items-center gap-2">
                    Lihat Semua Fasilitas <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $faculty->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group relative h-72 rounded-[2rem] overflow-hidden cursor-pointer border border-slate-100 shadow-lg hover:shadow-2xl hover:shadow-sky-200/50 transition-all duration-500">
                        <a href="<?php echo e(route('tentang.fasilitas.index')); ?>#<?php echo e($facility->name); ?>" class="absolute inset-0 block">
                        
                        <img 
                            src="<?php echo e(asset('storage/'.$facility->image)); ?>" 
                            alt="<?php echo e($facility->name); ?>"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        >

                        
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-90"></div>

                        
                        <div class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <h3 class="text-xl font-bold text-white mb-2 leading-tight">
                                <?php echo e($facility->name); ?>

                            </h3>
                            <p class="text-sky-100 text-xs leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 line-clamp-2">
                                <?php echo e($facility->description); ?>

                            </p>
                        </div>
                        
                        
                        <div class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transform translate-y-[-10px] group-hover:translate-y-0 transition-all duration-500">
                            <i class="bi bi-fullscreen"></i>
                        </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

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
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\faculties\show.blade.php ENDPATH**/ ?>