<?php $__env->startSection('title','Jejak Alumni'); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    
    <div class="absolute inset-0">
        
        <img 
            src="<?php echo e($profile && $profile->gambar_kampus ? asset('storage/'.$profile->gambar_kampus) : asset('storage/images/default-alumni.jpg')); ?>" 
            onerror="this.src='<?php echo e(asset('storage/images/kampusgw.jpg')); ?>'"
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Alumni"
        >
        
        <div class="absolute inset-0 bg-slate-900/85"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-sky-300 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
            Alumni Stories
        </div>

        
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight leading-tight animate-fade-up">
            Jejak Sukses <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-blue-400">Alumni</span>
        </h1>

        
        <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed animate-fade-up delay-100 font-light">
            Inspirasi nyata dari para lulusan yang telah berkarya dan memberikan dampak di dunia industri global.
        </p>

    </div>
</div>


<section class="bg-slate-50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] overflow-hidden min-h-screen">
    <?php if(session('success')): ?>
        <div class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center gap-3 text-emerald-700 animate-fade-up">
            <i class="bi bi-check-circle-fill text-xl"></i>
            <span class="font-medium"><?php echo e(session('success')); ?></span>
        </div>
        <?php endif; ?>

    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        
        <div class="flex flex-col md:flex-row justify-between items-center md:items-end gap-6 mb-16" data-aos="fade-up">
            <div>
                <span class="text-sky-600 font-bold tracking-widest uppercase text-xs mb-2 block text-center md:text-left">Testimonials</span>
                <h2 class="text-3xl font-black text-slate-900 text-center md:text-left">Apa Kata Mereka?</h2>
            </div>
            
            <div class="flex flex-wrap items-center justify-center gap-4">
                
                <a href="<?php echo e(route('careers.create')); ?>" class="group flex items-center gap-2 px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-2xl font-bold shadow-lg shadow-sky-200 transition-all active:scale-95">
                    <i class="bi bi-plus-circle-fill group-hover:rotate-90 transition-transform duration-300"></i>
                    Bagikan Cerita Anda
                </a>

                
                <div class="flex items-center gap-4 border-l border-slate-200 pl-4 hidden md:flex">
                    <div class="text-right">
                        <p class="text-3xl font-black text-slate-900"><?php echo e($alumni->count()); ?>+</p>
                        <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Alumni Terdaftar</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $alumni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div id="<?php echo e($a->nama); ?>" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 100); ?>"
                 class="group relative bg-white rounded-[2rem] p-8 border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-sky-100/50 hover:border-sky-200 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">

                
                <div class="absolute top-6 right-8 text-8xl text-slate-100 font-serif leading-none select-none z-0 group-hover:text-sky-50 transition-colors">
                    &rdquo;
                </div>

                
                <div class="relative z-10 mb-8 flex-1">
                    <?php if($a->pesan_kesan): ?>
                        <p class="text-slate-600 text-lg leading-relaxed italic">
                            "<?php echo e(Str::limit($a->pesan_kesan,99999999999)); ?>"
                        </p>
                    <?php else: ?>
                        <p class="text-slate-400 italic text-sm">Tidak ada pesan kesan.</p>
                    <?php endif; ?>
                </div>

                
                <div class="relative z-10 flex items-center gap-4 pt-6 border-t border-slate-50 mt-auto">
                    
                    
                    <div class="relative">
                        <img
                            src="<?php echo e($a->foto ? asset('storage/'.$a->foto) : 'https://ui-avatars.com/api/?name='.urlencode($a->nama).'&background=0ea5e9&color=fff'); ?>"
                            alt="<?php echo e($a->nama); ?>"
                            class="w-14 h-14 rounded-full object-cover ring-4 ring-slate-50 group-hover:ring-sky-100 transition-all duration-300"
                        >
                        
                        <div class="absolute -bottom-1 -right-1 bg-blue-500 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full border-2 border-white">
                            <i class="bi bi-check"></i>
                        </div>
                    </div>

                    
                    <div>
                        <h3 class="font-bold text-slate-900 text-base leading-tight group-hover:text-sky-600 transition-colors">
                            <?php echo e($a->nama); ?>

                        </h3>
                        
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mt-1">
                            <?php echo e($a->jabatan ?? 'Alumni'); ?> 
                            <?php if($a->perusahaan): ?> 
                                <span class="text-sky-500">@ <?php echo e(Str::limit($a->perusahaan, 15)); ?></span> 
                            <?php endif; ?>
                        </p>
                        
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mt-1">
                            <?php echo e($a->email ?? '-'); ?>

                        </p>
                        <p class="text-xs font-semibold text slate-500 uppercase tracking-wide mt-1">
                            <?php echo e($a->no_telpon ?? '-'); ?>

                        </p>

                        <div class="flex items-center gap-2 mt-1 text-[10px] text-slate-400 font-medium">
                            <span><?php echo e($a->tahun_lulus ?? 'N/A'); ?></span>
                            <span>•</span>
                            <span><?php echo e($a->prodi->name ?? 'Prodi N/A'); ?></span>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full py-20 text-center bg-white rounded-[2rem] border border-dashed border-slate-300">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-50 mb-4 text-slate-400">
                    <i class="bi bi-person-slash text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-700">Belum ada data Alumni</h3>
                <p class="text-slate-500 text-sm mt-2">Data alumni akan muncul di sini setelah ditambahkan.</p>
            </div>
            <?php endif; ?>
            
            <div class="mt-24 relative overflow-hidden rounded-[3rem] bg-slate-900 p-8 md:p-16 text-center shadow-2xl" data-aos="zoom-in">
                
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-sky-500/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-blue-500/20 rounded-full blur-3xl"></div>
                
                <div class="relative z-10 max-w-2xl mx-auto">
                    <h3 class="text-2xl md:text-4xl font-black text-white mb-4">
                        Bagian dari Keluarga Besar <span class="text-sky-400">Kampus Kami?</span>
                    </h3>
                    <p class="text-slate-400 mb-10 leading-relaxed">
                        Setiap langkah Anda adalah inspirasi bagi adik tingkat. Bagikan pengalaman dunia kerja dan pesan kesan Anda selama berkuliah di sini.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="<?php echo e(route('careers.create')); ?>" class="w-full sm:w-auto px-8 py-4 bg-white text-slate-900 rounded-2xl font-bold hover:bg-sky-50 transition-colors">
                            Mulai Berbagi Cerita
                        </a>
                        <a href="#cerita" class="w-full sm:w-auto px-8 py-4 bg-white/10 text-white rounded-2xl font-bold hover:bg-white/20 backdrop-blur-sm transition-colors border border-white/10">
                            Lihat Panduan
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<style>
    .animate-slow-zoom {
        animation: slowZoom 20s infinite alternate;
    }
    @keyframes slowZoom {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }
    
    .animate-fade-up { animation: fadeUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
    .animate-fade-down { animation: fadeDown 0.8s ease-out forwards; opacity: 0; transform: translateY(-20px); }
    .delay-100 { animation-delay: 0.1s; }
    
    @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeDown { to { opacity: 1; transform: translateY(0); } }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/careers/index.blade.php ENDPATH**/ ?>