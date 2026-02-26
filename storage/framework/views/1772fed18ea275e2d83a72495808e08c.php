<?php $__env->startSection('title', 'Dokumen Akreditasi'); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    
    <div class="absolute inset-0">
        <img 
            src="<?php echo e($profile && $profile->gambar_kampus ? asset('storage/'.$profile->gambar_kampus) : asset('storage/images/default-campus.jpg')); ?>" 
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Latar Belakang Kampus" 
        >
        
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-500/20 border border-sky-300/30 backdrop-blur-md text-sky-100 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-300 animate-pulse"></span>
            Quality Assurance
        </div>

        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight animate-fade-up">
            Status Akreditasi <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">Institusi & Program Studi</span>
        </h1>

        
        <p class="text-lg text-sky-100 max-w-2xl mx-auto leading-relaxed animate-fade-up delay-100 font-light">
            Komitmen kami terhadap mutu pendidikan yang unggul, terstandarisasi, dan diakui secara nasional maupun internasional.
        </p>
    </div>
</div>


<section class="bg-sky-50/50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] min-h-screen">
    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        
        <div class="bg-white rounded-[2.5rem] border border-sky-100 shadow-xl shadow-sky-100/50 overflow-hidden animate-fade-up delay-200">
            
            
            <div class="p-8 border-b border-slate-100 bg-white flex flex-col md:flex-row justify-between items-center gap-6">
                
                
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-sky-50 flex items-center justify-center text-sky-600 text-xl border border-sky-100">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800">Direktori Akreditasi</h3>
                        <p class="text-slate-400 text-xs font-medium mt-0.5">
                            Data diperbarui: <span class="text-sky-600"><?php echo e(date('d F Y')); ?></span>
                        </p>
                    </div>
                </div>
                
                
                <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
                    
                    <div class="px-4 py-2 bg-slate-50 rounded-lg text-slate-500 text-xs font-bold border border-slate-100">
                        Total: <span class="text-slate-900 text-sm"><?php echo e($accreditations->count()); ?></span> Data
                    </div>
                </div>
            </div>

            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    
                    
                    <thead>
                        <tr class="bg-gradient-to-r from-sky-600 to-blue-600 text-white">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider border-r border-white/10 w-16 text-center">No</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider border-r border-white/10">Program Studi</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider border-r border-white/10">No. Sertifikat</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider border-r border-white/10 text-center">Peringkat</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider border-r border-white/10 text-center">Berlaku Hingga</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-50">
                        <?php $__empty_1 = true; $__currentLoopData = $accreditations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="group hover:bg-sky-50/60 transition-colors duration-200">
                                
                                
                                <td class="px-8 py-6 text-center font-semibold text-slate-400 group-hover:text-sky-600">
                                    <?php echo e($loop->iteration); ?>

                                </td>
                                
                                
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 border border-slate-100 group-hover:bg-white group-hover:text-sky-600 group-hover:border-sky-200 transition-all shadow-sm">
                                            <i class="bi bi-mortarboard-fill"></i>
                                        </div>
                                        <div>
                                            <span class="block font-bold text-slate-700 group-hover:text-sky-700 transition-colors text-base">
                                                <?php echo e($row->program_name); ?>

                                            </span>
                                        </div>
                                    </div>
                                </td>
                                
                                
                                <td class="px-8 py-6">
                                    <span class="font-mono text-xs font-semibold text-slate-600 bg-slate-50 px-3 py-1.5 rounded border border-slate-200 group-hover:border-sky-200 group-hover:bg-white transition-colors">
                                        <?php echo e($row->certificate_number); ?>

                                    </span>
                                </td>
                                
                                
                                <td class="px-8 py-6 text-center">
                                    
                                    <?php
                                        $gradeColor = match($row->level) {
                                            'A', 'Unggul' => 'bg-amber-100 text-amber-700 border-amber-200',
                                            'B', 'Baik Sekali' => 'bg-blue-100 text-blue-700 border-blue-200',
                                            default => 'bg-slate-100 text-slate-600 border-slate-200',
                                        };
                                    ?>
                                    <span class="inline-block px-4 py-1.5 rounded-full text-sm font-bold border <?php echo e($gradeColor); ?>">
                                        <?php echo e($row->level); ?>

                                    </span>
                                </td>
                                
                                
                                <td class="px-8 py-6 text-center text-sm font-medium text-slate-500 group-hover:text-slate-700">
                                    <?php echo e(\Carbon\Carbon::parse($row->valid_until)->translatedFormat('d F Y')); ?>

                                </td>
                                
                                
                                <td class="px-8 py-6 text-center">
                                    <?php if(\Carbon\Carbon::parse($row->valid_until)->isPast()): ?>
                                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-50 border border-rose-100 text-rose-600 text-[10px] font-black uppercase tracking-wider">
                                            <i class="bi bi-x-circle-fill"></i> Expired
                                        </div>
                                    <?php else: ?>
                                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-600 text-[10px] font-black uppercase tracking-wider shadow-sm">
                                            <span class="relative flex h-2 w-2">
                                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                            </span>
                                            Aktif
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-8 py-24 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-4 text-slate-300">
                                            <i class="bi bi-clipboard-x text-4xl"></i>
                                        </div>
                                        <h4 class="text-lg font-bold text-slate-600">Data Tidak Ditemukan</h4>
                                        <p class="text-slate-400 mt-2">Belum ada data akreditasi yang dipublikasikan.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            
            <div class="bg-slate-50 px-8 py-4 border-t border-slate-100 flex justify-between items-center">
                <span class="text-xs text-slate-400 italic">
                    * Data bersumber dari BAN-PT / LAM-PTKes
                </span>
                
                
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
    .delay-200 { animation-delay: 0.2s; }
    
    @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeDown { to { opacity: 1; transform: translateY(0); } }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\tentang\akreditasi.blade.php ENDPATH**/ ?>