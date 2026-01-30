@extends('admin.layout.main')
@section('title', 'Edit Prodi & Kurikulum')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Edit Program Studi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.prodis.index') }}" class="text-decoration-none">Prodi</a></li>
                <li class="breadcrumb-item active">{{ $prodi->name }}</li>
            </ol>
        </nav>
    </div>
    <a href="{{ route('admin.prodis.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

{{-- FORM UTAMA (Membungkus Semua Tab) --}}
<form action="{{ route('admin.prodis.update', $prodi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- NAV TABS UTAMA --}}
    <ul class="nav nav-tabs mb-4" id="mainTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-bold" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-content" type="button" role="tab">
                <i class="bi bi-info-circle me-2"></i>Informasi Umum
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="curriculum-tab" data-bs-toggle="tab" data-bs-target="#curriculum-content" type="button" role="tab">
                <i class="bi bi-journal-bookmark me-2"></i>Kurikulum & Matkul
            </button>
        </li>
    </ul>

    <div class="tab-content" id="mainTabContent">
        
        {{-- ================= TAB 1: INFORMASI UMUM PRODI ================= --}}
        <div class="tab-pane fade show active" id="info-content" role="tabpanel">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-3">Detail Program Studi</h6>
                            
                            {{-- Nama --}}
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Nama Prodi</label>
                                <input name="name" class="form-control" value="{{ old('name', $prodi->name) }}" required>
                            </div>

                            {{-- Fakultas --}}
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Fakultas</label>
                                <select name="faculty_id" class="form-select" required>
                                    @foreach($faculties as $faculty)
                                        <option value="{{ $faculty->id }}" {{ $prodi->faculty_id == $faculty->id ? 'selected' : '' }}>
                                            {{ $faculty->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Deskripsi</label>
                                <textarea name="description" rows="4" class="form-control">{{ old('description', $prodi->description) }}</textarea>
                            </div>

                            {{-- Goal --}}
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Visi / Tujuan (Goal)</label>
                                <textarea name="goal" rows="3" class="form-control">{{ old('goal', $prodi->goal) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <h6 class="fw-bold text-primary mb-3 text-start">Gambar Sampul</h6>
                            
                            @if($prodi->image)
                                <img src="{{ asset('storage/'.$prodi->image) }}" class="img-fluid rounded mb-3 shadow-sm" style="max-height: 200px">
                            @else
                                <div class="py-4 bg-light rounded mb-3 text-muted border border-dashed">No Image</div>
                            @endif

                            <input type="file" name="image" class="form-control form-control-sm">
                            <div class="form-text small text-start">Upload gambar baru untuk mengganti.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= TAB 2: KURIKULUM (MATKUL) ================= --}}
        <div class="tab-pane fade" id="curriculum-content" role="tabpanel">
            
            <div class="alert alert-info border-0 shadow-sm d-flex align-items-center mb-3">
                <i class="bi bi-exclamation-circle-fill me-2 fs-5"></i>
                <div>
                    <strong>Perhatian:</strong> Tambah, edit, atau hapus mata kuliah di bawah ini. Klik "Simpan Semua Perubahan" di bagian paling bawah untuk menyimpan.
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    
                    {{-- Nav Pills Semester (Internal Tab) --}}
                    <ul class="nav nav-pills mb-3 gap-1 pb-2 overflow-auto flex-nowrap" id="semesterPills" role="tablist">
                        @for($s=1; $s<=8; $s++)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-sm {{ $s==1 ? 'active' : '' }} border" 
                                        id="pill-sem-{{ $s }}" 
                                        data-bs-toggle="pill" 
                                        data-bs-target="#pill-content-{{ $s }}" 
                                        type="button" role="tab">
                                    Semester {{ $s }}
                                </button>
                            </li>
                        @endfor
                    </ul>

                    {{-- Content Semester --}}
                    <div class="tab-content" id="semesterPillsContent">
                        @for($s=1; $s<=8; $s++)
                            @php
                                $existingCourses = $curriculums->where('semester', $s)->first()?->courses ?? collect([]);
                            @endphp

                            <div class="tab-pane fade {{ $s==1 ? 'show active' : '' }}" id="pill-content-{{ $s }}" role="tabpanel">
                                <div class="bg-light p-4 rounded border">
                                    <h6 class="fw-bold text-dark mb-3">Mata Kuliah Semester {{ $s }}</h6>
                                    
                                    <div id="container-sem-{{ $s }}">
                                        @forelse($existingCourses as $idx => $course)
                                            <div class="row g-2 mb-2 align-items-center">
                                                <div class="col-md-7 col-8">
                                                    <input type="text" name="courses[{{ $s }}][{{ $idx }}][name]" class="form-control" value="{{ $course->name }}" placeholder="Nama Matkul">
                                                </div>
                                                <div class="col-md-3 col-3">
                                                    <input type="number" name="courses[{{ $s }}][{{ $idx }}][sks]" class="form-control text-center" value="{{ $course->sks }}" placeholder="SKS">
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <button type="button" class="btn btn-danger btn-sm w-100" onclick="this.closest('.row').remove()"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                        @empty
                                            {{-- Default row jika kosong --}}
                                            <div class="row g-2 mb-2 align-items-center">
                                                <div class="col-md-7 col-8">
                                                    <input type="text" name="courses[{{ $s }}][0][name]" class="form-control" placeholder="Nama Matkul">
                                                </div>
                                                <div class="col-md-3 col-3">
                                                    <input type="number" name="courses[{{ $s }}][0][sks]" class="form-control text-center" placeholder="SKS">
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <button type="button" class="btn btn-danger btn-sm w-100" onclick="this.closest('.row').remove()"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>

                                    <button type="button" class="btn btn-outline-primary btn-sm mt-2" onclick="addCourse({{ $s }})">
                                        <i class="bi bi-plus-lg me-1"></i> Tambah Matkul
                                    </button>
                                </div>
                            </div>
                        @endfor
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- FIXED BOTTOM SAVE BAR (Agar tombol save selalu terlihat) --}}
    <div class="fixed-bottom bg-white border-top shadow py-3 px-4" style="z-index: 1000; left: 250px;"> <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="text-muted small">Pastikan semua data sudah benar sebelum menyimpan.</span>
            <button type="submit" class="btn btn-primary fw-bold px-4">
                <i class="bi bi-save me-2"></i>Simpan Semua Perubahan
            </button>
        </div>
    </div>
    
    {{-- Spacer agar konten tidak tertutup fixed bottom bar --}}
    <div style="height: 100px;"></div>

</form>

{{-- SCRIPT --}}
<script>
    function addCourse(semester) {
        const timestamp = new Date().getTime(); // Unique ID
        const html = `
            <div class="row g-2 mb-2 align-items-center fade-in">
                <div class="col-md-7 col-8">
                    <input type="text" name="courses[${semester}][${timestamp}][name]" class="form-control" placeholder="Nama Matkul Baru">
                </div>
                <div class="col-md-3 col-3">
                    <input type="number" name="courses[${semester}][${timestamp}][sks]" class="form-control text-center" placeholder="SKS">
                </div>
                <div class="col-md-2 col-1">
                    <button type="button" class="btn btn-danger btn-sm w-100" onclick="this.closest('.row').remove()"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        `;
        document.getElementById(`container-sem-${semester}`).insertAdjacentHTML('beforeend', html);
    }
</script>

<style>
    /* Animasi halus */
    .fade-in { animation: fadeIn 0.3s; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(-5px); } to { opacity: 1; transform: translateY(0); } }
    
    /* Responsive adjustment for fixed bottom bar if sidebar exists */
    @media (max-width: 991.98px) {
        .fixed-bottom { left: 0 !important; }
    }
</style>

@endsection