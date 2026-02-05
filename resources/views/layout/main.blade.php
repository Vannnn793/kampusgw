<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Beranda') - FutureTech University</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Konfigurasi Warna Custom (Opsional: Biar konsisten sama Navbar) --}}
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

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Animations --}}
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Alpine.js (Wajib untuk Navbar Mobile) --}}
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

    {{-- Slot untuk CSS tambahan per halaman --}}
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden selection:bg-sky-200 selection:text-sky-900">

    {{-- Navbar --}}
    @include('layout.navbar')

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layout.footer')

    {{-- Scripts --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Init AOS dengan settingan smooth
        AOS.init({ 
            once: true, 
            duration: 800,
            offset: 50
        });
    </script>

    {{-- Slot untuk JS tambahan per halaman (misal untuk chart/maps) --}}
    @stack('scripts')

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
</html>