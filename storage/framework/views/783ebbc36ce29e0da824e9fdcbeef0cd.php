<?php $__env->startSection('title', 'Profil Kampus'); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-24 md:py-32 lg:py-40 overflow-hidden">
    
    
    <div class="absolute inset-0">
        <img 
            src="<?php echo e($profile && $profile->gambar_kampus ? asset('storage/'.$profile->gambar_kampus) : asset('storage/images/kampusgw.jpg')); ?>"
            class="w-full h-full object-cover object-center transform scale-105 animate-slow-zoom"
            alt="Kampus"
        >
        
        <div class="absolute inset-0 bg-blue-900/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-sky-900 via-blue-900/40 to-transparent"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-500/20 border border-sky-300/30 backdrop-blur-md text-sky-100 text-xs font-bold tracking-widest uppercase mb-6 animate-fade-down">
            <span class="w-2 h-2 rounded-full bg-sky-300 animate-pulse"></span>
            Tentang Kami
        </div>

        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight leading-tight animate-fade-up">
            Mengenal Lebih Dekat <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">
                <?php echo e($profile ? \Illuminate\Support\Str::after($profile->campus_name, ' ') : 'Kampus Kami'); ?>

            </span>
        </h1>

        <p class="text-lg md:text-xl text-sky-100 max-w-3xl mx-auto leading-relaxed animate-fade-up delay-100 font-light">
            <?php echo e($profile ? \Illuminate\Support\Str::limit(strip_tags($profile->sejarah_kampus), 150) : 'Membangun masa depan melalui pendidikan berkualitas.'); ?>

        </p>

    </div>
</div>


<section class="bg-sky-50/50 relative z-20 -mt-10 md:-mt-20 rounded-t-[3rem] overflow-hidden min-h-screen">
    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-24">

        
        <div class="grid lg:grid-cols-12 gap-12 mb-24 items-start">
            
            
            <div class="lg:col-span-4" data-aos="fade-right">
                <div class="sticky top-32">
                    
                    <div class="w-16 h-16 rounded-2xl bg-sky-600 flex items-center justify-center text-white text-3xl mb-6 shadow-xl shadow-sky-600/20">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <span class="text-sky-600 font-bold tracking-widest uppercase text-xs mb-2 block">History</span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-800 mb-6">
                        Sejarah Perjalanan
                    </h2>
                    <p class="text-slate-500 leading-relaxed">
                        Bagaimana kami tumbuh, berkembang, dan berkomitmen untuk mencerdaskan kehidupan bangsa.
                    </p>
                </div>
            </div>

            
            <div class="lg:col-span-8" data-aos="fade-up">
                <div class="bg-white rounded-[2rem] p-8 md:p-12 border border-sky-100 shadow-xl shadow-sky-200/50 relative overflow-hidden">
                    <div class="relative z-10 prose prose-lg prose-slate max-w-none prose-p:leading-relaxed prose-headings:font-bold prose-a:text-sky-600">
                        <?php if($profile): ?>
                            <?php echo $profile->sejarah_kampus; ?>

                        <?php else: ?>
                            <p class="italic text-slate-400">Belum ada data sejarah.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        
        <?php
            $youtubeId = null;
            if ($profile && $profile->link_video_profil) {
                if (str_contains($profile->link_video_profil, 'youtu.be/')) {
                    $youtubeId = last(explode('/', $profile->link_video_profil));
                } elseif (str_contains($profile->link_video_profil, 'watch?v=')) {
                    parse_str(parse_url($profile->link_video_profil, PHP_URL_QUERY), $yt);
                    $youtubeId = $yt['v'] ?? null;
                } elseif (str_contains($profile->link_video_profil, 'embed/')) {
                    $youtubeId = last(explode('embed/', $profile->link_video_profil));
                }
            }
        ?>

        <?php if($youtubeId): ?>
        <div class="mb-24" data-aos="zoom-in-up">
            <div class="relative rounded-[2rem] overflow-hidden shadow-2xl shadow-sky-200/50 border-4 border-white">
                <div class="aspect-video w-full">
                    <iframe 
                        src="https://www.youtube.com/embed/<?php echo e($youtubeId); ?>?rel=0" 
                        class="w-full h-full"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
        <?php endif; ?>

        
        <?php if($profile && ($profile->visi || $profile->misi)): ?>
        <div class="grid md:grid-cols-2 gap-8">
            
            
            <div class="group bg-white rounded-[2.5rem] p-10 border border-sky-100 shadow-xl shadow-sky-100/50 relative overflow-hidden hover:border-sky-300 transition-colors duration-300" data-aos="fade-up">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-sky-50 rounded-full blur-3xl group-hover:bg-sky-100 transition-colors"></div>
                
                <div class="relative z-10 h-full flex flex-col">
                    <div class="w-16 h-16 rounded-2xl bg-sky-50 flex items-center justify-center text-sky-600 text-3xl mb-8 shadow-sm">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    
                    <h3 class="text-3xl font-black text-slate-800 mb-6">Visi Kami</h3>
                    
                    <div class="prose prose-lg prose-slate text-slate-600 leading-relaxed italic flex-1">
                        <?php echo $profile->visi; ?>

                    </div>
                </div>
            </div>

            
            <div class="group bg-gradient-to-br from-sky-500 to-blue-600 rounded-[2.5rem] p-10 shadow-2xl shadow-blue-500/30 relative overflow-hidden text-white" data-aos="fade-up" data-aos-delay="100">
                
                
                <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-sky-400/20 rounded-full blur-2xl"></div>
                
                <div class="relative z-10 h-full flex flex-col">
                    <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-white text-3xl mb-8 border border-white/20 backdrop-blur-sm">
                        <i class="bi bi-rocket-takeoff-fill"></i>
                    </div>
                    
                    <h3 class="text-3xl font-black text-white mb-6">Misi Utama</h3>
                    
                    <div class="prose prose-lg prose-invert text-sky-50 leading-relaxed flex-1">
                        <?php echo $profile->misi; ?>

                    </div>
                </div>
            </div>

        </div>
        <?php endif; ?>

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
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\tentang\sejarah.blade.php ENDPATH**/ ?>