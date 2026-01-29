@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Jalur Masuk PMB</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pmb-info.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label>Nama Jalur Masuk</label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Gelombang 1 - Jalur Prestasi" required>
                        </div>

                        <div class="mb-3">
                            <label>Deskripsi Lengkap (Syarat, Biaya, Cara Daftar)</label>
                            <textarea name="content" class="form-control" rows="10" placeholder="Tulis detail pendaftaran di sini..."></textarea>
                            <small class="text-muted">*Gunakan fitur list agar rapi.</small>
                        </div>
                    </div>

                    <div class="col-md-4 border-start">
                        
                        <div class="mb-3 p-3 bg-light rounded border">
                            <label class="fw-bold">Status Pendaftaran</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="statusSwitch" checked style="transform: scale(1.3);">
                                <label class="form-check-label ms-2" for="statusSwitch">Buka Pendaftaran</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Poster / Brosur</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label>Link Website Pendaftaran</label>
                            <input type="url" name="registration_link" class="form-control" placeholder="https://pmb.kampus.ac.id/daftar">
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label>Tanggal Buka</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label>Tanggal Tutup</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary w-100 btn-lg">
                            <i class="fas fa-save"></i> Publish Info
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection