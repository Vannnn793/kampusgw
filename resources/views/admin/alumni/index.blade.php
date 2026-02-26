@extends('admin.layout.main')
@section('title', 'Manajemen Alumni')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Data Alumni</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alumni</li>
            </ol>
        </nav>
    </div>
    {{-- Tombol Tambah kalau lu butuh nanti --}}
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('careers.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah via Public Form
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div>{{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-people-fill me-2"></i>Daftar Alumni
                </h6>
                <div class="search-box">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" class="form-control bg-light border-start-0" placeholder="Cari nama atau NIM...">
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-muted uppercase">
                            <tr style="font-size: 0.75rem;">
                                <th class="ps-3 text-center" width="5%">NO</th>
                                <th width="25%">PROFIL ALUMNI</th>
                                <th width="15%">NIM</th>
                                <th width="20%">KARIR SAAT INI</th>
                                <th width="15%">AKADEMIK</th>
                                <th width="10%" class="text-center">STATUS</th>
                                <th width="10%" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alumni as $a)
                            <tr>
                                <td class="ps-3 text-center text-muted small">{{ $loop->iteration }}</td>
                                
                                {{-- Nama & Pesan --}}
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            @if($a->foto)
                                                <img src="{{ asset('storage/'.$a->foto) }}" class="rounded-circle border p-1" width="45" height="45" style="object-fit: cover;">
                                            @else
                                                <div class="bg-soft-primary text-primary rounded-circle d-flex align-items-center justify-content-center border" style="width: 45px; height: 45px; background-color: #eef2ff;">
                                                    <i class="bi bi-person-fill fs-5"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark mb-0" style="font-size: 0.9rem;">{{ $a->nama }}</div>
                                            <div class="text-muted italic" style="font-size: 0.75rem; max-width: 180px;">
                                                <i class="bi bi-quote small text-primary"></i> {{ Str::limit($a->pesan_kesan, 35) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- NIM --}}
                                <td>
                                    <span class="badge bg-light text-dark border font-monospace">{{ $a->nim ?? '-' }}</span>
                                </td>

                                {{-- Karir --}}
                                <td>
                                    @if($a->perusahaan)
                                        <div class="fw-semibold text-dark small">{{ $a->perusahaan }}</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">
                                            <i class="bi bi-briefcase me-1"></i> {{ $a->jabatan ?? 'Staff' }}
                                        </div>
                                    @else
                                        <span class="text-muted small italic">Belum bekerja</span>
                                    @endif
                                </td>

                                {{-- Akademik & Tahun Lulus --}}
                                <td>
                                    <div class="small fw-bold text-dark">{{ $a->prodi->name ?? '-' }}</div>
                                    <div class="text-primary fw-medium" style="font-size: 0.75rem;">
                                        Lulus Tahun: {{ $a->tahun_lulus ?? '-' }}
                                    </div>
                                </td>

                                {{-- Status --}}
                                <td class="text-center">
                                    @if($a->status == 'pending')
                                        <span class="badge rounded-pill px-3" style="background-color: #fff8e6; color: #b45309; border: 1px solid #fde68a; font-size: 0.65rem;">PENDING</span>
                                    @elseif($a->status == 'approved')
                                        <span class="badge rounded-pill px-3" style="background-color: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; font-size: 0.65rem;">APPROVED</span>
                                    @else
                                        <span class="badge rounded-pill px-3 bg-light text-danger border" style="font-size: 0.65rem;">REJECTED</span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        @if($a->status == 'pending')
                                            <form action="{{ route('admin.alumni.approve', $a->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success p-1" title="Verifikasi">
                                                    <i class="bi bi-check-circle" style="font-size: 1rem;"></i>
                                                </button>
                                            </form>
                                        @endif

                                        <form onsubmit="return confirm('Hapus data ini?');" action="{{ route('admin.alumni.destroy', $a->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger p-1" title="Hapus">
                                                <i class="bi bi-trash" style="font-size: 1rem;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <img src="https://illustrations.popsy.co/gray/box.svg" width="120" class="mb-3 opacity-50">
                                    <p class="text-muted small">Belum ada data alumni yang masuk.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script lu udah bener, gak perlu diganti --}}

@endsection