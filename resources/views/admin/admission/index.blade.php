@extends('admin.layout.main')
@section('title', 'Data Pendaftar PMB')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Data Pendaftar Baru</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admissions</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <div class="row align-items-center">
            <div class="col-md-5">
                <h6 class="m-0 fw-bold text-primary"><i class="bi bi-people-fill me-2"></i>List Calon Mahasiswa</h6>
            </div>
            
            <div class="col-md-7">
                <div class="d-flex justify-content-md-end gap-2 align-items-center">
                    <form action="{{ route('admin.admissions.index') }}" method="GET" class="d-flex gap-2 mb-0">
                        <div class="input-group input-group-sm" style="max-width: 250px;">
                            <span class="input-group-text bg-light fw-bold">Angkatan:</span>
                            <select name="year" class="form-select" onchange="this.form.submit()">
                                @forelse($years as $year)
                                    <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @empty
                                    <option value="">Belum ada data</option>
                                @endforelse
                            </select>
                        </div>
                        <a href="{{ route('admin.admissions.index') }}" class="btn btn-sm btn-outline-secondary" title="Reset Filter">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    </form>

                    {{-- <a href="{{ route('admin.admissions.export', ['year' => $selectedYear]) }}" class="btn btn-sm btn-success">
                        <i class="bi bi-file-earmark-excel me-1"></i> Export Excel
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        @if($selectedYear)
            <div class="bg-light px-4 py-2 border-bottom">
                <small class="text-muted">Menampilkan data untuk Tahun Akademik: <span class="fw-bold text-dark">{{ $selectedYear }}</span></small>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" width="5%">#</th>
                        <th width="35%">Data Kandidat</th>
                        <th width="30%">Pilihan Akademik</th>
                        <th width="15%">Status Angkatan</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admissions as $a)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration }}</td>
                        
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar me-3">
                                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person-fill fs-5"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">{{ $a->nama_lengkap }}</div>
                                    <div class="small text-muted"><i class="bi bi-envelope me-1"></i> {{ $a->email }}</div>
                                    <div class="small text-muted"><i class="bi bi-whatsapp me-1"></i> {{ $a->no_hp }}</div>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="fw-semibold text-dark">{{ $a->prodi->name }}</div>
                            <div class="small text-secondary">{{ $a->faculty->name }}</div>
                        </td>

                        <td>
                            <span class="badge bg-success-subtle text-success-emphasis px-3 py-2 rounded-pill">
                                <i class="bi bi-calendar-check me-1"></i> {{ $a->tahun_akademik }}
                            </span>
                        </td>

                        <td class="text-center">
                            <form action="{{ route('admin.admissions.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Data">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-filter-circle fs-1 d-block mb-3"></i>
                                Tidak ada pendaftar di tahun akademik <strong>{{ $selectedYear }}</strong>.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection