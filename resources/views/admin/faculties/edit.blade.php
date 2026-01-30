@extends('admin.layout.main')
@section('title', 'Edit Fakultas')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Fakultas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.faculties.index') }}" class="text-decoration-none">Fasilitas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.faculties.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary">
                    <i class="bi bi-pencil-square me-2"></i>Form Perubahan Data
                </h6>
            </div>

            <div class="card-body">

                {{-- Alert Error Validation --}}
                @if ($errors->any())
                    <div class="alert alert-danger small">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.faculties.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Fakultas --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            {{-- Menggunakan old() agar jika error validasi, inputan tidak hilang --}}
                            <input type="text" name="name" class="form-control" value="{{ old('name', $faculty->name) }}" required>
                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Gambar / Logo</label>
                        
                        <div class="mb-2 p-2 border rounded bg-light text-center">
                            @if($faculty->image)
                                <img src="{{ asset('storage/' . $faculty->image) }}" class="img-fluid rounded shadow-sm" style="max-height: 150px">
                                <div class="small text-muted mt-1 fst-italic">Gambar saat ini</div>
                            @else
                                <span class="text-muted small">Belum ada gambar yang diupload.</span>
                            @endif
                        </div>

                        <div class="input-group">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <label class="input-group-text"><i class="bi bi-image"></i></label>
                        </div>
                        <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $faculty->description) }}</textarea>
                    </div>

                    {{-- Visi & Misi --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Visi</label>
                            <textarea name="vision" class="form-control" rows="4">{{ old('vision', $faculty->vision) }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted">Misi</label>
                            <textarea name="mission" class="form-control" rows="4">{{ old('mission', $faculty->mission) }}</textarea>
                        </div>
                    </div>

                    {{-- Fasilitas --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Fasilitas Utama</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-list-check"></i></span>
                            <textarea name="facilities" class="form-control" rows="2">{{ old('facilities', $faculty->facilities) }}</textarea>
                        </div>
                        <div class="form-text small text-muted">Pisahkan setiap fasilitas dengan tanda koma (,).</div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle me-1"></i> Update Data
                        </button>
                        <a href="{{ route('admin.faculties.index') }}" class="btn btn-light px-4">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection