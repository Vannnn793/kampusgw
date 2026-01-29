@extends('admin.layout.main')
@section('title', 'Tambah Data Akreditasi')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Manajemen Akreditasi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary"><i class="bi bi-file-earmark-plus me-2"></i>Form Input Akreditasi</h6>
            </div>
            
            <div class="card-body p-4">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i> <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('admin.accreditations.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Program Studi <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-mortarboard"></i></span>
                            <select class="form-select @error('program_name') is-invalid @enderror" name="program_name" required>
                                <option value="" disabled selected>-- Pilih Program Studi --</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->name }}" {{ old('program_name') == $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-text text-muted">Pilih program studi yang terdaftar di database.</div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Peringkat Akreditasi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-award"></i></span>
                                <input type="text" class="form-control @error('level') is-invalid @enderror" 
                                       name="level" value="{{ old('level') }}" 
                                       placeholder="Contoh: Unggul, A, Baik Sekali" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Diterbitkan Oleh</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-building-check"></i></span>
                                <input type="text" class="form-control" 
                                       name="issued_by" value="{{ old('issued_by') }}" 
                                       placeholder="Default: BAN-PT / LAM-PTKes">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nomor SK / Sertifikat</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-hash"></i></span>
                                <input type="text" class="form-control" 
                                       name="certificate_number" value="{{ old('certificate_number') }}" 
                                       placeholder="Nomor SK resmi">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Berlaku Sampai</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" class="form-control" 
                                       name="valid_until" value="{{ old('valid_until') }}">
                            </div>
                            <div class="form-text small">Biarkan kosong jika masa berlaku seumur hidup.</div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary px-4">
                            <i class="bi bi-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i> Simpan Data
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection