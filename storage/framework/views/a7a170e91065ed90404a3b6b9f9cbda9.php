<?php $__env->startSection('title','Home'); ?>

<?php $__env->startSection('content'); ?>

<style>
/* ===== FORCE ANIMATED GRADIENT (ANTI GAGAL) ===== */
.animated-gradient {
    background: linear-gradient(
  90deg,
    #CFF7DC,   /* hijau mint soft */
    #DCEBFF,   /* biru langit pastel */
    #FFF9E6,   /* krem lembut */
    #D6ECF7,   /* biru aqua muda */
    #E6F9F0 
    );
    background-size: 600% 600%;
    animation: gradientMove 5s linear infinite;
}

@keyframes gradientMove {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 100% 50%;
    }
}
</style>

<div id="announcement-bar"
     class="relative z-30"
     data-aos="fade-down">

    <div class="animated-gradient">
        <div class="max-w-7xl mx-auto px-6 py-3 text-center relative">

            <p class="text-sm md:text-base font-medium text-slate-800">
                🎓 <span class="font-semibold">
                    Penerimaan Mahasiswa Baru KampusGw 2026 Telah Dibuka!
                </span>
                Simak Jadwal, Syarat, dan Program Studi.
               <a href="https://reg.snpmb.id/"
                class="ml-1 font-semibold underline underline-offset-4 hover:text-sky-700 transition"
                target="_blank"
                rel="noopener">
                Lihat di Sini!
                </a>
            </p>
        </div>
    </div>
</div>

<section class="relative min-h-screen flex items-center overflow-hidden bg-[#FAFAF9]">
    
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute -top-[10%] -left-[5%] w-[40%] h-[60%] bg-blue-100/50 rounded-full blur-[120px]"></div>
        <div class="absolute top-[20%] -right-[5%] w-[30%] h-[50%] bg-indigo-50/60 rounded-full blur-[100px]"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-12">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            
            
            <div class="lg:col-span-7">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 mb-6">
                    <?php if(isset($pmbInfos) && $pmbInfos->count() > 0): ?>
                        
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                    </span>
                    <p class="uppercase tracking-widest text-[10px] font-bold text-[#1E5FA3]">
                        <?php echo e($pmbInfos->title); ?>

                    </p>
                    <?php else: ?>
                        
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-gray-600"></span>
                    </span>
                    <p class="uppercase tracking-widest text-[10px] font-bold text-gray-500">
                        Info PMB Belum Tersedia
                    </p>
                    <?php endif; ?>
                </div>

                <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.1] tracking-tight text-[#0F2A44]">
                    Kampus Teknologi <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1E5FA3] to-[#4facfe]">
                        Talenta Global
                    </span>
                </h1>
                
                <p class="mt-6 text-lg font-medium text-[#475569] max-w-xl leading-relaxed">
                    Kurikulum berbasis industri dengan ekosistem inovasi yang dirancang khusus untuk mencetak profesional siap kerja di era digital.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="/pmb" class="px-8 py-4 bg-[#1E5FA3] text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:bg-[#0F3E73] hover:-translate-y-1 transition-all duration-300">
                        Daftar Sekarang
                    </a>
                    <a href="/faculties" class="px-8 py-4 bg-white text-[#1E5FA3] font-bold border-2 border-[#1E5FA3]/10 rounded-2xl hover:bg-gray-50 hover:border-[#1E5FA3] transition-all">
                        Jelajahi Kampus
                    </a>
                </div>

                
                
                <div class="mt-16 grid grid-cols-3 gap-8 border-t border-gray-200 pt-8">
                    
                    <div x-data="{ count: 0, target: <?php echo e($profile->mahasiswa_aktif ?? 0); ?> }" 
                        x-intersect.once="let interval = setInterval(() => { if(count < target) { count += Math.ceil(target/50); if(count > target) count = target; } else { clearInterval(interval); } }, 30)">
                        <div class="flex items-baseline gap-0.5">
                            <h4 class="font-black text-[#0F2A44] text-xl leading-none" x-text="count">0</h4>
                            <span class="text-sm font-bold text-gray-500">+</span>
                        </div>
                        <p class="text-sm text-gray-500 font-medium">Mahasiswa mempercayai kami</p>
                    </div>

                    
                    <div x-data="{ count: 0, target: <?php echo e($partners->count() ?? 0); ?> }" 
                        x-intersect.once="let interval = setInterval(() => { if(count < target) { count += 1; } else { clearInterval(interval); } }, 50)">
                        <p class="text-3xl font-bold text-[#0F2A44]" x-text="count"></p>
                        <p class="text-sm text-gray-500 font-medium">Partner Industri</p>
                    </div>

                    
                    <div x-data="{ show: false }" x-intersect.once="show = true">
                        <?php if($accreditationLevel && $accreditationLevel !== '-'): ?>
                            
                            <p class="text-3xl font-bold text-[#0F2A44]" 
                            x-show="show" 
                            x-transition:enter="transition ease-out duration-1000"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0">
                            <?php echo e($accreditationLevel); ?>

                            </p>
                            <p class="text-sm text-gray-500 font-medium">Akreditasi Ban-PT</p>
                        <?php else: ?>
                            
                            <p class="text-3xl font-bold text-gray-300">N/A</p>
                            <p class="text-[10px] text-gray-400 font-medium uppercase tracking-widest">Data Belum Tersedia</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="lg:col-span-5 space-y-6">
                
                
                <div class="relative group">
                    <div class="absolute -inset-1 bg-[#1E5FA3]/20 rounded-[2rem] blur-md opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    <div class="relative aspect-[4/3] w-full rounded-[1.8rem] overflow-hidden shadow-2xl bg-gray-200 border-4 border-white">
                        <?php if(isset($sliders) && $sliders->count() > 0): ?>
                            <div x-data="{ activeSlide: 0, total: <?php echo e($sliders->count()); ?> }" 
                                x-init="setInterval(() => { activeSlide = (activeSlide + 1) % total }, 4000)" 
                                class="relative w-full h-full">
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img x-show="activeSlide === <?php echo e($index); ?>" 
                                        src="<?php echo e(asset('storage/' . $slider->thumbnail)); ?>" 
                                        
                                        class="absolute inset-0 w-full h-full object-cover transform scale-100 group-hover:scale-105 transition duration-[2000ms]" 
                                        x-transition:enter="transition duration-1000 opacity-0"
                                        x-transition:enter-end="opacity-100">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <div class="flex items-center justify-center h-full text-gray-400 font-medium">Slider Image</div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="relative rounded-3xl overflow-hidden shadow-xl h-48 bg-blue-600 group">
                    <?php if(isset($pmbInfos) && $pmbInfos->count() > 0): ?>
                        <img src="<?php echo e(asset('storage/' . $pmbInfos->first()->image)); ?>" class="w-full h-full object-cover opacity-80 group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent p-6 flex flex-col justify-end">
                            <span class="text-blue-300 text-xs font-bold uppercase tracking-widest">Informasi Terbaru</span>
                            <h3 class="text-white font-bold">Jadwal Seleksi</h3>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center justify-center h-full text-white/50">Info PMB</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="mt-16 relative group">
    
    <div class="absolute -inset-1 bg-blue-500 rounded-[2.5rem] blur opacity-10"></div>
    
    
    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl bg-black aspect-video w-full">
        <?php
            $video_id = '';
            if (isset($profile->link_video_profil) && preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $profile->link_video_profil, $match)) {
                $video_id = $match[1];
            }
        ?>

        <?php if($video_id): ?>
            
            <iframe 
                class="absolute inset-0 w-full h-full object-contain opacity-100 pointer-events-none" 
                src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo e($video_id); ?>&controls=0"
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen>
            </iframe>

            
            
        <?php endif; ?>
    </div>
</div>
        </div>
    </div>
</section>

<section class="py-16 md:py-24 relative overflow-hidden bg-gradient-to-br from-sky-50 via-[#E6F0FB] to-sky-100">
    
    
    <div class="absolute top-0 right-0 w-72 h-72 md:w-96 md:h-96 bg-white/40 rounded-full blur-3xl -mr-20 -mt-20"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 md:w-80 md:h-80 bg-[#1E5FA3]/5 rounded-full blur-3xl -ml-20 -mb-20"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            
            
            <div class="lg:col-span-5 space-y-8 text-center lg:text-left">
                <div>
                    <span class="inline-block px-4 py-1.5 rounded-full bg-[#1E5FA3] text-white text-[10px] font-black uppercase tracking-widest mb-6 shadow-md shadow-blue-200">
                        Networking & Partnership
                    </span>
                    <h2 class="text-3xl md:text-5xl font-black text-[#0F2A44] leading-tight tracking-tight">
                        Ekosistem <br class="hidden lg:block">
                        <span class="text-[#1E5FA3]">Industri Terintegrasi</span>
                    </h2>
                    <p class="mt-5 text-[#1F3E63]/80 text-base md:text-lg leading-relaxed font-medium max-w-2xl mx-auto lg:mx-0">
                        Membangun jembatan antara akademisi dan kebutuhan nyata industri global untuk menjamin karir lulusan.
                    </p>
                </div>

                
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-5 md:p-6 rounded-2xl bg-white shadow-sm border border-blue-100">
                        <p class="text-2xl md:text-3xl font-black text-[#1E5FA3]"><?php echo e($partners->count()); ?>+</p>
                        <p class="text-[10px] font-bold text-[#1F3E63]/60 uppercase tracking-tighter">Mitra Aktif</p>
                    </div>
                    <div class="p-5 md:p-6 rounded-2xl bg-white shadow-sm border border-blue-100 transition-all hover:shadow-md text-left">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-2xl md:text-3xl font-black text-[#1E5FA3]"><?php echo e($hiringRate); ?>%</p>
                                <p class="text-[10px] font-bold text-[#1F3E63]/60 uppercase tracking-tighter">Hiring Rate</p>
                            </div>
                            <div class="bg-blue-50 p-2 rounded-lg hidden sm:block">
                                <i class="bi bi-briefcase-fill text-[#1E5FA3]"></i>
                            </div>
                        </div>
                        <div class="mt-4 w-full bg-slate-100 rounded-full h-1.5">
                            <div class="bg-[#1E5FA3] h-1.5 rounded-full" style="width: <?php echo e($hiringRate); ?>%"></div>
                        </div>
                        <p class="mt-2 text-[9px] text-slate-400 italic">
                            *Data <?php echo e($totalAlumni); ?> alumni
                        </p>
                    </div>
                </div>
            </div>

            
            
            <div class="lg:col-span-7 relative h-[300px] md:h-[500px] overflow-hidden rounded-[2rem] md:rounded-[2.5rem] bg-white/40 backdrop-blur-sm border border-white/60 shadow-inner">
                
                
                <div class="absolute inset-y-0 lg:inset-x-0 left-0 lg:top-0 w-16 lg:w-full lg:h-24 bg-gradient-to-r lg:bg-gradient-to-b from-[#f1f7fe] to-transparent z-10 pointer-events-none"></div>
                <div class="absolute inset-y-0 lg:inset-x-0 right-0 lg:bottom-0 w-16 lg:w-full lg:h-24 bg-gradient-to-l lg:bg-gradient-to-t from-[#f1f7fe] to-transparent z-10 pointer-events-none"></div>

                
                <div class="flex lg:grid lg:grid-cols-2 gap-4 md:gap-5 p-5 h-full overflow-hidden">
                    
                    
                    <div class="flex lg:flex-col gap-4 md:gap-5 animate-marquee-adaptive whitespace-nowrap lg:whitespace-normal">
                        <?php for($i = 0; $i < 4; $i++): ?>
                            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="group flex-shrink-0 w-40 h-28 lg:w-auto lg:aspect-[3/2] flex items-center justify-center p-5 md:p-6 bg-white rounded-2xl md:rounded-3xl border border-blue-50 shadow-sm hover:shadow-xl hover:shadow-[#1E5FA3]/10 hover:-translate-y-1 transition-all duration-300">
                                    <img src="<?php echo e(asset('storage/'.$partner->logo)); ?>" alt="<?php echo e($partner->name); ?>" 
                                         class="max-w-full max-h-full object-contain opacity-60 group-hover:opacity-100 transition-all duration-500">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endfor; ?>
                    </div>

                    
                    <div class="hidden lg:flex flex-col gap-5 animate-marquee-vertical-reverse">
                        <?php for($i = 0; $i < 4; $i++): ?>
                            <?php $__currentLoopData = $partners->shuffle(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="group aspect-[3/2] flex items-center justify-center p-6 bg-white rounded-3xl border border-blue-50 shadow-sm hover:shadow-xl hover:shadow-[#1E5FA3]/10 hover:-translate-y-1 transition-all duration-300">
                                    <img src="<?php echo e(asset('storage/'.$partner->logo)); ?>" alt="<?php echo e($partner->name); ?>" 
                                         class="max-w-full max-h-full object-contain opacity-60 group-hover:opacity-100 transition-all duration-500">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endfor; ?>
                    </div>
                </div>

                
                <style>
                    /* Mobile: Horizontal */
                    @keyframes marquee-adaptive {
                        0% { transform: translateX(0); }
                        100% { transform: translateX(-50%); }
                    }
                    .animate-marquee-adaptive { animation: marquee-adaptive 25s linear infinite; }

                    /* Desktop: Vertical Overwrite */
                    @media (min-width: 1024px) {
                        @keyframes marquee-vertical {
                            0% { transform: translateY(0); }
                            100% { transform: translateY(-50%); }
                        }
                        @keyframes marquee-vertical-reverse {
                            0% { transform: translateY(-50%); }
                            100% { transform: translateY(0); }
                        }
                        .animate-marquee-adaptive { 
                            animation: marquee-vertical 30s linear infinite; 
                        }
                        .animate-marquee-vertical-reverse { 
                            animation: marquee-vertical-reverse 35s linear infinite; 
                        }
                    }
                    
                    .lg:col-span-7:hover div {
                        animation-play-state: paused;
                    }
                </style>
            </div>
        </div>
    </div>
</section>

<section class="py-24 relative overflow-hidden bg-white">
    
    
    <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-sky-50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="grid lg:grid-cols-2 gap-20 items-center mb-24">
            
            
            <div class="relative group h-[550px]">
                
                <div class="absolute -top-6 -left-6 w-32 h-32 border-l-8 border-t-8 border-[#1E5FA3]/20 rounded-tl-[3rem]"></div>
                
                <div class="relative group h-[550px]">
                    
                    <div class="absolute -top-6 -left-6 w-32 h-32 border-l-8 border-t-8 border-[#1E5FA3]/20 rounded-tl-[3rem]"></div>
                    
                    
                    <div class="absolute inset-0 rounded-[3rem] overflow-hidden shadow-2xl border-[12px] border-white z-10">
                        <?php if($profile && $profile->gambar_kampus): ?>
                            <img src="<?php echo e(asset('storage/' . $profile->gambar_kampus)); ?>" 
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-[2s]" 
                                alt="Gedung Kampus">
                        <?php else: ?>
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center">No Image</div>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-tr from-[#0F2A44]/20 to-transparent"></div>
                    </div>

                    
                    
                    
                    <div class="absolute -right-10 top-10 z-20 space-y-4">
                        
                        <div class="bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-white flex items-center gap-4 w-60 transform hover:-translate-x-4 transition duration-500"
                            x-data="{ count: 0, target: <?php echo e($faculties->count()); ?>, animate() { let step = Math.ceil(this.target / 50); let timer = setInterval(() => { this.count += step; if (this.count >= this.target) { this.count = this.target; clearInterval(timer); } }, 30); } }"
                            x-intersect.once="animate()">
                            <div class="w-12 h-12 rounded-xl bg-[#1E5FA3] flex items-center justify-center text-white shadow-lg shadow-blue-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-black text-[#0F2A44] text-xl leading-none" x-text="count">0</h4>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Fakultas Unggulan</p>
                            </div>
                        </div>

                        
                        <div class="bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-white flex items-center gap-4 w-60 transform hover:-translate-x-4 transition duration-500"
                            x-data="{ count: 0, target: <?php echo e($profile->mahasiswa_aktif ?? 0); ?>, animate() { let step = Math.ceil(this.target / 50); let timer = setInterval(() => { this.count += step; if (this.count >= this.target) { this.count = this.target; clearInterval(timer); } }, 30); } }"
                            x-intersect.once="animate()">
                            <div class="w-12 h-12 rounded-xl bg-green-500 flex items-center justify-center text-white shadow-lg shadow-green-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div>
                                <div class="flex items-baseline gap-0.5">
                                    <h4 class="font-black text-[#0F2A44] text-xl leading-none" x-text="count">0</h4>
                                    <span class="text-sm font-bold text-green-500">+</span>
                                </div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Mahasiswa Aktif</p>
                            </div>
                        </div>
                    </div>

                    
                    
                    
                    <div class="absolute -left-10 bottom-10 z-20 space-y-3">
                        <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white/95 backdrop-blur-md p-3 px-5 rounded-2xl shadow-lg border border-white flex items-center gap-4 w-fit max-w-[280px] transform hover:translate-x-4 transition duration-500 group"
                                x-data x-intersect.once="$el.classList.add('translate-x-0', 'opacity-100')"
                                class="translate-x-[-30px] opacity-0 transition-all duration-1000">
                                
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-tr from-yellow-500 to-amber-300 flex items-center justify-center text-white shadow-md group-hover:rotate-12 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-black text-[#0F2A44] text-xs leading-tight tracking-tight"><?php echo e($badge->name); ?></h4>
                                    <p class="text-[8px] font-bold text-amber-600 uppercase tracking-tighter mt-0.5">Campus Achievement</p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            
            <div class="space-y-6">
                <div class="inline-flex items-center gap-3">
                    <span class="h-[2px] w-12 bg-[#1E5FA3]"></span>
                    <span class="text-[#1E5FA3] font-black text-xs tracking-[0.3em] uppercase">Identity & Legacy</span>
                </div>

                <h2 class="text-4xl lg:text-6xl font-black text-[#0F2A44] leading-tight">
                    Dedikasi Untuk <br> <span class="text-[#1E5FA3]">Masa Depan.</span>
                </h2>

                <div class="relative">
                    
                    <span class="absolute -left-6 -top-4 text-8xl text-slate-100 font-serif -z-10">“</span>
                    <div class="text-slate-600 text-lg leading-relaxed text-justify first-letter:text-5xl first-letter:font-black first-letter:text-[#1E5FA3] first-letter:mr-3 first-letter:float-left">
                        <?php echo Str::limit($profile->sejarah_kampus ?? 'Sejarah kampus belum diisi.', 500); ?>

                    </div>
                </div>

                
                <div class="grid grid-cols-2 gap-4 pt-6">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                            <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-slate-700 uppercase">Kurikulum Global</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                            <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-slate-700 uppercase">Fasilitas Modern</span>
                    </div>
                </div>

                <div class="pt-6">
                    <a href="/tentang/sejarah" class="group relative inline-flex items-center gap-4 px-10 py-4 bg-[#0F2A44] text-white font-black rounded-2xl overflow-hidden transition-all hover:bg-[#1E5FA3]">
                        <span class="relative z-10">Kenal lebih Dekat</span>
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>

        
        <div class="relative rounded-[3rem] bg-[#1E5FA3] p-12 overflow-hidden shadow-2xl shadow-blue-900/30">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;"></div>
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            
            <div class="relative grid grid-cols-2 lg:grid-cols-4 gap-8 text-white">
                
                <?php
                    $finalStats = [
                        ['label' => 'Tahun Beroperasi', 'target' => $profile->tahun_beroperasi ?? 0, 'plus' => true],
                        ['label' => 'Program Studi', 'target' => $prodis->count(), 'plus' => false],
                        ['label' => 'Alumni Tersebar', 'target' => $profile->total_alumni ?? 0, 'plus' => true],
                        ['label' => 'Dosen Pengajar', 'target' => $profile->total_dosen ?? 0, 'plus' => true],
                    ];
                ?>

                <?php $__currentLoopData = $finalStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="text-center md:border-r border-white/20 last:border-0" 
                     x-data="{ count: 0, target: <?php echo e($stat['target']); ?>, animate() { let step = Math.ceil(this.target / 50); let timer = setInterval(() => { this.count += step; if (this.count >= this.target) { this.count = this.target; clearInterval(timer); } }, 30); } }"
                     x-intersect.once="animate()">
                    <div class="flex items-center justify-center gap-0.5">
                        <h3 class="text-4xl font-black mb-1 tracking-tighter" x-text="count">0</h3>
                        <?php if($stat['plus']): ?>
                            <span class="text-xl font-bold text-blue-300">+</span>
                        <?php endif; ?>
                    </div>
                    <p class="text-blue-100/70 text-[9px] font-black uppercase tracking-[0.2em]"><?php echo e($stat['label']); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</section>

<section class="relative py-24 bg-[#1583D7] overflow-hidden">
    
    
    <div class="absolute -top-24 -left-20 w-[40rem] h-[40rem] bg-white/10 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-20 w-[40rem] h-[40rem] bg-[#0A4D81]/40 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        
        <div class="max-w-3xl mx-auto text-center mb-20">
            <div class="inline-flex items-center gap-2 py-1 px-4 rounded-full bg-blue-900/40 border border-blue-300/20 text-blue-100 text-[10px] font-black uppercase tracking-[0.3em] mb-6 backdrop-blur-md">
                Academic Program
            </div>
            <h2 class="text-4xl md:text-6xl font-black text-white leading-tight tracking-tighter">
                Fakultas & <span class="text-blue-200">Karir Masa Depan.</span>
            </h2>
            <div class="w-20 h-1.5 bg-blue-300 mx-auto mt-6 rounded-full"></div>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $faculties->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('faculties.show', $faculty->slug ?? '#')); ?>" 
               class="group relative flex flex-col bg-white rounded-[2.5rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.2)] hover:shadow-blue-900/40 transition-all duration-500 hover:-translate-y-3 h-full border border-white/20">
                
                
                <div class="relative aspect-[4/3] w-full overflow-hidden">
                    <img src="<?php echo e(asset('storage/'.$faculty->image)); ?>" 
                         alt="<?php echo e($faculty->name); ?>"
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                    
                    
                    <div class="absolute top-5 left-5 z-20">
                        <span class="bg-blue-600 text-white text-[10px] font-black px-4 py-1.5 rounded-lg shadow-lg uppercase tracking-widest">
                            Official Faculty
                        </span>
                    </div>
                    
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F2A44] via-transparent to-transparent opacity-80 transition-opacity duration-500"></div>
                </div>

                
                <div class="p-8 flex flex-col flex-grow bg-white">
                    <h3 class="text-2xl font-black text-[#0F2A44] mb-3 group-hover:text-[#1583D7] transition-colors leading-tight">
                        <?php echo e($faculty->name); ?>

                    </h3>

                    <p class="text-slate-500 text-sm leading-relaxed mb-6 font-medium line-clamp-2">
                        <?php echo e($faculty->description ?? 'Menyelenggarakan pendidikan tinggi berkualitas dengan standar industri internasional.'); ?>

                    </p>

                    
                    <div class="mt-auto space-y-3 pt-6 border-t border-slate-100">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Program Studi Unggulan:</p>
                    <div class="flex flex-wrap gap-2">
                        
                        <?php if($faculty->prodis && $faculty->prodis->count() > 0): ?>
                            <?php $__currentLoopData = $faculty->prodis->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="text-[11px] font-bold bg-slate-50 text-[#1583D7] px-3 py-1 rounded-md border border-slate-100">
                                    <?php echo e($prodi->name); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <span class="text-[11px] font-bold bg-slate-50 text-slate-400 px-3 py-1 rounded-md border border-slate-100 italic">
                                Belum ada prodi
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                    
                    <div class="absolute bottom-6 right-8">
                        <div class="w-12 h-12 rounded-2xl bg-slate-50 text-[#1583D7] flex items-center justify-center group-hover:bg-[#1583D7] group-hover:text-white group-hover:rotate-45 transition-all duration-500 shadow-sm group-hover:shadow-lg group-hover:shadow-blue-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="mt-20 text-center">
            <a href="<?php echo e(route('faculties.index')); ?>" class="group inline-flex items-center gap-4 px-10 py-5 rounded-2xl bg-[#0F2A44] text-white font-black text-sm tracking-widest uppercase shadow-2xl hover:bg-white hover:text-[#1583D7] transition-all duration-500">
                Lihat Seluruh Fakultas
                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

    </div>
</section>

<section class="py-24 bg-[#F8FAFC] relative overflow-hidden">
    
    <div class="absolute top-0 right-0 w-1/3 h-full bg-[#1E5FA3]/5 skew-x-12 translate-x-20"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-12 gap-16 items-start">
            
            
            <div class="lg:col-span-4 lg:sticky lg:top-32">
                <div class="inline-flex items-center gap-2 py-1 px-3 rounded-md bg-sky-100 text-[#1E5FA3] text-[10px] font-black uppercase tracking-widest mb-6">
                    Success Stories
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-[#0F2A44] leading-[1.1] mb-6">
                    Masa Depan <br>Dimulai <br><span class="text-[#1E5FA3]">Di Sini.</span>
                </h2>
                <p class="text-slate-500 text-lg leading-relaxed mb-8">
                    Ribuan alumni telah meniti karir di perusahaan global. Inilah cerita singkat perjalanan mereka.
                </p>
                
                
                <div class="pt-8 border-t border-slate-200 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-2xl font-black text-[#0F2A44]"><?php echo e($testimoni->count()); ?></p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase">Lulusan Bekerja</p>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-[#0F2A44]"><?php echo e($partner->count()); ?>+</p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase">Mitra Hiring</p>
                    </div>
                </div>
            </div>

            
            <div class="lg:col-span-8 grid md:grid-cols-2 gap-6">
                <?php $__empty_1 = true; $__currentLoopData = $testimoni->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="group bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 flex flex-col h-full relative overflow-hidden">
                    
                    
                    <div class="absolute -top-4 -right-4 opacity-[0.03] group-hover:opacity-[0.08] transition-opacity">
                        <svg class="w-32 h-32 text-[#0F2A44]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21L14.017 18C14.017 16.896 14.389 15.954 15.133 15.176C15.877 14.398 16.921 14.009 18.265 14.009H18.963C19.125 14.009 19.206 13.928 19.206 13.766V9.673C19.206 9.511 19.125 9.43 18.963 9.43H18.176C17.065 9.43 16.142 9.057 15.407 8.311C14.672 7.565 14.305 6.642 14.305 5.541V5.136C14.305 4.974 14.386 4.893 14.548 4.893H18.932C19.094 4.893 19.175 4.974 19.175 5.136V5.509C19.175 6.942 19.555 8.162 20.315 9.169C21.075 10.176 21.99 11.058 23.06 11.815C23.125 11.864 23.157 11.921 23.157 11.985V20.757C23.157 20.919 23.076 21 22.914 21H14.017Z"/>
                        </svg>
                    </div>

                    <p class="text-slate-600 mb-8 relative z-10 font-medium leading-relaxed italic">
                        "<?php echo e(Str::limit($alumni->pesan_kesan, 120)); ?>"
                    </p>

                    <div class="flex items-center gap-4 mt-auto pt-6 border-t border-slate-50">
                        <div class="relative">
                            <?php if($alumni->foto): ?>
                                <img class="w-14 h-14 rounded-2xl object-cover shadow-lg border-2 border-white" 
                                     src="<?php echo e(asset('storage/' . $alumni->foto)); ?>" 
                                     alt="<?php echo e($alumni->nama); ?>">
                            <?php else: ?>
                                <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center text-[#1E5FA3]">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            <?php endif; ?>
                            
                            <div class="absolute -bottom-2 -right-2 bg-[#1E5FA3] text-white text-[8px] font-bold px-1.5 py-0.5 rounded-md">
                                '<?php echo e(substr($alumni->tahun_lulus ?? '23', -2)); ?>

                            </div>
                        </div>
                        <div>
                            <h4 class="text-[#0F2A44] font-black text-sm"><?php echo e($alumni->nama); ?></h4>
                            <div class="flex flex-col">
                                <span class="text-[10px] text-[#1E5FA3] font-black uppercase tracking-wider"><?php echo e($alumni->jabatan ?? 'Software Engineer'); ?></span>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter"><?php echo e($alumni->perusahaan ?? 'Global Tech Corp'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-slate-400">Belum ada testimoni.</p>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="mt-16 flex justify-end lg:pr-10">
            <a href="/careers" class="group inline-flex items-center gap-6 text-[#0F2A44] font-black uppercase text-xs tracking-[0.2em] hover:text-[#1E5FA3] transition-colors">
                Selengkapnya Cerita Alumni
                <span class="w-12 h-12 rounded-full bg-white shadow-md flex items-center justify-center group-hover:bg-[#1E5FA3] group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
        </div>
    </div>
</section>

<section id="berita-kampus" class="relative py-24 bg-white overflow-hidden">

    
    <div class="absolute inset-0 opacity-[0.05]" style="background-image: linear-gradient(#1E5FA3 1.5px, transparent 1.5px), linear-gradient(90deg, #1E5FA3 1.5px, transparent 1.5px); background-size: 40px 40px;"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        
        <div class="flex flex-row justify-between items-end mb-12 border-b-2 border-slate-100 pb-6">
            <div class="space-y-1">
                <span class="text-[#1E5FA3] font-black tracking-[0.3em] uppercase text-[10px] block">Lensa Kampus</span>
                <h2 class="text-3xl md:text-5xl font-black text-[#0F2A44] tracking-tighter">
                    Berita <span class="text-[#1E5FA3]">Terkini.</span>
                </h2>
            </div>
            
            <a href="/posts" class="group flex items-center gap-3 text-xs font-black text-[#0F2A44] uppercase tracking-widest hover:text-[#1E5FA3] transition-all">
                Semua Berita
                <span class="w-10 h-10 rounded-full bg-[#E6F0FB] flex items-center justify-center group-hover:bg-[#1E5FA3] group-hover:text-white transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </span>
            </a>
        </div>

        <div class="grid lg:grid-cols-5 gap-8">

            
            <?php if($posts->count()): ?>
            <div class="lg:col-span-3">
                <div class="group relative h-[550px] rounded-[2.5rem] overflow-hidden shadow-2xl transition-all duration-700 cursor-pointer"
                     onclick="openModal('<?php echo e($posts[0]->title); ?>', '<?php echo e($posts[0]->content); ?>', '<?php echo e(asset('storage/'.$posts[0]->thumbnail)); ?>', '<?php echo e($posts[0]->created_at->format('d M Y')); ?>')">
                    
                    <img src="<?php echo e(asset('storage/'.$posts[0]->thumbnail)); ?>" 
                         alt="<?php echo e($posts[0]->title); ?>"
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">

                    
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F2A44] via-[#0F2A44]/20 to-transparent opacity-90"></div>

                    <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full">
                        <div class="flex gap-2 mb-4">
                            <span class="px-3 py-1 bg-[#1E5FA3] text-white text-[10px] font-black uppercase tracking-widest rounded-md">Headline</span>
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-md"><?php echo e($posts[0]->category->name ?? 'Berita'); ?></span>
                        </div>

                        <h3 class="text-3xl md:text-4xl font-black text-white leading-[1.1] mb-6 group-hover:text-blue-200 transition-colors">
                            <?php echo e($posts[0]->title); ?>

                        </h3>

                        <div class="flex items-center justify-between text-white/70">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <?php echo e($posts[0]->created_at->format('d M Y')); ?>

                            </div>
                            <span class="text-sm font-black uppercase tracking-tighter group-hover:translate-x-2 transition-transform">Read Story →</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            
            <div class="lg:col-span-2 flex flex-col gap-4">
                <?php $__currentLoopData = $posts->skip(1)->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group flex gap-5 p-4 rounded-3xl bg-white border border-slate-100 hover:border-[#1E5FA3]/30 hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300 cursor-pointer"
                     onclick="openModal('<?php echo e($post->title); ?>', '<?php echo e($post->content); ?>', '<?php echo e(asset('storage/'.$post->thumbnail)); ?>', '<?php echo e($post->created_at->format('d M Y')); ?>')">
                    
                    
                    <div class="shrink-0 w-24 h-24 rounded-2xl overflow-hidden shadow-inner bg-slate-100">
                        <img src="<?php echo e(asset('storage/'.$post->thumbnail)); ?>" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>

                    
                    <div class="flex flex-col justify-center">
                        <span class="text-[10px] font-black text-[#1E5FA3] uppercase tracking-widest mb-1">
                            <?php echo e($post->category->name ?? 'Update'); ?>

                        </span>
                        <h4 class="text-[#0F2A44] font-bold text-sm leading-snug line-clamp-2 group-hover:text-[#1E5FA3] transition-colors mb-2">
                            <?php echo e($post->title); ?>

                        </h4>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <?php echo e($post->created_at->diffForHumans()); ?>

                        </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div id="newsModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-[#0F2A44]/80 backdrop-blur-md transition-opacity" onclick="closeModal()"></div>
        
        <div class="relative bg-white w-full max-w-4xl rounded-[3rem] overflow-hidden shadow-2xl transform transition-all scale-95 opacity-0 duration-300" id="modalPanel">
            <button onclick="closeModal()" class="absolute top-6 right-6 z-30 w-10 h-10 bg-white/20 backdrop-blur-md hover:bg-white text-white hover:text-[#0F2A44] rounded-full transition-all flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="flex flex-col md:flex-row h-full max-h-[85vh] overflow-y-auto md:overflow-hidden">
                <div class="md:w-1/2 h-64 md:h-auto overflow-hidden">
                    <img id="modalImg" src="" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2 p-8 md:p-12 overflow-y-auto flex flex-col">
                    <span id="modalDate" class="text-[#1E5FA3] font-black text-[10px] uppercase tracking-widest mb-4"></span>
                    <h3 id="modalTitle" class="text-2xl md:text-3xl font-black text-[#0F2A44] leading-tight mb-6"></h3>
                    <div id="modalContent" class="text-slate-600 text-sm leading-relaxed prose prose-blue mb-8"></div>
                    <div class="mt-auto pt-6 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-[10px] font-bold text-slate-400">Share this news</span>
                        <button onclick="closeModal()" class="px-8 py-3 bg-[#0F2A44] text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-[#1E5FA3] transition-colors">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative py-20 px-6 overflow-hidden bg-white">
    
    
    <div class="max-w-7xl mx-auto relative">
        <div class="relative bg-[#0F2A44] rounded-[3rem] p-12 md:p-20 overflow-hidden shadow-[0_40px_80px_-15px_rgba(15,42,68,0.3)]">
            
            
            <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-blue-600/20 to-transparent pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-[#1E5FA3]/30 blur-[100px] rounded-full"></div>
            
            
            <div class="absolute inset-0 opacity-[0.05]" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>

            <div class="relative z-10 grid lg:grid-cols-2 gap-12 items-center">
                
                
                <div class="text-left">
                    <div class="inline-flex items-center gap-2 py-1 px-4 rounded-full bg-blue-500/20 border border-blue-400/20 text-blue-300 text-[10px] font-black uppercase tracking-[0.3em] mb-6">
                        Admission 2026/2027
                    </div>
                    <h2 class="text-4xl md:text-6xl font-black text-white leading-tight tracking-tighter mb-6">
                        Masa Depan <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-sky-200">Tidak Menunggu.</span>
                    </h2>
                    <p class="text-blue-100/70 text-lg font-medium leading-relaxed max-w-md">
                        Bergabunglah dan bangun karier nyata bersama kurikulum berbasis industri. Jadilah bagian dari inovasi masa depan.
                    </p>
                </div>

                
                <div class="flex flex-col sm:flex-row lg:justify-end gap-6">
                    <a href="/admissions"
                       class="group relative inline-flex items-center justify-center px-10 py-6 rounded-2xl font-black text-sm uppercase tracking-widest bg-white text-[#0F2A44] hover:bg-[#1E5FA3] hover:text-white transition-all duration-500 shadow-xl overflow-hidden">
                        <span class="relative z-10 flex items-center gap-3">
                            Daftar Sekarang
                            <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </a>
                    
                    <a href="#"
                       class="inline-flex items-center justify-center px-10 py-6 rounded-2xl font-black text-sm uppercase tracking-widest border-2 border-white/20 text-white hover:bg-white/10 transition-all duration-300">
                        Konsultasi
                    </a>
                </div>

            </div>

            
            <div class="absolute top-10 right-10 hidden xl:block">
                <div class="animate-bounce p-4 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10 text-white">
                    <p class="text-[10px] font-black uppercase tracking-tighter opacity-60">Kuota Terbatas</p>
                    <p class="text-lg font-black text-blue-300 leading-none">Gelombang 1</p>
                </div>
            </div>

        </div>
    </div>

</section>
<script>
    const modal = document.getElementById('newsModal');
    const modalPanel = document.getElementById('modalPanel');
    
    // Fungsi Buka Modal
    function openModal(title, content, image, date) {
        // Isi konten modal
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalImg').src = image;
        document.getElementById('modalDate').innerText = date;
        
        // Dekode HTML content (agar tag <p>, <strong> dll muncul beneran)
        const contentArea = document.getElementById('modalContent');
        const doc = new DOMParser().parseFromString(content, 'text/html');
        contentArea.innerHTML = doc.documentElement.textContent || doc.body.innerHTML;

        // Tampilkan Modal (Ubah class hidden jadi flex)
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Animasi masuk (Delay dikit biar transisinya kelihatan)
        setTimeout(() => {
            modalPanel.classList.remove('scale-95', 'opacity-0');
            modalPanel.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        // Cegah scroll pada body
        document.body.style.overflow = 'hidden';
    }

    // Fungsi Tutup Modal
    function closeModal() {
        modalPanel.classList.remove('scale-100', 'opacity-100');
        modalPanel.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Menangani klik pada kartu berita (Gaya Event Delegation)
    document.addEventListener('click', function(e) {
        const card = e.target.closest('.news-card'); // Pastikan card punya class 'news-card'
        if (card) {
            const data = card.dataset;
            openModal(data.title, data.content, data.image, data.date);
        }
    });

    // Tutup modal kalau klik di luar panel (backdrop)
    modal.addEventListener('click', function(e) {
        if (e.target === modal || e.target.id === 'modalBackdrop') {
            closeModal();
        }
    });

    // Tutup pake tombol ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape" && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/landing.blade.php ENDPATH**/ ?>