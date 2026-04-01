
<?php $__env->startSection('title', 'Berita & Info Kampus'); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    
    <div class="absolute inset-0">
        
        <img 
            src="<?php echo e(asset('storage/images/default-news-cover.jpg')); ?>" 
            onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop'"
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Campus News"
        >
        
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-500/20 border border-sky-300/30 backdrop-blur-md text-sky-100 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-300 animate-pulse"></span>
            Campus Updates
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight animate-fade-up">
            Berita & <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">
                Informasi Terkini
            </span>
        </h1>

        <p class="text-lg text-sky-100 max-w-2xl mx-auto font-light animate-fade-up delay-100 leading-relaxed">
            Dapatkan wawasan terbaru seputar kegiatan akademik, prestasi mahasiswa, dan perkembangan kampus.
        </p>

    </div>
</div>


<section class="bg-slate-50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            
            <div class="lg:col-span-8 space-y-10">
               <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="group relative bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col md:flex-row mb-8">
                    
                    
                    
                    <div class="md:w-72 shrink-0 relative h-64 md:h-auto overflow-hidden">
                        <?php if($post->thumbnail): ?>
                            <img src="<?php echo e(asset('storage/' . $post->thumbnail)); ?>" alt="<?php echo e($post->title); ?>" 
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <?php else: ?>
                            <div class="absolute inset-0 bg-slate-100 flex items-center justify-center text-slate-400">
                                <i class="bi bi-image text-4xl"></i>
                            </div>
                        <?php endif; ?>
                        
                        
                        <div class="absolute top-4 left-4 z-10">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur text-sky-600 text-[10px] font-black uppercase tracking-wider rounded-lg shadow-sm border border-white/50">
                                <?php echo e($post->category->name); ?>

                            </span>
                        </div>
                    </div>

                    
                    <div class="p-6 md:p-8 flex flex-col justify-between flex-1">
                        <div>
                            
                            <div class="flex items-center gap-2 text-slate-400 text-xs font-bold uppercase tracking-wider mb-3">
                                <i class="bi bi-calendar-event text-sky-500"></i>
                                <?php echo e($post->created_at->translatedFormat('d M Y')); ?>

                            </div>

                            
                            <h2 class="text-xl md:text-2xl font-black text-slate-800 mb-3 group-hover:text-sky-600 transition-colors leading-tight line-clamp-2">
                                <a href="/posts/<?php echo e($post->slug); ?>">
                                    <?php echo e($post->title); ?>

                                </a>
                            </h2>

                            
                            <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-4">
                                <?php echo e(Str::limit(strip_tags($post->content), 120)); ?>

                            </p>
                        </div>

                        
                        <div class="flex items-center text-sky-600 font-bold text-xs uppercase tracking-wider mt-auto">
                            <a href="/posts/<?php echo e($post->slug); ?>" class="inline-flex items-center gap-2 group">
                            Baca Selengkapnya <i class="bi bi-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                
                <div class="text-center py-20 border-2 border-dashed border-slate-200 rounded-[2rem]">
                    <p class="text-slate-400 font-bold">Belum ada berita.</p>
                </div>
            <?php endif; ?>

                
                <div class="pt-8 reveal-on-scroll">
                    <?php echo e($posts->links()); ?>

                </div>
            </div>

            
            <aside class="lg:col-span-4 space-y-8">
                
                
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-sky-900/5 border border-slate-100 reveal-on-scroll">
                    <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-widest flex items-center gap-2">
                        <i class="bi bi-search text-sky-500"></i> Cari Berita
                    </h3>
                    <form action="/posts" method="GET" class="relative group">
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Ketik kata kunci..." 
                               class="w-full pl-6 pr-14 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm focus:ring-2 focus:ring-sky-500 focus:bg-white transition-all outline-none text-slate-600 font-medium">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 bg-white rounded-xl shadow-sm text-sky-600 flex items-center justify-center hover:bg-sky-500 hover:text-white transition-all">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>
                </div>

                
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-sky-900/5 border border-slate-100 reveal-on-scroll" data-aos-delay="100">
                    <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-widest flex items-center gap-2">
                        <i class="bi bi-tags-fill text-sky-500"></i> Kategori
                    </h3>
                    <div class="space-y-3">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/posts?category=<?php echo e($cat->slug); ?>" 
                               class="group flex items-center justify-between p-4 rounded-2xl border border-slate-50 transition-all duration-300 <?php echo e(request('category') == $cat->slug ? 'bg-sky-600 text-white shadow-lg shadow-sky-500/30' : 'bg-slate-50 text-slate-600 hover:bg-sky-50 hover:border-sky-100'); ?>">
                                <span class="font-bold text-sm"><?php echo e($cat->name); ?></span>
                                
                                
                                <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold transition-colors <?php echo e(request('category') == $cat->slug ? 'bg-white/20 text-white' : 'bg-white text-slate-400 group-hover:text-sky-600'); ?>">
                                    <?php echo e($cat->posts_count); ?>

                                </span>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <?php if(isset($latest_posts) && $latest_posts->count() > 0): ?>
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-sky-900/5 border border-slate-100 reveal-on-scroll" data-aos-delay="200">
                    <h3 class="text-sm font-black text-slate-800 mb-6 uppercase tracking-widest flex items-center gap-2">
                        <i class="bi bi-lightning-fill text-amber-500"></i> Terbaru
                    </h3>
                    <div class="space-y-6">
                        <?php $__currentLoopData = $latest_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/posts/<?php echo e($latest->slug); ?>" class="flex gap-4 group items-start">
                                <div class="w-20 h-20 shrink-0 rounded-2xl overflow-hidden shadow-md relative">
                                    <img src="<?php echo e($latest->thumbnail ? asset('storage/' . $latest->thumbnail) : asset('storage/images/default.jpg')); ?>" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold text-sky-500 uppercase tracking-wider mb-1 block">
                                        <?php echo e($latest->created_at->diffForHumans()); ?>

                                    </span>
                                    <h4 class="text-sm font-bold text-slate-800 group-hover:text-sky-600 transition line-clamp-2 leading-snug">
                                        <?php echo e($latest->title); ?>

                                    </h4>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>

                
                <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl shadow-sky-500/20 group reveal-on-scroll" data-aos-delay="300">
                    
                    <div class="absolute inset-0 bg-sky-600 transition-colors group-hover:bg-sky-500"></div>
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20"></div>
                    
                    <div class="relative z-10 p-10 text-center">
                        <div class="w-16 h-16 bg-white/10 rounded-2xl backdrop-blur-sm flex items-center justify-center mx-auto mb-6 text-white text-3xl shadow-inner border border-white/20">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <h3 class="text-white font-black text-2xl mb-2">Mahasiswa Baru?</h3>
                        <p class="text-sky-100 text-sm mb-8 font-light">
                            Bergabunglah bersama kami untuk masa depan yang lebih cerah.
                        </p>
                        <a href="/pmb" class="inline-flex items-center gap-2 bg-white text-sky-600 px-8 py-3 rounded-xl font-bold text-xs uppercase tracking-widest shadow-lg hover:shadow-xl hover:bg-sky-50 transition-all hover:-translate-y-1">
                            Daftar Sekarang
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </aside>
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
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\posts\index.blade.php ENDPATH**/ ?>