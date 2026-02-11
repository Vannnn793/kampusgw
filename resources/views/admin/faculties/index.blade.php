@extends('admin.layout.main')
@section('title', 'Manajemen Fakultas')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Data Fakultas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fakultas</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">

    {{-- KOLOM KIRI: FORM INPUT --}}
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Fakultas Baru
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

                <form action="{{ route('admin.faculties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Nama Fakultas --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Fakultas Teknik" required>
                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Foto / Logo</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Format: JPG, PNG. Max: 2MB.</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Gambaran umum fakultas..."></textarea>
                    </div>

                    {{-- Visi & Misi --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Visi</label>
                        <textarea name="vision" class="form-control" rows="2" placeholder="Visi fakultas..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Misi</label>
                        <textarea name="mission" class="form-control" rows="2" placeholder="Misi fakultas..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save me-1"></i> Simpan Fakultas
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
                    <i class="bi bi-list-ul me-2"></i>Daftar Fakultas
                </h6>
            </div>

            <div class="card-body p-0">
                
                {{-- Alert Success --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" width="5%">No</th>
                                <th width="15%">Logo</th>
                                <th width="35%">Info Fakultas</th>
                                <th width="30%">Visi</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faculties as $faculty)
                            <tr>
                                <td class="ps-4">{{ $loop->iteration }}</td>
                                
                                {{-- Kolom Gambar --}}
                                <td>
                                    @if($faculty->image)
                                        <img src="{{ asset('storage/' . $faculty->image) }}" 
                                             class="rounded border object-fit-cover shadow-sm" 
                                             width="60" height="60" alt="Logo">
                                    @else
                                        <div class="bg-light rounded border d-flex align-items-center justify-content-center text-secondary" style="width: 60px; height: 60px;">
                                            <i class="bi bi-building fs-4"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- Kolom Info (Nama & Deskripsi) --}}
                                <td>
                                    <div class="fw-bold text-dark">{{ $faculty->name }}</div>
                                    <div class="small text-muted">{{ Str::limit($faculty->description, 50) }}</div>
                                </td>

                                {{-- Kolom Visi (Singkat) --}}
                                <td>
                                    <div class="small text-muted fst-italic">
                                        "{{ Str::limit($faculty->vision, 60, '...') }}"
                                    </div>
                                </td>

                                {{-- Kolom Aksi --}}
                                <td class="text-center">
                                    <div class="btn-group">
                                        {{-- Edit --}}
                                        <a href="{{ route('admin.faculties.edit', $faculty->id) }}" class="btn btn-sm btn-light text-primary border" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        
                                        {{-- Delete (Saya tambahkan form delete standar) --}}
                                        <form onsubmit="return confirm('Hapus fakultas ini? Data prodi terkait mungkin akan error.');" 
                                              action="{{ route('admin.faculties.destroy', $faculty->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger border" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-journal-x fs-1 d-block mb-2"></i>
                                    Belum ada data fakultas.
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