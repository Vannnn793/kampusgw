@extends('admin.layout.main')
@section('title','profile')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Konten Profil Kampus</h5>
        </div>
        <div class="card-body">
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="rektor-tab" data-bs-toggle="tab" data-bs-target="#rektor" type="button">Sambutan Rektor</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="sejarah-tab" data-bs-toggle="tab" data-bs-target="#sejarah" type="button">Sejarah</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="visimisi-tab" data-bs-toggle="tab" data-bs-target="#visimisi" type="button">Visi & Misi</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    
                    <div class="tab-pane fade show active" id="rektor">
                        <div class="mb-3">
                            <label>Nama Rektor</label>
                            <input type="text" name="nama_rektor" class="form-control" value="{{ $profile->nama_rektor }}">
                        </div>
                        <div class="mb-3">
                            <label>Foto Rektor</label>
                            <input type="file" name="foto_rektor" class="form-control">
                            @if($profile->foto_rektor)
                                <img src="{{ asset('storage/'.$profile->foto_rektor) }}" class="mt-2 img-thumbnail" width="150">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label>Isi Sambutan</label>
                            <textarea name="sambutan_rektor" class="form-control summernote">{{ $profile->sambutan_rektor }}</textarea>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="sejarah">
                        <div class="mb-3">
                            <label>Sejarah Singkat Kampus</label>
                            <textarea name="sejarah_kampus" class="form-control summernote">{{ $profile->sejarah_kampus }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Link Video Profil (Youtube)</label>
                            <input type="text" name="link_video_profil" class="form-control" value="{{ $profile->link_video_profil }}" placeholder="https://youtube.com/...">
                        </div>
                    </div>

                    <div class="tab-pane fade" id="visimisi">
                        <div class="mb-3">
                            <label>Visi</label>
                            <textarea name="visi" class="form-control summernote">{{ $profile->visi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Misi</label>
                            <textarea name="misi" class="form-control summernote">{{ $profile->misi }}</textarea>
                        </div>
                    </div>

                </div>

                <hr>
                <button type="submit" class="btn btn-success px-4">Simpan Semua Perubahan</button>
            </form>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Tulis konten di sini...',
            tabsize: 2,
            height: 200, // Tinggi editor
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>

@endsection