<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin Kampus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background: #0f172a; }
        .sidebar {
            width: 260px;
            background: #020617;
        }
        .sidebar a {
            color: #cbd5f5;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 8px;
            display: block;
        }
        .sidebar a:hover {
            background: #1e293b;
            color: #38bdf8;
        }
    </style>
</head>
<body>

<div class="d-flex min-vh-100">

    <aside class="sidebar p-4">
        <h4 class="text-info fw-bold mb-4">Kampus Admin</h4>

        <a href="/dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <a href="/admin/posts"><i class="bi bi-newspaper me-2"></i>Posts</a>
        <a href="/admin/faculties"><i class="bi bi-building me-2"></i>Faculties</a>
        <a href="/admin/prodis"><i class="bi bi-mortarboard me-2"></i>Prodi</a>
        <a href="/admin/facilities/create"><i class="bi bi-house me-2"></i>Facilities</a>
        <a href="/admin/organization"><i class="bi bi-people-fill me-2"></i>Organization Structure</a>
        <a href="/admin/accreditations/create"><i class="bi bi-award me-2"></i>Accreditations</a>
        <a href="/admin/alumni"><i class="bi bi-people me-2"></i>Alumni</a>
        <a href="/admin/partners"><i class="bi bi-briefcase me-2"></i>Partners</a>
        <a href="/admin/admissions"><i class="bi bi-person me-2"></i>Admissions</a>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right me-2"></i>
        Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </aside>

    <main class="flex-fill p-5 text-light" style="background:#020617;">
        @yield('content')
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
