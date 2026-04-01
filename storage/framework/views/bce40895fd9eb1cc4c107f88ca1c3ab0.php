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
                
                
                
            <div>
                <h3 class="text-gray-800 font-bold mb-6 text-lg">Ikuti Kami</h3>
                <p class="text-slate-400 text-sm mb-6">Dapatkan update kegiatan mahasiswa terbaru di sosial media kami.</p>
                
                
                <div class="flex gap-4">
                    
                    
                    
                    <a href="<?php echo e($profile->instagram_url ?? '#'); ?>" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 text-white hover:bg-sky-500 hover:text-white transition duration-300 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>

                    
                    <a href="<?php echo e($profile->youtube_url ?? '#'); ?>" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 text-white hover:bg-red-600 hover:text-white transition duration-300 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>

                    
                    <a href="<?php echo e($profile->facebook_url ?? '#'); ?>" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 text-white hover:bg-blue-600 hover:text-white transition duration-300 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>

                    
                    <a href="<?php echo e($profile->tiktok_url ?? '#'); ?>" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 text-white hover:bg-pink-500 hover:text-white transition duration-300 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93v6.16c0 2.52-1.12 4.84-2.9 6.24-1.72 1.36-3.92 1.99-6.09 1.69-2.18-.3-4.2-1.6-5.46-3.47-1.32-1.94-1.57-4.47-.65-6.61.9-2.1 3.01-3.6 5.3-3.86 1.33-.16 2.7.15 3.92.83v4.25c-1.8-.93-4.1-.38-5.4 1.25-.8 1.01-1 2.4-.53 3.61.47 1.21 1.63 2.06 2.94 2.14 1.3.08 2.58-.65 3.19-1.84.6-1.16.63-2.52.09-3.73v-9.67c0-.52.03-1.04.1-1.55.05-.33.1-.66.18-.98.05-.2.11-.4.18-.59.03-.08.07-.15.11-.23.18-.39.42-.75.72-1.07.72-.77 1.7-1.19 2.72-1.22z"/></svg>
                    </a>
                    
                </div>
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
               <a href="<?php echo e(route('page.show', 'privacy-policy')); ?>">PRIVACY POLICY</a>
                <a href="<?php echo e(route('page.show', 'terms-of-service')); ?>">TERMS OF SERVICE</a>
                <a href="<?php echo e(route('page.show', 'site-map')); ?>">SITE MAP</a>
            </div>
        </div>
    </div>
</footer><?php /**PATH C:\laragon\www\kampus_anda\resources\views/layout/footer.blade.php ENDPATH**/ ?>