@extends('admin.layout.main')
@section('title', 'Admin Dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Dashboard</h1>
        <p class="text-muted">Selamat datang kembali, Admin! Berikut ringkasan aktivitas kampus hari ini.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span> Minggu Ini
        </button>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Fakultas</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $facultyCount }}</h2>
                    </div>
                    <i class="bi bi-building fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-primary border-0 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.faculties.index') }}" class="text-white text-decoration-none small stretched-link">Lihat Detail</a>
                <i class="bi bi-chevron-right text-white small"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Program Studi</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $prodiCount }}</h2>
                    </div>
                    <i class="bi bi-mortarboard fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-info border-0 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.prodis.index') }}" class="text-white text-decoration-none small stretched-link">Lihat Detail</a>
                <i class="bi bi-chevron-right text-white small"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Alumni Terdata</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $alumniCount }}</h2>
                    </div>
                    <i class="bi bi-people fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-success border-0 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.alumni.index') }}" class="text-white text-decoration-none small stretched-link">Lihat Database</a>
                <i class="bi bi-chevron-right text-white small"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-dark h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1 opacity-75">Mitra Kampus</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $partnerCount }}</h2>
                    </div>
                    <i class="bi bi-handshake fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-warning border-0 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.partners.index') }}" class="text-dark text-decoration-none small stretched-link">Kelola Mitra</a>
                <i class="bi bi-chevron-right text-dark small"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    
    <div class="col-lg-8">
        
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 fw-bold text-primary"><i class="bi bi-newspaper me-2"></i>Berita Terbaru</h5>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Judul Artikel</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        @if($post->thumbnail)
                                            <img src="{{ asset('storage/'.$post->thumbnail) }}" class="rounded me-3" width="40" height="40" style="object-fit:cover">
                                        @else
                                            <div class="rounded me-3 bg-secondary d-flex align-items-center justify-content-center text-white" style="width:40px; height:40px;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="fw-bold text-dark">{{ Str::limit($post->title, 40) }}</div>
                                            <small class="text-muted">{{ $post->published_at?->format('d M Y') ?? 'Draft' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $post->category->name ?? 'Umum' }}</span></td>
                                <td>
                                    @if($post->published_at)
                                        <span class="badge bg-success-subtle text-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary">Draft</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.posts.edit',$post) }}" class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil-square"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada postingan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 fw-bold text-dark"><i class="bi bi-cloud-arrow-down me-2"></i>Dokumen Publik</h5>
                <a href="{{ route('admin.download.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-upload"></i> Upload</a>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse($downloads->take(5) as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3 text-danger fs-4"><i class="bi bi-file-earmark-pdf-fill"></i></div>
                            <div>
                                <h6 class="mb-0 fw-semibold">{{ $item->title }}</h6>
                                <small class="text-muted">{{ $item->category }} &bull; {{ $item->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <a href="{{ asset('storage/'.$item->file_path) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download"></i></a>
                    </li>
                    @empty
                    <li class="text-center text-muted py-3">Tidak ada dokumen terbaru.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <br>
        {{-- TABEL AKREDITASI LENGKAP --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 fw-bold text-dark">
                    <i class="bi bi-award-fill me-2 text-warning"></i>Daftar Akreditasi Program Studi
                </h5>
                {{-- Tombol tambah tetap ada, tapi diarahkan ke halaman input khusus --}}
                <a href="{{ route('admin.accreditations.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Kelola Data
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="small text-uppercase">
                                <th class="ps-4">Program / Instansi</th>
                                <th class="text-center">Peringkat</th>
                                <th>Lembaga Penerbit</th>
                                <th>Masa Berlaku</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($accreditations as $acc)
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark">{{ $acc->program_name }}</div>
                                    <small class="text-muted">ID: #ACC-00{{ $acc->id }}</small>
                                </td>
                                <td class="text-center">
                                    @php
                                        $badgeColor = match(strtoupper($acc->level)) {
                                            'A', 'UNGGUL' => 'bg-success',
                                            'B', 'BAIK SEKALI' => 'bg-primary',
                                            default => 'bg-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeColor }} px-3 py-2 text-uppercase">
                                        {{ $acc->level }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted"><i class="bi bi-patch-check me-1"></i>{{ $acc->issued_by ?? 'BAN-PT' }}</span>
                                </td>
                                <td>
                                    @if($acc->valid_until)
                                        @if(\Carbon\Carbon::parse($acc->valid_until)->isPast())
                                            <span class="text-danger small fw-bold">
                                                <i class="bi bi-exclamation-triangle-fill me-1"></i>Kadaluwarsa
                                            </span>
                                        @else
                                            <span class="text-dark small">
                                                {{ \Carbon\Carbon::parse($acc->valid_until)->format('d M Y') }}
                                            </span>
                                        @endif
                                    @else
                                        <span class="badge bg-light text-success border border-success-subtle">Seumur Hidup</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        {{-- Form Hapus Langsung --}}
                                        <form action="{{ route('admin.accreditations.destroy', $acc->id) }}" method="POST" onsubmit="return confirm('Hapus data akreditasi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder2-open d-block fs-2 mb-2"></i>
                                    <span class="small">Belum ada data akreditasi yang tersimpan.</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($accreditations->count() > 5)
            <div class="card-footer bg-white text-center py-2">
                <small class="text-muted">Menampilkan data akreditasi terbaru.</small>
            </div>
            @endif
        </div>
    </div>

    <div class="col-lg-4">
        
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="m-0 fw-bold"><i class="bi bi-megaphone me-2"></i>Status PMB</h5>
            </div>
            <div class="card-body">
                @php
                    $activePmb = $pmbInfos->where('is_active', true)->first();
                @endphp

                @if($activePmb)
                    <div class="text-center py-3">
                        <div class="spinner-grow text-success mb-2" role="status"></div>
                        <h4 class="fw-bold text-success">PENDAFTARAN DIBUKA</h4>
                        <p class="mb-3">{{ $activePmb->title }}</p>
                        <a href="{{ route('admin.pmb-info.index') }}" class="btn btn-outline-primary w-100">Kelola PMB</a>
                    </div>
                @else
                    <div class="text-center py-3">
                        <i class="bi bi-lock-fill fs-1 text-secondary mb-2"></i>
                        <h4 class="fw-bold text-secondary">TIDAK ADA PERIODE AKTIF</h4>
                        <p class="text-muted mb-3">Silakan buka jalur pendaftaran baru.</p>
                        <a href="{{ route('admin.pmb-info.create') }}" class="btn btn-primary w-100">Buka Pendaftaran</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold">Akses Cepat</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.organization.index') }}" class="btn btn-outline-dark text-start">
                        <i class="bi bi-person-plus-fill me-2"></i> Tambah Dosen/Staff
                    </a>
                    <a href="{{ route('admin.facilities.create') }}" class="btn btn-outline-dark text-start">
                        <i class="bi bi-building-add me-2"></i> Input Fasilitas Baru
                    </a>
                    <a href="{{ route('admin.accreditations.create') }}" class="btn btn-outline-dark text-start">
                        <i class="bi bi-award-fill me-2"></i> Update Akreditasi
                    </a>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold">Struktur Organisasi Terbaru</h6>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($structures->take(4) as $staff)
                    <div class="list-group-item d-flex align-items-center">
                        <img src="{{ asset('storage/'.$staff->photo) }}" class="rounded-circle me-3" width="40" height="40" style="object-fit:cover">
                        <div>
                            <h6 class="mb-0 text-sm fw-bold">{{ Str::limit($staff->name, 20) }}</h6>
                            <small class="text-muted d-block">{{ $staff->position }}</small>
                        </div>
                    </div>
                    @empty
                    <div class="p-3 text-center text-muted">Belum ada data pegawai.</div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
    
</div>

@endsection