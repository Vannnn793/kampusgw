@extends('admin.layout.main')
@section('title', 'Edit Fasilitas')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Fasilitas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.facilities.index') }}" class="text-decoration-none">Fasilitas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.facilities.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-pencil-square me-2"></i>Form Edit Fasilitas
                </h6>
            </div>

            <div class="card-body">

                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger small">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Perhatikan Route-nya: admin.facilities.update --}}
                <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Fasilitas --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Fasilitas <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $facility->name) }}" required>
                        </div>
                    </div>

                    {{-- Fakultas (Saya tambahkan kembali agar konsisten dengan create) --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Milik Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-bank"></i></span>
                            <select class="form-select" name="faculty_id">
                                <option value="">-- Milik Universitas (Umum) --</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}" {{ (old('faculty_id', $facility->faculty_id) == $faculty->id) ? 'selected' : '' }}>
                                        Fakultas {{ $faculty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Gambar Fasilitas</label>
                        
                        <div class="mb-2 p-2 border rounded bg-light text-center">
                            @if($facility->image)
                                <img src="{{ asset('storage/' . $facility->image) }}" class="img-fluid rounded shadow-sm" style="max-height: 150px">
                                <div class="small text-muted mt-1">Gambar saat ini</div>
                            @else
                                <span class="text-muted fst-italic small">Belum ada gambar</span>
                            @endif
                        </div>

                        <div class="input-group">
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="4">{{ old('description', $facility->description) }}</textarea>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i> Update Data
                        </button>
                        <a href="{{ route('admin.facilities.index') }}" class="btn btn-light px-4">Batal</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection