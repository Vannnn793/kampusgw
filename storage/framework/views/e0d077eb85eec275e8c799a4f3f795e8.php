<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title', 'Beranda'); ?> - FutureTech University</title>

    
    <script src="https://cdn.tailwindcss.com"></script>
    
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0284c7', // Sky-600
                        secondary: '#0f172a', // Slate-900
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Custom Scrollbar biar ganteng */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        [x-cloak] { display: none !important; }
    </style>

    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden selection:bg-sky-200 selection:text-sky-900">

    
    <?php echo $__env->make('layout.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <main class="min-h-screen">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <?php echo $__env->make('layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Init AOS dengan settingan smooth
        AOS.init({ 
            once: true, 
            duration: 800,
            offset: 50
        });
    </script>

    
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
    const menuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    const navbar = document.getElementById('main-navbar');

    menuBtn.addEventListener('click', () => {
        // Toggle Menu
        const isHidden = mobileMenu.classList.contains('hidden');
        
        if (isHidden) {
            mobileMenu.classList.remove('hidden');
            // Ganti Ikon
            hamburgerIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            // Kasih background solid pas dibuka biar gak tembus pandang
            navbar.classList.add('bg-white');
            navbar.classList.remove('bg-white/80');
        } else {
            mobileMenu.classList.add('hidden');
            // Ganti Ikon
            hamburgerIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // Efek Navbar mengecil/solid saat scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('h-16', 'shadow-md');
            navbar.classList.remove('h-20');
        } else {
            navbar.classList.add('h-20');
            navbar.classList.remove('h-16', 'shadow-md');
        }
    });
</script>

</body>
</html><?php /**PATH C:\laragon\www\kampus_anda\resources\views/layout/main.blade.php ENDPATH**/ ?>