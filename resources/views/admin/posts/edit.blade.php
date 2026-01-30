@extends('admin.layout.main')
@section('title', 'Edit Berita')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Berita</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}" class="text-decoration-none">Posts</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
    <div>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        
        {{-- KOLOM KIRI: KONTEN UTAMA --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary">
                        <i class="bi bi-pencil-square me-2"></i>Konten Berita
                    </h6>
                </div>
                
                <div class="card-body">
                    {{-- Judul --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Judul Berita</label>
                        <input type="text" name="title" class="form-control form-control-lg" 
                               value="{{ old('title', $post->title) }}" placeholder="Masukkan judul..." required>
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Isi Berita --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Isi Artikel</label>
                        {{-- Rows diperbesar agar lega saat menulis --}}
                        <textarea name="content" rows="15" class="form-control" 
                                  placeholder="Tulis konten di sini...">{{ old('content', $post->content) }}</textarea>
                        @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: SIDEBAR PENGATURAN --}}
        <div class="col-lg-4">
            
            {{-- Card: Publish Action --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-gear me-2"></i>Publish</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary fw-bold">
                            <i class="bi bi-save me-1"></i> Update Berita
                        </button>
                    </div>
                    <div class="mt-3 text-center">
                        <small class="text-muted">Terakhir diupdate: {{ $post->updated_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>

            {{-- Card: Kategori & Gambar --}}
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-image me-2"></i>Atribut</h6>
                </div>
                <div class="card-body">
                    
                    {{-- Kategori --}}
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Kategori</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Thumbnail Preview --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Thumbnail Saat Ini</label>
                        <div class="border rounded p-2 bg-light text-center mb-2">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/'.$post->thumbnail) }}" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                            @else
                                <div class="py-4 text-muted small fst-italic">Belum ada gambar</div>
                            @endif
                        </div>
                    </div>

                    {{-- Upload Baru --}}
                    <div class="mb-2">
                        <label class="form-label small fw-bold text-muted">Ganti Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control form-control-sm" accept="image/*">
                        <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>

@endsection