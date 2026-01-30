@extends('admin.layout.main')
@section('title', 'Mitra Kampus')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Mitra Kampus</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mitra</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row g-4">
    
    {{-- KOLOM KIRI: FORM TAMBAH --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-building-add me-2"></i>Tambah Mitra Baru
                </h6>
            </div>
            <div class="card-body">
                
                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger small p-2">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Instansi/Mitra</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: PT. Telkom Indonesia" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Logo Mitra</label>
                        <div class="input-group">
                            <input type="file" name="logo" class="form-control" accept="image/*" required>
                            <label class="input-group-text"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Format: PNG/JPG (Transparan lebih baik).</div>
                    </div>

                    <button class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle me-1"></i> Simpan Mitra
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- KOLOM KANAN: TABEL DATA --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-list-check me-2"></i>Daftar Mitra Kerja Sama
                </h6>
            </div>
            
            <div class="card-body p-0">
                
                @if(session('success'))
                    <div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" width="5%">No</th>
                                <th width="20%">Logo</th>
                                <th>Nama Mitra</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mitras as $m)
                            <tr>
                                <td class="ps-4">{{ $loop->iteration }}</td>
                                
                                {{-- Logo --}}
                                <td>
                                    @if($m->logo)
                                        <div class="p-1 border rounded bg-light d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 60px;">
                                            <img src="{{ asset('storage/'.$m->logo) }}" class="img-fluid" style="max-height: 50px;">
                                        </div>
                                    @else
                                        <span class="text-muted small">No Image</span>
                                    @endif
                                </td>

                                {{-- Nama --}}
                                <td>
                                    <span class="fw-bold text-dark">{{ $m->name }}</span>
                                </td>

                                {{-- Aksi --}}
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.partners.edit', $m->id) }}" class="btn btn-sm btn-light text-primary border" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.partners.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus mitra ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-light text-danger border" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-building-slash fs-1 d-block mb-2"></i>
                                    Belum ada data mitra.
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
@endsection