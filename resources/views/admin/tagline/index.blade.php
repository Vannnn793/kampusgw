@extends('admin.layout.main')
@section('title', 'Master Taglines')

@section('content')

<div class="container-fluid p-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Master Tagline & Ikon</h4>
            <small class="text-muted">Kelola atribut fasilitas (WiFi, AC, Lab, dll) yang akan tampil di landing page</small>
        </div>
        <a href="{{ route('admin.taglines.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Tagline
        </a>
    </div>

    {{-- STATS / INFO SINGKAT (Optional biar makin Pro) --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-blue-50 text-primary p-3 rounded-3 me-3">
                        <i class="bi bi-tag-fill fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Total Tagline</small>
                        <span class="fw-bold fs-5">{{ $taglines->count() }} Item</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- GRID AREA --}}
    <div class="row g-4">
        @forelse($taglines as $tagline)
            <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-3 tagline-card transition-all position-relative">
                    
                    {{-- FLOATING ACTIONS (Muncul pas di hover) --}}
                    <div class="tagline-actions position-absolute top-0 end-0 p-2 d-flex flex-column gap-1">
                        <form action="{{ route('admin.taglines.destroy', $tagline->id) }}" method="POST" 
                              onsubmit="return confirm('Hapus item ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light shadow-sm rounded-circle p-1 text-danger" title="Hapus">
                                <i class="bi bi-trash mx-1"></i>
                            </button>
                        </form>
                    </div>

                    {{-- CONTENT --}}
                    <div class="py-3">
                        <div class="icon-wrapper bg-light text-primary rounded-4 d-inline-flex align-items-center justify-content-center mb-3 transition-all" 
                             style="width: 70px; height: 70px;">
                            <i class="{{ $tagline->icon }} fs-1"></i>
                        </div>
                        <h6 class="fw-bold text-dark text-truncate px-2 mb-1">{{ $tagline->name }}</h6>
                        <div class="mt-2">
                            <span class="badge bg-light text-muted fw-normal font-monospace" style="font-size: 10px;">
                                {{ str_replace('bi bi-', '', $tagline->icon) }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="card border-0 shadow-sm rounded-4 py-5 bg-light border-2 border-dashed">
                    <div class="card-body">
                        <i class="bi bi-inbox text-muted display-1 mb-3"></i>
                        <h5 class="text-muted">Belum ada data tagline</h5>
                        <p class="small text-muted mb-4">Mulai tambahkan fitur fasilitas kampus lu sekarang.</p>
                        <a href="{{ route('admin.taglines.create') }}" class="btn btn-primary rounded-pill px-4">Buat Sekarang</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>

{{-- CSS CUSTOM UNTUK DASHBOARD FEEL --}}
<style>
    /* Card Hover Effect */
    .tagline-card {
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }
    .tagline-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.08)!important;
        background-color: #fff;
    }

    /* Icon Wrapper Hover */
    .tagline-card:hover .icon-wrapper {
        background-color: var(--bs-primary) !important;
        color: white !important;
        transform: scale(1.1);
    }

    /* Floating Actions Hidden by Default */
    .tagline-actions {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.2s ease;
    }
    .tagline-card:hover .tagline-actions {
        opacity: 1;
        transform: scale(1);
    }

    .font-monospace {
        font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    }
</style>

@endsection