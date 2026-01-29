@extends('admin.layout.main')
@section('title','Organization')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 fw-bold">Struktur Organisasi</h1>
    <p class="text-muted">Tambah data pejabat struktural kampus</p>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white fw-semibold">
            Form Tambah Struktur Organisasi
        </div>

        <div class="card-body">
            <form action="{{ route('admin.organization.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Dr. John Doe, M.Kom" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Jabatan</label>
                        <select name="position" id="category_select" class="form-select" required>
                            <option value="dosen">Dosen Pengajar</option>
                            <option value="pimpinan_fakultas">Pimpinan Fakultas (Dekan/Kaprodi)</option>
                            <option value="pimpinan_univ">Pimpinan Universitas (Rektor/Wakil)</option>
                            <option value="staff">Staff Tata Usaha</option>
                        </select>
                    </div>

                    <div class="mb-3" id="faculty_wrapper">
                        <label>Penempatan Fakultas</label>
                        <select name="faculty_id" class="form-select">
                            <option value="">-- Pilih Fakultas --</option>
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Wajib dipilih kecuali untuk Rektorat.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto</label>
                    <input type="file" name="photo" class="form-control">
                    <small class="text-muted">Format JPG/PNG, maksimal 2MB</small>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Urutan Tampil</label>
                    <input type="number" name="order" class="form-control" placeholder="1">
                    <small class="text-muted">Semakin kecil, semakin atas</small>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.organization.index') }}" class="btn btn-light border">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('category_select').addEventListener('change', function() {
        var category = this.value;
        var facultyWrapper = document.getElementById('faculty_wrapper');

        // Jika user pilih Pimpinan Universitas (Rektor), sembunyikan dropdown fakultas
        if(category === 'pimpinan_univ') {
            facultyWrapper.style.display = 'none';
        } else {
            facultyWrapper.style.display = 'block';
        }
    });
</script>
@endsection
