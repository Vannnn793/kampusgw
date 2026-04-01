

<?php $__env->startSection('title', 'Pusat Dokumen & Unduhan'); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    
    <div class="absolute inset-0">
        
        <img 
            src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=2128&auto=format&fit=crop" 
            class="w-full h-full object-cover object-center animate-slow-zoom"
            alt="Document Center"
        >
        
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-blue-900/40 to-transparent"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-sky-200 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <i class="bi bi-folder2-open"></i> Digital Archive
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight animate-fade-up">
            Pusat Dokumen <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">
                & Unduhan
            </span>
        </h1>

        <p class="text-lg text-sky-100 max-w-2xl mx-auto font-light animate-fade-up delay-100 leading-relaxed">
            Akses cepat dokumen resmi, panduan akademik, formulir administrasi, dan referensi perkuliahan.
        </p>

    </div>
</div>


<section class="bg-slate-50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            
            
            <aside class="lg:col-span-1 space-y-8 reveal-on-scroll">
                
                
                <div class="bg-white p-6 rounded-[2.5rem] shadow-xl shadow-sky-900/5 border border-slate-100">
                    <h4 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-2">
                        <i class="bi bi-funnel-fill text-sky-500"></i> Filter File
                    </h4>
                    
                    <div class="flex flex-col gap-3">
                        
                        <a href="<?php echo e(route('downloads.index')); ?>" 
                           class="flex items-center justify-between px-5 py-4 rounded-2xl border transition-all duration-300 font-bold text-sm group
                           <?php echo e(!request('category') ? 'bg-sky-600 text-white border-sky-600 shadow-lg shadow-sky-500/30' : 'bg-slate-50 text-slate-600 border-transparent hover:bg-white hover:shadow-md hover:text-sky-600'); ?>">
                            <span>Semua File</span>
                            <i class="bi bi-grid-fill <?php echo e(!request('category') ? 'opacity-100' : 'opacity-50 group-hover:opacity-100'); ?>"></i>
                        </a>

                        
                        <?php $__currentLoopData = $fileCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="?category=<?php echo e($cat); ?>" 
                               class="flex items-center justify-between px-5 py-4 rounded-2xl border transition-all duration-300 font-bold text-sm group
                               <?php echo e(request('category') == $cat ? 'bg-sky-600 text-white border-sky-600 shadow-lg shadow-sky-500/30' : 'bg-slate-50 text-slate-600 border-transparent hover:bg-white hover:shadow-md hover:text-sky-600'); ?>">
                                <span><?php echo e(ucfirst($cat)); ?></span>
                                <i class="bi bi-folder-fill <?php echo e(request('category') == $cat ? 'opacity-100' : 'opacity-50 group-hover:opacity-100'); ?>"></i>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <div class="relative overflow-hidden bg-slate-800 p-8 rounded-[2.5rem] text-white shadow-xl group">
                    <div class="absolute -right-4 -top-4 text-slate-700 opacity-20 group-hover:scale-110 transition-transform duration-500">
                        <i class="bi bi-question-circle-fill text-9xl"></i>
                    </div>
                    <div class="relative z-10">
                        <h5 class="font-black text-lg leading-tight mb-3">Butuh Bantuan?</h5>
                        <p class="text-xs text-slate-300 leading-relaxed font-medium mb-4">
                            Jika dokumen yang Anda cari tidak ditemukan, silakan hubungi Biro Akademik.
                        </p>
                        <a href="#footer" class="inline-flex items-center gap-2 text-sky-400 text-xs font-bold uppercase tracking-widest hover:text-white transition-colors">
                            Hubungi Kami <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </aside>

            
            <div class="lg:col-span-3">
                <div class="grid md:grid-cols-2 gap-6">
                    
                    <?php $__empty_1 = true; $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="group relative bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-xl shadow-sky-900/5 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 reveal-on-scroll">
                            
                            
                            <div class="absolute top-6 right-6 opacity-5 group-hover:opacity-10 group-hover:scale-110 transition-all duration-500">
                                <i class="bi bi-file-earmark-richtext-fill text-6xl text-sky-600"></i>
                            </div>

                            <div class="relative z-10 flex flex-col h-full">
                                
                                <div class="flex items-start gap-4 mb-6">
                                    
                                    <div class="w-14 h-14 rounded-2xl bg-sky-50 border border-sky-100 flex items-center justify-center text-sky-600 text-2xl group-hover:bg-sky-600 group-hover:text-white transition-all duration-500 shadow-sm shrink-0">
                                        
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    
                                    <div>
                                        <span class="inline-block px-3 py-1 mb-2 rounded-lg bg-slate-100 text-slate-500 text-[10px] font-black uppercase tracking-widest group-hover:bg-sky-100 group-hover:text-sky-600 transition-colors">
                                            <?php echo e($file->category); ?>

                                        </span>
                                        <h4 class="text-lg font-black text-slate-800 leading-tight group-hover:text-sky-600 transition-colors line-clamp-2">
                                            <?php echo e($file->title); ?>

                                        </h4>
                                    </div>
                                </div>

                                
                                <p class="text-sm text-slate-500 leading-relaxed mb-8 line-clamp-2 flex-grow">
                                    <?php echo e($file->description ?? 'Dokumen resmi universitas untuk keperluan akademik dan administrasi.'); ?>

                                </p>

                                
                                <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Diupdate</span>
                                        <span class="text-xs font-bold text-slate-600"><?php echo e($file->updated_at->format('d M Y')); ?></span>
                                    </div>

                                    <a href="<?php echo e(asset('storage/' . $file->file_path)); ?>" download 
                                       class="flex items-center gap-2 px-6 py-2.5 bg-slate-800 text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-sky-600 hover:shadow-lg hover:shadow-sky-500/30 transition-all duration-300 group/btn">
                                        Unduh
                                        <i class="bi bi-download group-hover/btn:translate-y-0.5 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <div class="col-span-full py-24 text-center border-2 border-dashed border-slate-200 rounded-[2.5rem] bg-white/50 reveal-on-scroll">
                            <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300 animate-pulse">
                                <i class="bi bi-folder-x text-4xl"></i>
                            </div>
                            <h4 class="font-black text-slate-800 text-lg mb-2">Dokumen Tidak Ditemukan</h4>
                            <p class="text-slate-500 max-w-md mx-auto">
                                Belum ada dokumen tersedia untuk kategori ini. Silakan cek kategori lain.
                            </p>
                            <a href="<?php echo e(route('downloads.index')); ?>" class="inline-block mt-8 text-sky-600 font-bold text-sm hover:underline">
                                Tampilkan Semua File
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
                
                
                <?php if(method_exists($downloads, 'links')): ?>
                <div class="mt-12 reveal-on-scroll">
                    <?php echo e($downloads->links()); ?>

                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>


<style>
    /* Animation Utilities */
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
                    // Stagger effect
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
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\downloads\index.blade.php ENDPATH**/ ?>