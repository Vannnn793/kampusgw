<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Administrator Kampus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9; /* Background konten jadi terang biar bersih */
            overflow-x: hidden;
        }

        /* SIDEBAR STYLES */
        .sidebar {
            width: 260px;
            background: #1e293b; /* Slate 800 - Lebih elegan dari pure black */
            color: #94a3b8;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.5rem 1.5rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: #ffffff;
            border-bottom: 1px solid #334155;
            display: flex;
            align-items: center;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-header {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            padding: 1.5rem 1.5rem 0.5rem;
            font-weight: 600;
        }

        .nav-item {
            list-style: none;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.95rem;
            border-left: 3px solid transparent;
        }

        .nav-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
        }

        .nav-link.active {
            background: rgba(14, 165, 233, 0.15); /* Biru transparan */
            color: #38bdf8; /* Biru terang */
            border-left-color: #38bdf8;
        }

        .nav-link i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        /* MAIN CONTENT STYLES */
        .main-wrapper {
            margin-left: 260px; /* Sesuai lebar sidebar */
            transition: all 0.3s;
        }

        /* TOP NAVBAR */
        .top-navbar {
            background: #ffffff;
            height: 70px;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .content-area {
            padding: 2rem;
        }

        /* Scrollbar Sidebar Custom */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 5px;
        }

        /* Responsive Mobile */
        @media (max-width: 991.98px) {
            .sidebar { margin-left: -260px; }
            .sidebar.show { margin-left: 0; }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

<nav class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-mortarboard-fill text-primary me-2"></i> KAMPUS ADMIN
    </div>

    <div class="sidebar-menu">
        
        <div class="nav-item">
            <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </div>

        <div class="sidebar-header">Data Akademik</div>
        
        <div class="nav-item">
            <a href="/admin/faculties" class="nav-link {{ request()->is('admin/faculties*') ? 'active' : '' }}">
                <i class="bi bi-building"></i> Fakultas
            </a>
        </div>
        <div class="nav-item">
            <a href="/admin/prodis" class="nav-link {{ request()->is('admin/prodis*') ? 'active' : '' }}">
                <i class="bi bi-mortarboard"></i> Program Studi
            </a>
        </div>
        <div class="nav-item">
            <a href="/admin/accreditations/create" class="nav-link {{ request()->is('admin/accreditations*') ? 'active' : '' }}">
                <i class="bi bi-award"></i> Akreditasi
            </a>
        </div>
        <div class="nav-item">
            <a href="/admin/organization" class="nav-link {{ request()->is('admin/organization*') ? 'active' : '' }}">
                <i class="bi bi-diagram-3"></i> Struktur Organisasi
            </a>
        </div>

        <div class="sidebar-header">Manajemen Konten</div>

        <div class="nav-item">
            <a href="/admin/posts" class="nav-link {{ request()->is('admin/posts*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> Berita & Artikel
            </a>
        </div>
        <div class="nav-item">
            <a href="/admin/sliders" class="nav-link {{ request()->is('admin/sliders*') ? 'active' : '' }}">
                <i class="bi bi-images"></i> Slider Banner
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.profiles.index', 1) }}" class="nav-link {{ request()->is('admin/profiles*') ? 'active' : '' }}">
                <i class="bi bi-bank"></i> Profil Kampus
            </a>
        </div>
        <div class="nav-item">
            <a href="/admin/facilities" class="nav-link {{ request()->is('admin/facilities*') ? 'active' : '' }}">
                <i class="bi bi-house-gear"></i> Fasilitas
            </a>
        </div>
        <div class="nav-item">
            <a href="/admin/download" class="nav-link {{ request()->is('admin/download*') ? 'active' : '' }}">
                <i class="bi bi-cloud-arrow-down"></i> Dokumen Download
            </a>
        </div>

        <div class="sidebar-header">Kemahasiswaan</div>

        <div class="nav-item">
            <a href="/admin/pmb-info" class="nav-link {{ request()->is('admin/pmb*') ? 'active' : '' }}">
                <i class="bi bi-megaphone"></i> Info PMB
            </a>
        </div>
        <div class="nav-item">
            <a href="/admin/alumni" class="nav-link {{ request()->is('admin/alumni*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Data Alumni
            </a>
        </div>
        <div class="nav-item">
            <a href="/admin/admissions" class="nav-link {{ request()->is('admin/admissions*') ? 'active' : '' }}">
                <i class="bi bi-person-check"></i> Pendaftar Baru
            </a>
        </div>

        <div class="sidebar-header">Pengaturan</div>

        <div class="nav-item">
            <a href="/admin/partners" class="nav-link {{ request()->is('admin/partners*') ? 'active' : '' }}">
                <i class="bi bi-handshake"></i> Mitra & Partner
            </a>
        </div>

        <div class="nav-item mt-3 mb-5">
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="nav-link text-danger fw-bold">
               <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    </div>
</nav>

<div class="main-wrapper">
    
    <header class="top-navbar">
        <button class="btn btn-outline-secondary d-lg-none" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>
        
        <h5 class="m-0 fw-bold text-dark d-none d-lg-block">@yield('title')</h5>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                    <i class="bi bi-person-fill"></i>
                </div>
                <strong>Admin</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small shadow">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <main class="content-area">
        @yield('content')
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });
</script>

</body>
</html>