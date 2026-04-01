<?php $__env->startSection('title', 'Penerimaan Mahasiswa Baru'); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-20 md:py-32 lg:py-40 overflow-hidden">
    
    
    <div class="absolute inset-0">
        
        <img 
            src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop" 
            class="w-full h-full object-cover object-center brightness-50"
            alt="PMB Background"
        >
        
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-sky-900/60 to-transparent mix-blend-multiply"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <span class="inline-block py-1 px-3 rounded-full bg-sky-500/20 border border-sky-400/30 backdrop-blur-md text-sky-200 text-[10px] font-black uppercase tracking-[0.2em] mb-6">
            Tahun Akademik <?php echo e(date('Y')); ?>/<?php echo e(date('Y')+1); ?>

        </span>

        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight drop-shadow-xl">
            Bergabunglah Menjadi <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 to-white">
                Bagian Dari Masa Depan
            </span>
        </h1>

        <p class="text-lg text-slate-200 max-w-2xl mx-auto font-medium leading-relaxed mb-10">
            Pilih jalur masuk yang sesuai dengan potensimu. Kami membuka berbagai kesempatan untuk talenta terbaik bangsa.
        </p>

    </div>
</div>


<section class="bg-slate-50 relative z-20 -mt-20 rounded-t-[3rem] min-h-screen">
    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-slate-900 mb-4 flex items-center justify-center gap-3">
                <span class="w-12 h-1 bg-sky-500 rounded-full"></span>
                Jalur Penerimaan
                <span class="w-12 h-1 bg-sky-500 rounded-full"></span>
            </h2>
            <p class="text-slate-500">Silakan pilih jalur pendaftaran yang sedang aktif di bawah ini.</p>
        </div>

        
        <div class="grid lg:grid-cols-3 gap-10 items-start">

            
            <div class="lg:col-span-2">
                <div id="jalur" class="grid md:grid-cols-2 gap-8">

                    <?php $__empty_1 = true; $__currentLoopData = $pmbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="group relative bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-sky-200/50 hover:-translate-y-2 transition-all duration-500 flex flex-col h-full">

                        
                        <div class="h-64 relative overflow-hidden">
                            <?php if($pmb->image): ?>
                                <img src="<?php echo e(asset('storage/'.$pmb->image)); ?>"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <?php else: ?>
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i class="bi bi-mortarboard text-6xl opacity-50"></i>
                                </div>
                            <?php endif; ?>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-80"></div>

                            <div class="absolute top-5 right-5">
                                <span class="bg-emerald-500 text-white text-[10px] font-black px-3 py-1.5 rounded-xl uppercase tracking-wider shadow-lg flex items-center gap-1.5">
                                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                    Dibuka
                                </span>
                            </div>

                            <div class="absolute bottom-5 left-5 right-5">
                                <h3 class="text-2xl font-black text-white leading-tight shadow-black drop-shadow-md line-clamp-2">
                                    <?php echo e($pmb->title); ?>

                                </h3>
                            </div>
                        </div>

                        
                        <div class="p-8 flex flex-col flex-1">
                            
                            <div class="bg-sky-50 rounded-2xl p-4 mb-6 border border-sky-100 flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-sky-500 text-white flex items-center justify-center shrink-0 shadow-md">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-sky-600 font-bold uppercase tracking-wider mb-0.5">Masa Pendaftaran</p>
                                    <p class="text-xs font-bold text-slate-700">
                                        <?php echo e(\Carbon\Carbon::parse($pmb->start_date)->format('d M')); ?> 
                                        <span class="text-slate-400 mx-1">-</span>
                                        <?php echo e(\Carbon\Carbon::parse($pmb->end_date)->format('d M Y')); ?>

                                    </p>
                                </div>
                            </div>

                            <div class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-3">
                                <?php echo e(Str::limit(strip_tags($pmb->content), 150)); ?>

                            </div>

                            <div class="mt-auto">
                                <a href="<?php echo e(route('pmb.show', $pmb->slug)); ?>" 
                                   class="w-full block py-4 rounded-xl bg-slate-900 text-white text-center text-xs font-bold uppercase tracking-widest hover:bg-sky-600 transition-colors shadow-lg group-hover:shadow-sky-500/30">
                                    Lihat Persyaratan
                                </a>
                            </div>

                        </div>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                    
                    <div class="col-span-full">
                        <div class="text-center p-10 bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                                <i class="bi bi-calendar-x text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Jalur Dibuka</h3>
                            <p class="text-slate-500 mb-6 text-sm">Saat ini belum ada jalur pendaftaran mahasiswa baru yang aktif. Silakan kembali lagi nanti.</p>
                        </div>
                    </div>

                    <?php endif; ?>

                </div>
            </div>

            
            <div class="lg:col-span-1 sticky top-24">
                <div class="text-center p-8 bg-sky-50 rounded-[2.5rem] border-2 border-dashed border-sky-200">
                    <div class="w-16 h-16 bg-sky-100 rounded-full flex items-center justify-center mx-auto mb-6 text-sky-500 shadow-inner">
                        <i class="bi bi-whatsapp text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-800 mb-3">Butuh Bantuan?</h3>
                    <p class="text-slate-500 mb-8 text-sm leading-relaxed">Punya pertanyaan seputar pendaftaran, biaya, atau program studi? Tim kami siap membantu Anda.</p>
                    
                    <a href="<?php echo e($profile->whatsapp_url ?? '#'); ?>" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl font-bold text-sm bg-sky-500 text-white hover:bg-sky-600 transition-all duration-300 shadow-lg hover:shadow-sky-500/40">
                        <i class="bi bi-chat-dots"></i>
                        Chat Admin
                    </a>

                    <div class="mt-6 pt-6 border-t border-sky-200/50">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Jam Operasional</p>
                        <p class="text-sm font-medium text-slate-600">Senin - Jumat<br>08.00 - 16.00 WIB</p>
                    </div>
                </div>
            </div>

        </div> 
        

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\pmb\index.blade.php ENDPATH**/ ?>