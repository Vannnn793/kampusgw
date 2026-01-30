@extends('admin.layout.main')
@section('title', 'Kelola Headline Slider')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Headline Slider</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Slider</li>
            </ol>
        </nav>
    </div>
</div>

{{-- ALERT --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.sliders.update', 1) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 fw-bold text-primary">
                <i class="bi bi-images me-2"></i>Daftar Berita & Slider
            </h6>
            <div class="small text-muted">
                <i class="bi bi-info-circle me-1"></i> Aktifkan switch untuk menampilkan berita di slider utama.
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center py-3" width="10%">Status</th>
                            <th width="15%" class="py-3">Thumbnail</th>
                            <th width="35%" class="py-3">Informasi Berita</th>
                            <th class="py-3">Judul Slider (Opsional)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                        <tr class="{{ $post->is_slider ? 'bg-primary bg-opacity-10' : '' }}" id="row-{{ $post->id }}">
                            
                            {{-- KOLOM STATUS (SWITCH) --}}
                            <td class="text-center">
                                <div class="form-check form-switch d-flex justify-content-center">
                                    <input class="form-check-input fs-4" 
                                           type="checkbox" 
                                           name="sliders[{{ $post->id }}][active]" 
                                           id="switch-{{ $post->id }}"
                                           role="switch"
                                           onchange="toggleRowColor({{ $post->id }})"
                                           {{ $post->is_slider ? 'checked' : '' }}>
                                </div>
                            </td>

                            {{-- KOLOM THUMBNAIL --}}
                            <td>
                                <div class="position-relative overflow-hidden rounded border" style="width: 80px; height: 50px;">
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/'.$post->thumbnail) }}" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted small">
                                            No Img
                                        </div>
                                    @endif
                                </div>
                            </td>

                            {{-- KOLOM INFO BERITA --}}
                            <td>
                                <span class="fw-bold d-block text-dark text-truncate" style="max-width: 300px;">
                                    {{ $post->title }}
                                </span>
                                <small class="text-muted">
                                    <i class="bi bi-calendar-event me-1"></i> 
                                    {{ $post->created_at ? $post->created_at->format('d M Y') : '-' }}
                                </small>
                            </td>

                            {{-- KOLOM JUDUL CUSTOM --}}
                            <td>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-pencil-square text-muted"></i>
                                    </span>
                                    <input type="text" 
                                           name="sliders[{{ $post->id }}][title]" 
                                           class="form-control border-start-0" 
                                           placeholder="Gunakan judul asli..." 
                                           value="{{ $post->slider_title }}">
                                </div>
                                <div class="form-text small" style="font-size: 0.75rem;">
                                    Isi jika ingin judul di slider berbeda dengan judul asli.
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-newspaper fs-1 mb-2 d-block"></i>
                                Belum ada berita yang tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- FIXED FLOATING SAVE BAR --}}
    <div class="fixed-bottom bg-white border-top shadow py-3 px-4" style="z-index: 1000; left: 250px;"> 
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="text-muted small">
                <i class="bi bi-exclamation-circle me-1"></i> Jangan lupa simpan setelah mengubah status slider.
            </span>
            <button type="submit" class="btn btn-primary fw-bold px-4 rounded-pill shadow-sm">
                <i class="bi bi-save me-2"></i>Simpan Perubahan Slider
            </button>
        </div>
    </div>
    
    {{-- Spacer --}}
    <div style="height: 80px;"></div>

</form>

{{-- SCRIPT SEDERHANA UNTUK VISUAL --}}
<script>
    function toggleRowColor(id) {
        const row = document.getElementById('row-' + id);
        const checkbox = document.getElementById('switch-' + id);
        
        if (checkbox.checked) {
            row.classList.add('bg-primary', 'bg-opacity-10');
        } else {
            row.classList.remove('bg-primary', 'bg-opacity-10');
        }
    }
</script>

<style>
    .object-fit-cover {
        object-fit: cover;
    }
    /* Responsive adjustment for fixed bottom bar */
    @media (max-width: 991.98px) {
        .fixed-bottom { left: 0 !important; }
    }
</style>

@endsection