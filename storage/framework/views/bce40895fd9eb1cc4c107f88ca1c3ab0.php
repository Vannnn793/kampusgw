<footer id="footer" class="mt-32 bg-slate-50 border-t border-slate-200 font-sans relative overflow-hidden">
    
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-sky-500/20 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 py-20 relative z-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 text-sm">

            
            <div class="lg:col-span-1 space-y-6">
                <div class="space-y-4">
                    <?php if(!empty($profile) && $profile->logo_path): ?>
                        <img src="<?php echo e(asset('storage/' . $profile->logo_path)); ?>" 
                             class="h-12 w-auto object-contain brightness-110" alt="Logo">
                    <?php endif; ?>
                    <h3 class="text-xl font-black text-slate-800 tracking-tighter uppercase">
                        <?php echo e($profile->campus_name ?? 'KAMPUS KITA'); ?>

                    </h3>
                    <p class="text-slate-500 leading-relaxed text-[13px]">
                        <?php echo e(\Illuminate\Support\Str::words(strip_tags($profile->visi ?? 'Mencetak talenta global dengan kurikulum industri.'), 20)); ?>

                    </p>
                </div>
                
                
                <div class="flex gap-3">
                    <a href="#" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-sky-600 hover:border-sky-600 transition-all shadow-sm">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-sky-600 hover:border-sky-600 transition-all shadow-sm">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.01 3.71.054 1.14.074 1.908.305 2.5.547a4.387 4.387 0 011.57 1.022c.41.408.74.882 1.022 1.57.242.592.474 1.36.547 2.502.045.927.054 1.28.054 3.71s-.01 2.784-.054 3.71c-.074 1.14-.305 1.908-.547 2.5a4.508 4.508 0 01-1.022 1.57 4.387 4.387 0 01-1.57 1.022c-.592.242-1.36.474-2.502.547-.927.045-1.28.054-3.71.054s-2.784-.01-3.71-.054c-1.14-.074-1.908-.305-2.5-.547a4.387 4.387 0 01-1.57-1.022 4.387 4.387 0 01-1.022-1.57c-.242-.592-.474-1.36-.547-2.502C2.01 14.784 2 14.43 2 12c0-2.43.01-2.784.054-3.71.074-1.14.305-1.908.547-2.5a4.387 4.387 0 011.022-1.57A4.387 4.387 0 014.63 2.547c.592-.242 1.36-.474 2.502-.547C8.086 2.01 8.43 2 10.875 2h1.44z"/></svg>
                    </a>
                </div>
            </div>

            
            <div>
                <h4 class="font-black mb-6 text-slate-800 uppercase tracking-[0.2em] text-[10px]">Ecosystem</h4>
                <ul class="space-y-3 text-slate-500 font-medium">
                    <li><a href="#About" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> About Us</a></li>
                    <li><a href="#Fakultas" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> Akademik</a></li>
                    <li><a href="#Hero" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> Admissions</a></li>
                    <li><a href="#Testimoni" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> Careers</a></li>
                    <li><a href="#berita-kampus" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> News & Events</a></li>
                    <li><a href="#Partners" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> Our Partners</a></li>
                </ul>
            </div>

            
            <div>
                <h4 class="font-black mb-6 text-slate-800 uppercase tracking-[0.2em] text-[10px]">Resources & Downloads</h4>
                <ul class="space-y-4 text-slate-500 font-medium">
                    <?php $__empty_1 = true; $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li>
                            <a href="<?php echo e(asset('storage/' . $dl->file_path)); ?>" 
                            class="hover:text-sky-600 transition flex items-start gap-3 group" 
                            download>
                                
                                <svg class="w-4 h-4 mt-0.5 text-slate-300 group-hover:text-sky-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <div class="flex flex-col">
                                    <span class="leading-tight text-[13px]"><?php echo e($dl->title); ?></span>
                                    <span class="text-[9px] text-slate-400 uppercase tracking-tighter"><?php echo e($dl->category); ?></span>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="text-[11px] italic text-slate-400">Belum ada dokumen tersedia.</li>
                    <?php endif; ?>
                </ul>
            </div>

            
            <div>
                <h4 class="font-black mb-6 text-slate-800 uppercase tracking-[0.2em] text-[10px]">Top Programs</h4>
                <ul class="space-y-3 text-slate-500 font-medium">
                    <?php $__currentLoopData = $prodis->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="#" class="hover:text-sky-600 transition flex items-center gap-2 group"><span class="h-px w-0 group-hover:w-3 bg-sky-600 transition-all"></span> <?php echo e($prodi->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            
            <div class="space-y-6">
                <h4 class="font-black mb-6 text-slate-800 uppercase tracking-[0.2em] text-[10px]">Get In Touch</h4>
                
                
                <div class="relative h-28 rounded-2xl overflow-hidden border-2 border-white shadow-sm group">
                    <?php
                        $mapQuery = urlencode(($profile->campus_name ?? 'Kampus') . ' ' . ($profile->address ?? 'Jakarta'));
                    ?>
                    <iframe width="100%" height="100%" frameborder="0" class="grayscale group-hover:grayscale-0 transition duration-700"
                            src="https://maps.google.com/maps?q=<?php echo e($mapQuery); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                    <div class="absolute inset-0 bg-sky-600/5 pointer-events-none"></div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-50 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="text-[12px] font-bold text-slate-600 leading-tight">
                            <?php echo e($profile->email ?? 'info@kampus.ac.id'); ?>

                        </p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sky-50 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.213l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.213-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>  
                        <p class="text-[12px] font-bold text-slate-600 leading-tight">
                            <?php echo e($profile->phone ?? '+62 123 4567 890'); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center gap-4 text-[11px] font-bold uppercase tracking-widest text-slate-400">
            <div class="flex items-center gap-2">
                <span>© <?php echo e(date('Y')); ?></span>
                <span class="text-slate-800"><?php echo e($profile->campus_name ?? config('app.name')); ?></span>
                <span class="hidden md:inline text-slate-200">|</span>
                <span class="hidden md:inline">Built for Excellence</span>
            </div>
            <div class="flex gap-6">
                <a href="#" class="hover:text-sky-600 transition">Privacy Policy</a>
                <a href="#" class="hover:text-sky-600 transition">Terms of Service</a>
                <a href="#" class="hover:text-sky-600 transition">Site Map</a>
            </div>
        </div>
    </div>
</footer><?php /**PATH C:\laragon\www\kampus_anda\resources\views/layout/footer.blade.php ENDPATH**/ ?>