@extends('admin.layout.main')
@section('title','Dashboard')

@section('content')

<h2 class="fw-bold mb-4">Admin Dashboard</h2>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="fw-bold text-info">
                    {{ $facultyCount }}
                </h3>
                <p class="text-secondary mb-0">Faculties</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="fw-bold text-primary">
                    {{ $prodiCount }}
                </h3>
                <p class="text-secondary mb-0">Prodi</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="fw-bold text-success">
                    {{ $alumniCount }}
                </h3>
                <p class="text-secondary mb-0">Alumni</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="fw-bold text-warning">
                    {{ $partnerCount }}
                </h3>
                <p class="text-secondary mb-0">Partners</p>
            </div>
        </div>
    </div>

</div>
<br>
<br>
<div class="col-lg-8">
        <div class="card bg-dark border-0 shadow-lg">
            <div class="card-body">
                <h5 class="fw-bold mb-4 text-primary">
                    <i class="bi bi-newspaper me-1"></i> Posts List
                </h5>

                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle">
                        <thead class="text-secondary">
                            <tr>
                                <th style="width:60px">#</th>
                                <th>Title</th>
                                <th>Kategori</th>
                                <th>Published</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <td>
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/'.$post->thumbnail) }}"
                                            class="rounded"
                                            width="48" height="48"
                                            style="object-fit:cover">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                <td class="fw-semibold">{{ $post->title }}</td>

                                <td>
                                    <span class="badge bg-primary bg-opacity-25 text-primary">
                                        {{ $post->category->name ?? '-' }}
                                    </span>
                                </td>

                                <td class="text-secondary">
                                    {{ $post->published_at?->format('d M Y') ?? 'Draft' }}
                                </td>

                                <td class="text-end">
                                    <a href="{{ route('admin.posts.edit',$post) }}"
                                    class="btn btn-sm btn-outline-info me-1">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.posts.destroy',$post) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Hapus post ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada berita 😴
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

<div class="container-fluid px-4 mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Struktur Organisasi Kampus</h4>
        <a href="/admin/organization" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    </div>

    <div class="row g-4">
        @foreach ($structures as $item)
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('storage/'.$item->photo) }}"
                     class="card-img-top"
                     style="height:220px; object-fit:cover">

                <div class="card-body text-center">
                    <h6 class="fw-bold mb-0">{{ $item->name }}</h6>
                    <small class="text-muted">{{ $item->position }}</small>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Fasilitas</h3>
            <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">Tambah Fasilitas</a>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($facilities as $facility)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($facility->image)
                                <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" width="100" class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $facility->name }}</td>
                        <td>{{ Str::limit($facility->description, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.facilities.edit', $facility->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data fasilitas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Akreditasi Prodi</h3>
            <a href="{{ route('admin.accreditations.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Program Studi</th>
                        <th>Peringkat</th>
                        <th>No. SK</th>
                        <th>Masa Berlaku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accreditations as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->program_name }}</td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $item->level }}</span>
                        </td>
                        <td>{{ $item->certificate_number ?? '-' }}</td>
                        <td>
                            {{ $item->valid_until ? \Carbon\Carbon::parse($item->valid_until)->format('d-m-Y') : 'Seumur Hidup / -' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.accreditations.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form onsubmit="return confirm('Yakin hapus data ini?');" action="{{ route('admin.accreditations.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data akreditasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Dokumen & Download</h1>
        <a href="{{ route('admin.download.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-upload fa-sm text-white-50"></i> Upload Dokumen Baru
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar File Publik</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul Dokumen</th>
                            <th>Kategori</th>
                            <th>File</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($downloads as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $item->title }}</strong>
                                <br><small class="text-muted">{{ Str::limit($item->description, 50) }}</small>
                            </td>
                            <td>
                                @if($item->category == 'akademik')
                                    <span class="badge bg-primary">Akademik</span>
                                @elseif($item->category == 'kemahasiswaan')
                                    <span class="badge bg-success">Kemahasiswaan</span>
                                @else
                                    <span class="badge bg-secondary">Umum/Lainnya</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ asset('storage/'.$item->file_path) }}" target="_blank" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-download"></i> Cek File
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.download.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.download.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus file ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada dokumen yang diupload.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Info Penerimaan Mahasiswa Baru</h1>
        <a href="{{ route('admin.pmb-info.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Buat Jalur Masuk
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Brosur</th>
                            <th>Nama Jalur</th>
                            <th>Status Pendaftaran</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pmbInfos as $info)
                        <tr>
                            <td width="10%">
                                @if($info->image)
                                    <img src="{{ asset('storage/'.$info->image) }}" width="80" class="rounded">
                                @else
                                    <span class="text-muted text-xs">No Image</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $info->title }}</strong>
                                <br>
                                <a href="{{ $info->registration_link }}" target="_blank" class="text-xs text-primary">
                                    <i class="fas fa-link"></i> Link Daftar
                                </a>
                            </td>
                            <td>
                                @if($info->is_active)
                                    <span class="badge bg-success">DIBUKA</span>
                                @else
                                    <span class="badge bg-danger">DITUTUP</span>
                                @endif
                            </td>
                            <td>
                                <small>
                                    Mulai: {{ date('d M Y', strtotime($info->start_date)) }} <br>
                                    Sampai: {{ date('d M Y', strtotime($info->end_date)) }}
                                </small>
                            </td>
                            <td>
                                <a href="{{ route('admin.pmb.edit', $info->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">Belum ada info PMB.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
