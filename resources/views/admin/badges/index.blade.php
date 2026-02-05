@extends('admin.layout.main')

@section('content')
<div class="container-fluid px-4">
    {{-- Header Halaman --}}
    <h1 class="mt-4">Manajemen Badge & Gelar</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
        <li class="breadcrumb-item active">Badges</li>
    </ol>

    {{-- Alert Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        {{-- KOLOM KIRI: FORM TAMBAH --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 card-title"><i class="bi bi-plus-circle me-2"></i>Tambah Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.badges.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Badge / Gelar</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Contoh: Terakreditasi Unggul" required>
                            <div class="form-text text-muted">
                                Masukkan nama pencapaian atau slogan singkat.
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Badge
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: LIST TABLE --}}
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-award me-2"></i>Daftar Badge Aktif</h5>
                        <span class="badge bg-secondary rounded-pill">{{ $badges->count() }} Total</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama Badge</th>
                                    <th class="text-center" style="width: 20%">Status</th>
                                    <th class="text-end" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($badges as $index => $badge)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <span class="fw-semibold">{{ $badge->name }}</span>
                                        </td>
                                        <td class="text-center">
                                            {{-- Tombol Toggle Status --}}
                                            <form action="{{ route('admin.badges.toggle', $badge->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm {{ $badge->is_active ? 'btn-outline-success' : 'btn-outline-secondary' }} rounded-pill px-3"
                                                        title="Klik untuk ubah status">
                                                    @if($badge->is_active)
                                                        <i class="bi bi-eye-fill me-1"></i> Tampil
                                                    @else
                                                        <i class="bi bi-eye-slash-fill me-1"></i> Sembunyi
                                                    @endif
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-end">
                                            {{-- Tombol Hapus --}}
                                            <form action="{{ route('admin.badges.destroy', $badge->id) }}" method="POST" class="d-inline" 
                                                  onsubmit="return confirm('Yakin ingin menghapus badge ini secara permanen?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                            Belum ada data badge/gelar.
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
</div>
@endsection