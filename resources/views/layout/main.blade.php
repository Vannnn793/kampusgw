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
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    
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

</body>
</html>