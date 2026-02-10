<?php $__env->startSection('title', $pmb->title); ?>

<?php $__env->startSection('content'); ?>

<?php
    use Carbon\Carbon;
    $now = Carbon::now();
    $start = Carbon::parse($pmb->start_date);
    $end = Carbon::parse($pmb->end_date);
    
    // Cek status pendaftaran
    $isOpen = $now->between($start, $end);
    $statusClass = $isOpen ? 'bg-emerald-500 text-white shadow-emerald-200' : 'bg-rose-500 text-white shadow-rose-200';
    $statusText = $isOpen ? 'Pendaftaran Dibuka' : 'Pendaftaran Ditutup';
?>


<div class="relative py-20 md:py-32 overflow-hidden min-h-[400px] flex items-center">
    
    
    <div class="absolute inset-0">
        <?php if($pmb->image): ?>
            <img src="<?php echo e(asset('storage/'.$pmb->image)); ?>" class="w-full h-full object-cover blur-sm scale-110 opacity-50">
        <?php else: ?>
            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070&auto=format&fit=crop" 
                 class="w-full h-full object-cover blur-sm scale-110 opacity-50">
        <?php endif; ?>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-blue-900/80 mix-blend-multiply"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <a href="<?php echo e(route('pmb.index')); ?>" class="inline-flex items-center gap-2 text-sky-200 text-sm font-bold mb-6 hover:text-white transition-colors">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Jalur
        </a>

        <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight drop-shadow-xl">
            <?php echo e($pmb->title); ?>

        </h1>

        <div class="flex justify-center gap-3">
            <span class="px-4 py-2 rounded-full text-xs font-black uppercase tracking-widest shadow-lg <?php echo e($statusClass); ?>">
                <?php echo e($statusText); ?>

            </span>
        </div>

    </div>
</div>


<section class="bg-slate-50 relative z-20 -mt-16 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    <div class="max-w-7xl mx-auto px-6 pt-16 pb-24">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            
            <div class="lg:col-span-2 space-y-8">
                
                
                <?php if($pmb->image): ?>
                <div class="rounded-[2rem] overflow-hidden shadow-xl shadow-slate-200 border border-white">
                    <img src="<?php echo e(asset('storage/'.$pmb->image)); ?>" class="w-full h-auto object-cover">
                </div>
                <?php endif; ?>

                
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-lg shadow-slate-200/50 border border-slate-100">
                    <h3 class="text-xl font-black text-slate-800 mb-6 flex items-center gap-3">
                        <i class="bi bi-file-text text-sky-600"></i> Detail & Persyaratan
                    </h3>
                    
                    
                    <article class="prose prose-slate prose-lg max-w-none 
                                    prose-headings:font-bold prose-headings:text-slate-800 
                                    prose-p:text-slate-600 prose-li:text-slate-600">
                        
                        <?php echo $pmb->content; ?>

                        
                        
                    </article>
                </div>

            </div>

            
            <aside class="lg:col-span-1 space-y-8">
                
                
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-sky-900/5 border border-slate-100 sticky top-8">
                    
                    <h4 class="text-sm font-black text-slate-800 uppercase tracking-widest mb-6 border-b border-slate-100 pb-4">
                        Timeline Pendaftaran
                    </h4>

                    
                    <div class="space-y-6 relative">
                        
                        <div class="absolute left-4 top-2 bottom-2 w-0.5 bg-slate-100"></div>

                        
                        <div class="relative flex gap-4">
                            <div class="w-8 h-8 rounded-full bg-sky-100 border-4 border-white shadow-sm flex items-center justify-center shrink-0 z-10 text-sky-600 text-xs">
                                <i class="bi bi-calendar-check-fill"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Tanggal Mulai</p>
                                <p class="text-sm font-bold text-slate-800"><?php echo e($start->translatedFormat('d F Y')); ?></p>
                            </div>
                        </div>

                        
                        <div class="relative flex gap-4">
                            <div class="w-8 h-8 rounded-full <?php echo e($isOpen ? 'bg-slate-100 text-slate-400' : 'bg-rose-100 text-rose-500'); ?> border-4 border-white shadow-sm flex items-center justify-center shrink-0 z-10 text-xs">
                                <i class="bi bi-calendar-x-fill"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Batas Akhir</p>
                                <p class="text-sm font-bold text-slate-800"><?php echo e($end->translatedFormat('d F Y')); ?></p>
                            </div>
                        </div>
                    </div>

                    
                        <?php if($isOpen): ?>
                        <div class="mt-8 p-4 bg-sky-50 rounded-2xl border border-sky-100 text-center">
                            <p class="text-xs text-sky-600 mb-1">Sisa Waktu Pendaftaran</p>
                            <p class="font-black text-slate-800 text-lg">
                                <?php echo e(ceil($now->diffInSeconds($end) / 86400)); ?>

                                <span class="text-sm font-normal text-slate-500">Hari Lagi</span>
                            </p>
                        </div>
                        <?php endif; ?>

                    
                    <div class="mt-8 space-y-3">
                        <?php if($pmb->registration_link && $isOpen): ?>
                            <a href="<?php echo e($pmb->registration_link); ?>" target="_blank"
                               class="block w-full py-4 bg-sky-600 hover:bg-sky-500 text-white text-center rounded-xl font-bold uppercase tracking-widest shadow-lg shadow-sky-200 hover:-translate-y-1 transition-all duration-300">
                                Daftar Sekarang
                            </a>
                        <?php elseif(!$isOpen): ?>
                            <button disabled class="block w-full py-4 bg-slate-200 text-slate-400 text-center rounded-xl font-bold uppercase tracking-widest cursor-not-allowed">
                                Pendaftaran Ditutup
                            </button>
                        <?php endif; ?>

                        <a href="<?php echo e(route('pmb-info.download', $pmb->id)); ?>" class="block w-full py-4 bg-white border-2 border-slate-100 text-slate-600 hover:border-sky-200 hover:text-sky-600 text-center rounded-xl font-bold uppercase tracking-widest transition-all">
                            Download Brosur
                        </a>
                    </div>
                </div>



            </aside>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/pmb/show.blade.php ENDPATH**/ ?>