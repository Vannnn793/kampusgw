@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4" style="max-width: 800px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload Dokumen Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.download.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label>Judul Dokumen <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Contoh: Kalender Akademik 2024/2025" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Kategori</label>
                        <select name="category" class="form-select">
                            <option value="umum">Umum</option>
                            <option value="akademik">Akademik</option>
                            <option value="kemahasiswaan">Kemahasiswaan</option>
                            <option value="panduan">Panduan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>File Dokumen (PDF/Docx) <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Keterangan Tambahan (Opsional)</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Upload Sekarang
                </button>
                <a href="{{ route('admin.download.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection