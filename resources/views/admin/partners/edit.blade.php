@extends('admin.layout.main')
@section('title', 'Edit Mitra')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Mitra</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}" class="text-decoration-none">Mitra</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-pencil-square me-2"></i>Form Perubahan Data
                </h6>
            </div>
            
            <div class="card-body">
                
                @if ($errors->any())
                    <div class="alert alert-danger small">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.partners.update', $partner->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Mitra --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Instansi/Mitra</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $partner->name) }}" required>
                        </div>
                    </div>

                    {{-- Logo Mitra --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Logo Mitra</label>
                        
                        {{-- Preview --}}
                        <div class="p-3 border rounded bg-light mb-2 text-center">
                            @if($partner->logo)
                                <img src="{{ asset('storage/'.$partner->logo) }}" class="img-fluid" style="max-height: 100px;">
                                <div class="small text-muted mt-2 fst-italic">Logo saat ini</div>
                            @else
                                <span class="text-muted">Belum ada logo</span>
                            @endif
                        </div>

                        <div class="input-group">
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-upload"></i></label>
                        </div>
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah logo.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i> Update Mitra
                        </button>
                        <a href="{{ route('admin.partners.index') }}" class="btn btn-light px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection