@extends('admin.layout.main')
@section('title', 'Program Studi')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Program Studi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Prodi</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row g-4">

    {{-- KOLOM KIRI: FORM TAMBAH PRODI --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-mortarboard-fill me-2"></i>Tambah Prodi Baru
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

                <form method="POST" action="{{ route('admin.prodis.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Fakultas --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Fakultas</label>
                        <select name="faculty_id" class="form-select" required>
                            <option value="">-- Pilih Fakultas --</option>
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                                    {{ $faculty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Nama Prodi --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Program Studi</label>
                        <input name="name" class="form-control" placeholder="Contoh: S1 Teknik Informatika" value="{{ old('name') }}" required>
                    </div>

                    {{-- Deskripsi Singkat --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Gambaran umum prodi...">{{ old('description') }}</textarea>
                    </div>

                    {{-- Visi/Goal Singkat --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Visi / Tujuan (Goal)</label>
                        <textarea name="goal" class="form-control" rows="2" placeholder="Tujuan utama prodi...">{{ old('goal') }}</textarea>
                    </div>

                    {{-- Cover Image --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Cover / Foto Prodi</label>
                        <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
                        <div class="form-text small text-muted">Format: JPG/PNG, Max 2MB.</div>
                    </div>

                    <button class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle me-1"></i> Simpan Prodi
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- KOLOM KANAN: LIST PRODI --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-list-task me-2"></i>Daftar Program Studi
                </h6>
            </div>
            
            <div class="card-body p-0">
                
                @if(session('success'))
                    <div class="alert alert-success m-3 alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4" width="5%">No</th>
                                <th width="15%">Cover</th>
                                <th>Program Studi & Fakultas</th>
                                <th class="text-center" width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($prodis as $prodi)
                            <tr>
                                <td class="ps-4">{{ $loop->iteration }}</td>
                                
                                {{-- Image --}}
                                <td>
                                    @if($prodi->image)
                                        <img src="{{ asset('storage/'.$prodi->image) }}" class="rounded border shadow-sm" width="60" height="40" style="object-fit:cover">
                                    @else
                                        <div class="bg-light rounded border d-flex align-items-center justify-content-center text-muted small" style="width: 60px; height: 40px;">
                                            Img
                                        </div>
                                    @endif
                                </td>

                                {{-- Info --}}
                                <td>
                                    <div class="fw-bold text-dark">{{ $prodi->name }}</div>
                                    <small class="text-primary">
                                        <i class="bi bi-building me-1"></i> {{ $prodi->faculty->name ?? 'Tanpa Fakultas' }}
                                    </small>
                                </td>

                                {{-- Action --}}
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.prodis.edit', $prodi->id) }}" class="btn btn-sm btn-light text-primary border" title="Edit Detail & Kurikulum">
                                            <i class="bi bi-pencil-square"></i> Detail
                                        </a>
                                        <form action="{{ route('admin.prodis.destroy', $prodi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus prodi ini?')">
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
                                    <i class="bi bi-mortarboard fs-1 d-block mb-2"></i>
                                    Belum ada data Program Studi.
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